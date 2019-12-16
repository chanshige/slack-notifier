<?php

declare(strict_types=1);

namespace Chanshige\Messages;

/**
 * Class SlackMessage
 *
 * @package Chanshige\Messages
 */
class SlackMessage extends AbstractSlackMessage
{
    /** @var string|null */
    protected $channel;

    /** @var string|null */
    protected $username;

    /** @var string|null */
    protected $icon_emoji;

    /** @var string|null */
    protected $icon_url = '';

    /** @var int */
    protected $link_names = 0;

    /** @var string */
    protected $text;

    /** @var SlackAttachment[] */
    protected $attachments = [];

    /**
     * @param string $channel
     * @return $this
     */
    public function channel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @param string $username
     * @return SlackMessage
     */
    public function username(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $icon_emoji
     * @return SlackMessage
     */
    public function iconEmoji(string $icon_emoji): self
    {
        $this->icon_emoji = $icon_emoji;

        return $this;
    }

    /**
     * @param string $icon_url
     * @return SlackMessage
     */
    public function iconUrl(string $icon_url): self
    {
        $this->icon_url = $icon_url;

        return $this;
    }

    /**
     * @return SlackMessage
     */
    public function linkNames(): self
    {
        $this->link_names = 1;

        return $this;
    }

    /**
     * @param string $message
     * @return SlackMessage
     */
    public function message(string $message): self
    {
        $this->text = $message;

        return $this;
    }

    /**
     * @param SlackAttachment[] $attachments
     * @return SlackMessage
     */
    public function attachments(array $attachments): self
    {
        /** @var SlackAttachment $attachment */
        foreach ($attachments as $attachment) {
            $this->attachments[] = $attachment->payload();
        }

        return $this;
    }
}
