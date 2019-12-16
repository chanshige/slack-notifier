<?php

namespace Chanshige\Messages;

use PHPUnit\Framework\TestCase;

/**
 * Class SlackMessageTest
 *
 * @package Chanshige\Messages
 */
class SlackMessageTest extends TestCase
{
    public function testBuildMessage()
    {
        $message = new SlackMessage();
        $message->channel('#general')
            ->username('chanshigebot')
            ->message('Hello!')->iconEmoji(':smile:')
            ->iconUrl('http://localhost.icon.url')
            ->linkNames();

        $expected = [
            "channel" => "#general",
            "username" => "chanshigebot",
            "icon_emoji" => ":smile:",
            "icon_url" => "http://localhost.icon.url",
            "link_names" => 1,
            "text" => "Hello!",
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)$message
        );
    }

    public function testBuildMessageWithAttachments()
    {
        $message = new SlackMessage();
        $message->channel('#general')
            ->username('chanshigebot');

        $attachment = new SlackAttachment();
        $attachment->fallback('fallback message')
            ->color('#black')
            ->authorName('author name')
            ->pretext('pretext')
            ->title('text')
            ->footer('footer message')
            ->footerIcon('http://localhost.icon.url')
            ->imageUrl('localhost.image.url')
            ->thumbUrl('localhost.thumb.url')
            ->titleLink('localhost.title.url');

        $attachment1 = new SlackAttachment();
        $attachment1->fallback('fallback message')
            ->color('#black')
            ->authorName('author name')
            ->pretext('pretext')
            ->title('text')
            ->footer('footer message')
            ->footerIcon('http://localhost.icon.url')
            ->imageUrl('localhost.image.url')
            ->thumbUrl('localhost.thumb.url')
            ->titleLink('localhost.title.url');

        $message->attachments([$attachment, $attachment1]);

        $expected = [
            "channel" => "#general",
            "username" => "chanshigebot",
            "attachments" => [
                [
                    "fallback" => "fallback message",
                    "color" => "#black",
                    "author_name" => "author name",
                    "pretext" => "pretext",
                    "title" => "text",
                    "title_link" => "localhost.title.url",
                    "image_url" => "localhost.image.url",
                    "thumb_url" => "localhost.thumb.url",
                    "footer" => "footer message",
                    "footer_icon" => "http://localhost.icon.url",
                ],
                [
                    "fallback" => "fallback message",
                    "color" => "#black",
                    "author_name" => "author name",
                    "pretext" => "pretext",
                    "title" => "text",
                    "title_link" => "localhost.title.url",
                    "image_url" => "localhost.image.url",
                    "thumb_url" => "localhost.thumb.url",
                    "footer" => "footer message",
                    "footer_icon" => "http://localhost.icon.url",
                ],
            ],
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)$message
        );
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage A Chanshige\Messages\SlackMessage::attachments must hold only Chanshige\Interfaces\SlackMessageInterface instances.
     */
    public function testFailedAttachmentInstance()
    {
        (new SlackMessage())->attachments([new \ArrayIterator()]);
    }
}
