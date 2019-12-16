<?php

namespace Chanshige\Interfaces;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface SlackNotifierInterface
 *
 * @package Chanshige\Interfaces
 */
interface SlackNotifierInterface
{
    /**
     * SlackNotifierInterface constructor.
     *
     * @param string          $uri    incoming webhook uri
     * @param ClientInterface $client guzzle client
     */
    public function __construct(string $uri, ClientInterface $client = null);

    /**
     * Send message to slack.
     *
     * @param SlackMessageInterface $message
     * @return ResponseInterface
     */
    public function send(SlackMessageInterface $message);
}
