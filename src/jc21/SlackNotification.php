<?php

namespace jc21;

class SlackNotification
{
    protected $webhookUrl  = null;
    protected $proxy       = null;
    protected $username    = null;
    protected $channel     = null;
    protected $text        = null;
    protected $iconUrl     = null;
    protected $iconEmoji   = null;
    protected $attachments = [];
    protected $timeout     = 30;


    /**
     * Constructor
     *
     * @param  string  $webhookUrl
     * @throws \Exception
     */
    public function __construct($webhookUrl)
    {
        if (!$webhookUrl) {
            throw new \Exception('Invalid webhookUrl');
        }
        $this->webhookUrl = $webhookUrl;
    }


    /**
     * getWebhookUrl
     *
     * @return string
     */
    public function getWebhookUrl()
    {
        return $this->webhookUrl;
    }


    /**
     * setProxy
     * format: server.com:8080
     *
     * @param  string  $proxy
     * @return void
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
    }


    /**
     * getProxy
     *
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }


    /**
     * setUsername
     *
     * @param  string  $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


    /**
     * getUsername
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * setText
     * Optional text that appears within the attachment
     *
     * @param  string  $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }


    /**
     * getText
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }


    /**
     * setIconUrl
     *
     * @param  string  $iconUrl
     * @return void
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
    }


    /**
     * getIconUrl
     *
     * @return string
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
    }


    /**
     * setIconEmoji
     *
     * @param  string  $iconEmoji
     * @return void
     */
    public function setIconEmoji($iconEmoji)
    {
        $this->iconEmoji = $iconEmoji;
    }


    /**
     * getIconEmoji
     *
     * @return string
     */
    public function getIconEmoji()
    {
        return $this->iconEmoji;
    }


    /**
     * setChannel
     * Prefix with # for a room, or @ for a user.
     *
     * @param  string $channel
     * @throws \Exception
     */
    public function setChannel($channel)
    {
        if (strlen($channel)) {
            $firstCharacter = substr($channel, 0, 1);
            if ($firstCharacter != '#' && $firstCharacter != '@') {
                throw new \Exception('Channel must be prefixes with # or @');
            }
        }
        $this->channel = $channel;
    }


    /**
     * getChannel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }


    /**
     * addAttachment
     *
     * @param  SlackAttachment $attachment
     * @return void
     */
    public function addAttachment(SlackAttachment $attachment)
    {
        $this->attachments[] = $attachment;
    }


    /**
     * getAttachments
     *
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }


    /**
     * getAttachmentCount
     *
     * @return int
     */
    public function getAttachmentCount()
    {
        return count($this->attachments);
    }


    /**
     * setTimeout
     *
     * @param  int   $seconds
     * @return void
     */
    public function setTimeout($seconds)
    {
        $this->timeout = intval($seconds);
    }


    /**
     * getTimeout
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }


    /**
     * send
     *
     * @return bool
     * @throws \Exception
     */
    public function send()
    {
        $payload = [];

        if ($this->getUsername()) {
            $payload['username'] = $this->getUsername();
        }

        if ($this->getChannel()) {
            $payload['channel'] = $this->getChannel();
        }

        if ($this->getText()) {
            $payload['text'] = $this->getText();
        }

        if ($this->getIconUrl()) {
            $payload['icon_url'] = $this->getIconUrl();
        } elseif ($this->getIconEmoji()) {
            $payload['icon_emoji'] = $this->getIconEmoji();
        }

        if ($this->getAttachmentCount()) {
            $payload['attachments'] = [];
            foreach ($this->attachments as $attachment) {
                $payload['attachments'][] = $attachment->getHash();
            }
        }


        // Send the notification
        $json     = json_encode($payload);
        $resource = curl_init();

        $curl_opt_array = [
            // Set Url
            CURLOPT_URL            => $this->getWebhookUrl(),
            // Return a String
            CURLOPT_RETURNTRANSFER => true,
            // Post
            CURLOPT_POST           => true,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => $json,
            // Timeouts
            CURLOPT_CONNECTTIMEOUT => $this->getTimeout(),
            CURLOPT_TIMEOUT        => $this->getTimeout(),
            // Fail for 400+
            CURLOPT_FAILONERROR    => false,
            // Follow "Location" headers
            CURLOPT_FOLLOWLOCATION => true,
            // Json headers
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json),
            ],
        ];

        if ($this->getProxy()) {
            $curl_opt_array[CURLOPT_PROXY] = $this->getProxy();
        }

        curl_setopt_array($resource, $curl_opt_array);

        // Send!
        $response = curl_exec($resource);

        // Errors and redirect failures
        if (!$response) {
            throw new \Exception('Curl Error: ' . curl_errno($resource) . ' - ' . curl_error($resource));
        } else {
            $response = trim($response);
            if ($response && $response == 'ok') {
                // Success
                curl_close($resource);
                return true;
            } else {
                throw new \Exception('Could not send message. Response: ' . $response);
            }
        }
    }
}
