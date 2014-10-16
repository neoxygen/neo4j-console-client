<?php

namespace Neoxygen\ConsoleClient;

use Neoxygen\ConsoleClient\HttpClient\GuzzleHttpClient;

class Client
{
    protected $httpClient;

    protected $initQueries = [];

    protected $message;

    protected $query;

    protected $shortLink;

    public function __construct()
    {
        $this->httpClient = new GuzzleHttpClient();
    }

    public function addInitQuery($q)
    {
        $this->initQueries[] = $q;

        return $this;
    }

    public function addInitQueries(array $q)
    {
        $this->initQueries = array_merge($this->initQueries, $q);

        return $this;
    }

    public function setInitQueries(array $q)
    {
        $this->initQueries = $q;

        return $this;
    }

    public function addConsoleMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function addConsoleQuery($q)
    {
        $this->query = $q;

        return $this;
    }

    public function createConsole()
    {
        $body = [
            'init' => $this->prepareInitQueries(),
            'message' => $this->message,
            'query' => $this->query
        ];

        $json = json_encode($body);
        $this->shortLink = trim($this->httpClient->send($json));

        return $this;
    }

    public function getShortLink()
    {
        return 'http://console.neo4j.org/r/'.$this->shortLink;
    }

    private function prepareInitQueries()
    {
        $init = '';
        foreach ($this->initQueries as $initQ){
            $init .= $initQ.PHP_EOL;
        }

        return $init;
    }

}