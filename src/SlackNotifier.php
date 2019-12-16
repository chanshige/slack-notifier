<?php

declare(strict_types=1);

namespace Chanshige;

use Chanshige\Interfaces\SlackMessageInterface;
use Chanshige\Interfaces\SlackNotifierInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;

/**
 * Class SlackNotifier
 *
 * @package Chanshige
 */
class SlackNotifier implements SlackNotifierInterface
{
    /** @var string */
    private $uri;

    /** @var ClientInterface */
    private $client;

    /**
     * SlackNotifier constructor.
     *
     * {@inheritDoc}
     */
    public function __construct(string $uri, ClientInterface $client = null)
    {
        $this->uri = $uri;
        $this->client = $client ?? new Client();
    }

    /**
     * {@inheritDoc}
     */
    public function send(SlackMessageInterface $message)
    {
        return $this->client->post(
            $this->uri,
            $this->jsonOption($message->payload())
        );
    }

    /**
     * return array with guzzle json option.
     *
     * @param array $data
     * @return array
     */
    protected function jsonOption(array $data): array
    {
        return [
            RequestOptions::JSON => $data
        ];
    }
}
