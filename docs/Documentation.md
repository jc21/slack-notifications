## Table of contents

- [\jc21\SlackAttachment](#class-jc21slackattachment)
- [\jc21\SlackNotification](#class-jc21slacknotification)

<hr /> 
### Class: \jc21\SlackAttachment

| Visibility | Function |
|:-----------|:---------|
| public | <strong>addField(</strong><em>string</em> <strong>$title</strong>, <em>string</em> <strong>$value</strong>, <em>bool</em> <strong>$short=true</strong>)</strong> : <em>void</em><br /><em>addField</em> |
| public | <strong>getAuthorIcon()</strong> : <em>string</em><br /><em>getAuthorIcon</em> |
| public | <strong>getAuthorLink()</strong> : <em>string</em><br /><em>getAuthorLink</em> |
| public | <strong>getAuthorName()</strong> : <em>string</em><br /><em>getAuthorName</em> |
| public | <strong>getColor()</strong> : <em>string</em><br /><em>getColor</em> |
| public | <strong>getFallback()</strong> : <em>string</em><br /><em>getFallback</em> |
| public | <strong>getFieldCount()</strong> : <em>int</em><br /><em>getFieldCount</em> |
| public | <strong>getFields()</strong> : <em>array</em><br /><em>getFields</em> |
| public | <strong>getHash()</strong> : <em>array</em><br /><em>getHash Used by SlackNotification to get the correctly formatted attachment data</em> |
| public | <strong>getImageUrl()</strong> : <em>string</em><br /><em>getImageUrl</em> |
| public | <strong>getPretext()</strong> : <em>string</em><br /><em>getPretext</em> |
| public | <strong>getText()</strong> : <em>string</em><br /><em>getText</em> |
| public | <strong>getTitle()</strong> : <em>string</em><br /><em>getTitle</em> |
| public | <strong>getTitleLink()</strong> : <em>string</em><br /><em>getTitleLink</em> |
| public | <strong>setAuthorIcon(</strong><em>string</em> <strong>$authorIcon</strong>)</strong> : <em>void</em><br /><em>setAuthorIcon</em> |
| public | <strong>setAuthorLink(</strong><em>string</em> <strong>$authorLink</strong>)</strong> : <em>void</em><br /><em>setAuthorLink</em> |
| public | <strong>setAuthorName(</strong><em>string</em> <strong>$authorName</strong>)</strong> : <em>void</em><br /><em>setAuthorName</em> |
| public | <strong>setColor(</strong><em>string</em> <strong>$color</strong>)</strong> : <em>void</em><br /><em>setColor Hex color</em> |
| public | <strong>setFallback(</strong><em>string</em> <strong>$fallback</strong>)</strong> : <em>void</em><br /><em>setFallback Required plain-text summary of the attachment.</em> |
| public | <strong>setImageUrl(</strong><em>string</em> <strong>$imageUrl</strong>)</strong> : <em>void</em><br /><em>setImageUrl</em> |
| public | <strong>setPretext(</strong><em>string</em> <strong>$pretext</strong>)</strong> : <em>void</em><br /><em>setPretext Optional text that appears above the attachment block</em> |
| public | <strong>setText(</strong><em>string</em> <strong>$text</strong>)</strong> : <em>void</em><br /><em>setText Optional text that appears within the attachment</em> |
| public | <strong>setTitle(</strong><em>string</em> <strong>$title</strong>)</strong> : <em>void</em><br /><em>setTitle</em> |
| public | <strong>setTitleLink(</strong><em>string</em> <strong>$titleLink</strong>)</strong> : <em>void</em><br /><em>setTitleLink</em> |

<hr /> 
### Class: \jc21\SlackNotification

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>string</em> <strong>$webhookUrl</strong>)</strong> : <em>void</em><br /><em>Constructor</em> |
| public | <strong>addAttachment(</strong><em>[\jc21\SlackAttachment](#class-jc21slackattachment)</em> <strong>$attachment</strong>)</strong> : <em>void</em><br /><em>addAttachment</em> |
| public | <strong>getAttachmentCount()</strong> : <em>int</em><br /><em>getAttachmentCount</em> |
| public | <strong>getAttachments()</strong> : <em>array</em><br /><em>getAttachments</em> |
| public | <strong>getChannel()</strong> : <em>string</em><br /><em>getChannel</em> |
| public | <strong>getIconEmoji()</strong> : <em>string</em><br /><em>getIconEmoji</em> |
| public | <strong>getIconUrl()</strong> : <em>string</em><br /><em>getIconUrl</em> |
| public | <strong>getProxy()</strong> : <em>string</em><br /><em>getProxy</em> |
| public | <strong>getText()</strong> : <em>string</em><br /><em>getText</em> |
| public | <strong>getTimeout()</strong> : <em>int</em><br /><em>getTimeout</em> |
| public | <strong>getUsername()</strong> : <em>string</em><br /><em>getUsername</em> |
| public | <strong>getWebhookUrl()</strong> : <em>string</em><br /><em>getWebhookUrl</em> |
| public | <strong>send()</strong> : <em>bool</em><br /><em>send</em> |
| public | <strong>setChannel(</strong><em>string</em> <strong>$channel</strong>)</strong> : <em>void</em><br /><em>setChannel Prefix with # for a room, or @ for a user.</em> |
| public | <strong>setIconEmoji(</strong><em>string</em> <strong>$iconEmoji</strong>)</strong> : <em>void</em><br /><em>setIconEmoji</em> |
| public | <strong>setIconUrl(</strong><em>string</em> <strong>$iconUrl</strong>)</strong> : <em>void</em><br /><em>setIconUrl</em> |
| public | <strong>setProxy(</strong><em>string</em> <strong>$proxy</strong>)</strong> : <em>void</em><br /><em>setProxy format: server.com:8080</em> |
| public | <strong>setText(</strong><em>string</em> <strong>$text</strong>)</strong> : <em>void</em><br /><em>setText Optional text that appears within the attachment</em> |
| public | <strong>setTimeout(</strong><em>int</em> <strong>$seconds</strong>)</strong> : <em>void</em><br /><em>setTimeout</em> |
| public | <strong>setUsername(</strong><em>string</em> <strong>$username</strong>)</strong> : <em>void</em><br /><em>setUsername</em> |

