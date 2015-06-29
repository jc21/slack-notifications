<?php

require_once __DIR__ . '/../vendor/autoload.php';

use jc21\SlackNotification;
use jc21\SlackAttachment;

include('constants.php');

if (!SLACK_WEBHOOK_URL) {
	print 'ERROR: You must define your Incoming Web Hook in constants.php:SLACK_WEBHOOK_URL' . PHP_EOL;
	exit(1);
}


// Create Attachment first
$attachment = new SlackAttachment();
$attachment->setFallback('Someone has tested the slack-notifications code successfully');
$attachment->setPretext('<' . SELF_URL . '|slack-notifications> was tested');
$attachment->setColor('#00ce3a');
$attachment->setAuthorName('Jamie Curnow');
$attachment->setAuthorLink('http://jc21.com');
$attachment->setAuthorIcon('https://avatars2.githubusercontent.com/u/1518257?v=3&s=460');

// Fields of the Attachment
$attachment->addField('Long Item', 'This field contains longer text so we choose to set $short to false', false);
$attachment->addField('Type',      'Test',                                                                true);
$attachment->addField('Result',    'Success',                                                             true);

// The notification, which uses the Attachment
$notification = new SlackNotification(SLACK_WEBHOOK_URL);
$notification->setChannel(SLACK_CHANNEL);
$notification->setUsername('slack-notifications');
$notification->setIconUrl(ICON_URL);
$notification->addAttachment($attachment);

try {
    $notification->send();
} catch (\Exception $e) {
    print 'Error: ' . $e->getMessage() . PHP_EOL;
    exit(1);
}

print 'Success. Check ' . SLACK_CHANNEL . ' for a message.' . PHP_EOL;
