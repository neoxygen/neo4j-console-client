<?php

namespace Neoxygen\ConsoleClient\HttpClient;

use GuzzleHttp\Client;

class GuzzleHttpClient
{
    protected $client;

    protected $clientUrl = 'http://console.neo4j.org/r/share';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function send($content)
    {
        $request = $this->client->createRequest('POST', $this->clientUrl, ['body' => $content]);
        $request->setHeader('Content-Type', 'application/json');

        $response = $this->client->send($request);

        return (string) $response->getBody();
    }
}