# Slack Notifier
Slackへのメッセージ投稿を簡単にするやつ

## usage
 ```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Chanshige\SlackNotifier;
use Chanshige\Messages\SlackMessage;
use Chanshige\Messages\SlackAttachment;

// default message
$message = (new SlackMessage())->channel('#general')
            ->username('chanshigebot');

// with attachments
$attachment = (new SlackAttachment())->fallback('fallback message')
            ->color('#black')
            ->authorName('author name')
            ->pretext('pretext')
            ->title('text')
            ->footer('footer message')
            ->footerIcon('http://localhost.icon.url')
            ->imageUrl('localhost.image.url')
            ->thumbUrl('localhost.thumb.url')
            ->titleLink('localhost.title.url');

$message->attachments([$attachment]);

$notifier = new SlackNotifier('https://slack.incoming.webhook.uri');
// to slack!
$notifier->send($message);
```

## test
`$ composer test`  


## coverage
![coverage](https://i.gyazo.com/3fe2c2ab8536e66b785d7fa093dbcd59.png)

## License
MIT

## Author
[chanshige](https://twitter.com/chanshige)