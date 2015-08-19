Slack Notifications from your PHP App
================================================

- Send to any Channel or User
- Full webhook options set supported
- Attachments for nice field data display

### Installing via Composer

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version:

```bash
composer.phar require jc21/slack-notifications
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Using

[Class documentation](docs/Documentation.md)

See the tests folder for some examples, but basically here's how to use it:

```php
use jc21\SlackNotification;
use jc21\SlackAttachment;

$webhookUrl = 'your incoming webhook url';
$iconURl    = '';

// Create Attachment first
$attachment = new SlackAttachment();
$attachment->setFallback('Someone has tested the slack-notifications code successfully');
$attachment->setPretext('<https://github.com/jc21/slack-notifications|slack-notifications> was tested');
$attachment->setColor('#00ce3a');
$attachment->setAuthorName('Jamie Curnow');
$attachment->setAuthorLink('http://jc21.com');
$attachment->setAuthorIcon('https://avatars2.githubusercontent.com/u/1518257?v=3&s=460');

// Fields of the Attachment
$attachment->addField('Description', 'slack-notifications is a PHP package to help you out', false);
$attachment->addField('Type',        'Test',                                                 true);
$attachment->addField('Result',      'Success',                                              true);

// The notification, which uses the Attachment
$notification = new SlackNotification($webhookUrl);
$notification->setChannel('#general');  // Use @ for a username. ie: @jc21
$notification->setUsername('slack-notifications');
$notification->setIconUrl($iconUrl);
$notification->addAttachment($attachment);

try {
    $notification->send();
} catch (\Exception $e) {
    print 'Error: ' . $e->getMessage() . PHP_EOL;
    exit(1);
}
```
