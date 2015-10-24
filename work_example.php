<?php
define('ROOT_PATH', __DIR__);
require_once(ROOT_PATH . '/vendor/autoload.php');
$params = require_once(ROOT_PATH . '/config.php');

use Taiga\Api;
use Taiga\IssueType;

$connParams = $params['connection'];
$issueParams = $params['issue'];

$api = new Api($connParams['url']);
$api->login($connParams['login'], $connParams['pass']);

$messageName = 'Title';
$messageText = 'Message';
$api->createIssue($issueParams['authorId'], $issueParams['projectId'], 
    $messageName, IssueType::QUESTION, $messageText
);








