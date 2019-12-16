<?php

declare(strict_types=1);

namespace Chanshige\Messages;

use Chanshige\Interfaces\SlackMessageInterface;

/**
 * Class AbstractSlackMessage
 *
 * @package Chanshige\Messages
 */
abstract class AbstractSlackMessage implements SlackMessageInterface
{
    /**
     * {@inheritDoc}
     */
    public function payload(): array
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this->payload(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
