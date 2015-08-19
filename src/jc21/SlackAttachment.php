<?php

/**
 * See: https://api.slack.com/docs/attachments
 */

namespace jc21;

class SlackAttachment
{
    protected $fallback   = null;
    protected $color      = null;
    protected $pretext    = null;
    protected $authorName = null;
    protected $authorLink = null;
    protected $authorIcon = null;
    protected $title      = null;
    protected $titleLink  = null;
    protected $text       = null;
    protected $fields     = [];
    protected $imageUrl   = null;


    /**
     * setFallback
     * Required plain-text summary of the attachment.
     *
     * @param  string  $fallback
     * @return void
     */
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;
    }


    /**
     * getFallback
     *
     * @return string
     */
    public function getFallback()
    {
        return $this->fallback;
    }


    /**
     * setColor
     * Hex color
     *
     * @param  string  $color
     * @return void
     */
    public function setColor($color)
    {
        $this->color = $color;
    }


    /**
     * getColor
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }


    /**
     * setPretext
     * Optional text that appears above the attachment block
     *
     * @param  string  $pretext
     * @return void
     */
    public function setPretext($pretext)
    {
        $this->pretext = $pretext;
    }


    /**
     * getPretext
     *
     * @return string
     */
    public function getPretext()
    {
        return $this->pretext;
    }


    /**
     * setAuthorName
     *
     * @param  string  $authorName
     * @return void
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }


    /**
     * getAuthorName
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }


    /**
     * setAuthorLink
     *
     * @param  string  $authorLink
     * @return void
     */
    public function setAuthorLink($authorLink)
    {
        $this->authorLink = $authorLink;
    }


    /**
     * getAuthorLink
     *
     * @return string
     */
    public function getAuthorLink()
    {
        return $this->authorLink;
    }


    /**
     * setAuthorIcon
     *
     * @param  string  $authorIcon
     * @return void
     */
    public function setAuthorIcon($authorIcon)
    {
        $this->authorIcon = $authorIcon;
    }


    /**
     * getAuthorIcon
     *
     * @return string
     */
    public function getAuthorIcon()
    {
        return $this->authorIcon;
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
     * setImageUrl
     *
     * @param  string  $imageUrl
     * @return void
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }


    /**
     * getImageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }


    /**
     * setTitle
     *
     * @param  string  $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * getTitle
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * setTitleLink
     *
     * @param  string  $titleLink
     * @return void
     */
    public function setTitleLink($titleLink)
    {
        $this->titleLink = $titleLink;
    }


    /**
     * getTitleLink
     *
     * @return string
     */
    public function getTitleLink()
    {
        return $this->titleLink;
    }


    /**
     * addField
     *
     * @param  string  $title
     * @param  string  $value
     * @param  bool    $short
     * @return void
     */
    public function addField($title, $value, $short = true)
    {
        $this->fields[] = [
            'title' => $title,
            'value' => $value,
            'short' => $short,
        ];
    }


    /**
     * getFields
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }


    /**
     * getFieldCount
     *
     * @return int
     */
    public function getFieldCount()
    {
        return count($this->fields);
    }


    /**
     * getHash
     * Used by SlackNotification to get the correctly formatted attachment data
     *
     * @return array
     * @throws \Exception
     */
    public function getHash()
    {
        if (!$this->fallback) {
            throw new \Exception('No attachment fallback specified');
        }

        $hash = ['fallback' => $this->getFallback()];

        if ($this->getColor()) {
            $hash['color'] = $this->getColor();
        }

        if ($this->getPretext()) {
            $hash['pretext'] = $this->getPretext();
        }

        if ($this->getAuthorName()) {
            $hash['author_name'] = $this->getAuthorName();
        }

        if ($this->getAuthorLink()) {
            $hash['author_link'] = $this->getAuthorLink();
        }

        if ($this->getAuthorIcon()) {
            $hash['author_icon'] = $this->getAuthorIcon();
        }

        if ($this->getTitle()) {
            $hash['title'] = $this->getTitle();
        }

        if ($this->getTitleLink()) {
            $hash['title_link'] = $this->getTitleLink();
        }

        if ($this->getText()) {
            $hash['text'] = $this->getText();
        }

        if ($this->getImageUrl()) {
            $hash['image_url'] = $this->getImageUrl();
        }

        if ($this->getFieldCount()) {
            $hash['fields'] = $this->getFields();
        }

        return $hash;
    }
}
