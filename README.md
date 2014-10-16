## Neo4j Console Client

Simple PHP Client for creating Neo4j console setups (see http://console.neo4j.org)

### Usage

#### Installation

Via composer : 

```bash
composer require neoxygen/neo4j-console-client
```

#### Init Queries, Message and Console Query

You can add queries to setup the console, add a message to the user and a first query when the console load :

```php

require_once 'vendor/autoload.php';

use Neoxygen\ConsoleClient\Client;

$consoleClient = new Client();
$consoleClient
    ->addInitQuery('CREATE (p:Person)')
    ->addInitQuery('CREATE (c:Company)')
    ->addInitQuery('MERGE (p)-[:WORKS_AT]->(c);')
    ->addConsoleMessage('An awesome Neo4j console setup')
    ->createConsole();

$consoleUrl = $consoleClient->getShortLink();
// -> http://console.neo4j.org/r/8iijau
```

Open the link and enjoy !

![img](http://g.recordit.co/pLPKu1bvv8.gif)

#### Todo

[ ] Generation from files in Terminal

--- 

### Author

Christophe Willemsen : [twitter](https://twitter.com/ikwattro) | [github](https://github.com/ikwattro)

### License

Released under the MIT License, view the License file shipped with this library