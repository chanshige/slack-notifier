<?php

namespace Chanshige\Interfaces;

/**
 * Interface SlackMessageInterface
 *
 * @package Chanshige\Interfaces
 */
interface SlackMessageInterface
{
    /**
     * @return array
     */
    public function payload(): array;
}
