<?php

namespace Neoxygen\ConsoleClient\Tests;

use Neoxygen\ConsoleClient\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateConsole()
    {
        $client = new Client();
        $client
            ->addInitQuery('CREATE (n:Person)')
            ->addInitQuery('CREATE (c:Company)')
            ->addInitQuery('MERGE (n)-[:WORKS_AT]->(c);')
            ->addConsoleMessage('An awesome Neo4j console setup')
            ->addConsoleQuery('MATCH (n) RETURN n;')
            ->createConsole();

        $link = $client->getShortLink();

        print($link);
    }
}