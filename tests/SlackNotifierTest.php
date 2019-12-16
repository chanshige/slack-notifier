<?php

namespace Chanshige;

use Chanshige\Interfaces\SlackMessageInterface;
use Chanshige\Messages\SlackAttachment;
use Chanshige\Messages\SlackMessage;
use GuzzleHttp\Client;
use Mockery as M;
use PHPUnit\Framework\TestCase;

/**
 * Class SlackNotifierTest
 *
 * @package Chanshige
 */
class SlackNotifierTest extends TestCase
{
    /** @var Client $http */
    private $http;

    /** @var SlackNotifier */
    private $notifier;

    protected function setUp()
    {
        $this->http = M::mock(Client::class);
        $this->notifier = new SlackNotifier('https://hooks.slack.test.uri/', $this->http);
    }

    /**
     * @dataProvider stackDataProvider
     * @param SlackMessageInterface $message
     * @param array                 $data
     */
    public function testSend(SlackMessageInterface $message, $data)
    {
        $this->http->shouldReceive('post')->andReturnUsing(function ($uri, $payload) use ($data) {
            $this->assertEquals('https://hooks.slack.test.uri/', $uri);
            $this->assertEquals($payload, $data);
        });

        $this->notifier->send($message);
    }

    /**
     * @return array
     */
    public function stackDataProvider()
    {
        return [
            [
                $this->defaultMessage(),
                [
                    'json' => [
                        'channel' => '#general',
                        'username' => 'chanshigebot',
                        'icon_emoji' => ':smile:',
                        'icon_url' => 'http://localhost.icon.url',
                        'link_names' => 1,
                        'text' => 'Hello!',
                    ]
                ]
            ],
            [
                $this->messageWithAttachment(),
                [
                    'json' => [
                        'channel' => '#general',
                        'username' => 'chanshigebot',
                        'attachments' => [
                            [
                                'fallback' => 'fallback message',
                                'color' => '#black',
                                'author_name' => 'author name',
                                'pretext' => 'pretext',
                                'title' => 'text',
                                'title_link' => 'localhost.title.url',
                                'image_url' => 'localhost.image.url',
                                'thumb_url' => 'localhost.thumb.url',
                                'footer' => 'footer message',
                                'footer_icon' => 'http://localhost.icon.url',
                            ],
                            [
                                'fallback' => 'fallback message',
                                'color' => '#black',
                                'author_name' => 'author name',
                                'pretext' => 'pretext',
                                'title' => 'text',
                                'title_link' => 'localhost.title.url',
                                'image_url' => 'localhost.image.url',
                                'thumb_url' => 'localhost.thumb.url',
                                'footer' => 'footer message',
                                'footer_icon' => 'http://localhost.icon.url',
                            ],
                        ],
                    ]
                ]
            ]
        ];
    }

    /**
     * @return SlackMessage
     */
    protected function defaultMessage()
    {
        return (new SlackMessage())->channel('#general')
            ->username('chanshigebot')
            ->message('Hello!')->iconEmoji(':smile:')
            ->iconUrl('http://localhost.icon.url')
            ->linkNames();
    }

    protected function messageWithAttachment()
    {
        return (new SlackMessage())->channel('#general')
            ->username('chanshigebot')
            ->attachments(
                [
                    (new SlackAttachment())->fallback('fallback message')
                        ->color('#black')
                        ->authorName('author name')
                        ->pretext('pretext')
                        ->title('text')
                        ->footer('footer message')
                        ->footerIcon('http://localhost.icon.url')
                        ->imageUrl('localhost.image.url')
                        ->thumbUrl('localhost.thumb.url')
                        ->titleLink('localhost.title.url'),
                    (new SlackAttachment())->fallback('fallback message')
                        ->color('#black')
                        ->authorName('author name')
                        ->pretext('pretext')
                        ->title('text')
                        ->footer('footer message')
                        ->footerIcon('http://localhost.icon.url')
                        ->imageUrl('localhost.image.url')
                        ->thumbUrl('localhost.thumb.url')
                        ->titleLink('localhost.title.url')
                ]
            );
    }
}
