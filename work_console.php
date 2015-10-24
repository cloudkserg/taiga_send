<?php
define('ROOT_PATH', __DIR__);
require_once(ROOT_PATH . '/vendor/autoload.php');

use Taiga\Api;
use Taiga\IssueType;
use Commando\Command;


//config params
$params = require_once(ROOT_PATH . '/config.php');
$connParams = $params['connection'];
$issueParams = $params['issue'];



//arguments
$command = new Command();
$command->option()->require()->describedAs('A name of issue');
$command->option()->require()->describedAs('A text of issue');

$messageName = $command[0];
$messageText = $command[1];

//api
$api = new Api($connParams['url']);
$api->login($connParams['login'], $connParams['pass']);
$api->createIssue($issueParams['authorId'], $issueParams['projectId'], 
    $messageName, IssueType::QUESTION, $messageText
);








