<?php

declare(strict_types=1);

namespace Chanshige\Messages;

/**
 * Class SlackAttachment
 *
 * @package Chanshige\Messages
 */
class SlackAttachment extends AbstractSlackMessage
{
    /** @var string|null */
    protected $fallback;

    /** @var string|null */
    protected $color;

    /** @var string|null */
    protected $author_name;

    /** @var string|null */
    protected $pretext;

    /** @var string|null */
    protected $title;

    /** @var string|null */
    protected $title_link;

    /** @var string|null */
    protected $text;

    /** @var string|null */
    protected $image_url;

    /** @var string|null */
    protected $thumb_url;

    /** @var string|null */
    protected $footer;

    /** @var string|null */
    protected $footer_icon;

    /**
     * @param string $fallback
     * @return SlackAttachment
     */
    public function fallback(string $fallback): self
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * @param string $color
     * @return SlackAttachment
     */
    public function color(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param string $author_name
     * @return SlackAttachment
     */
    public function authorName(string $author_name): self
    {
        $this->author_name = $author_name;

        return $this;
    }

    /**
     * @param string $pretext
     * @return SlackAttachment
     */
    public function pretext(string $pretext): self
    {
        $this->pretext = $pretext;

        return $this;
    }

    /**
     * @param string $title
     * @return SlackAttachment
     */
    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $title_link
     * @return SlackAttachment
     */
    public function titleLink(string $title_link): self
    {
        $this->title_link = $title_link;

        return $this;
    }

    /**
     * @param string $message
     * @return SlackAttachment
     */
    public function message(string $message): self
    {
        $this->text = $message;

        return $this;
    }

    /**
     * @param string $image_url
     * @return SlackAttachment
     */
    public function imageUrl(string $image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * @param string $thumb_url
     * @return SlackAttachment
     */
    public function thumbUrl(string $thumb_url): self
    {
        $this->thumb_url = $thumb_url;

        return $this;
    }

    /**
     * @param string $footer
     * @return SlackAttachment
     */
    public function footer(string $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * @param string $footer_icon
     * @return SlackAttachment
     */
    public function footerIcon(string $footer_icon): self
    {
        $this->footer_icon = $footer_icon;

        return $this;
    }
}
