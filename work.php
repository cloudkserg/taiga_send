<?php
define('ROOT_PATH', __DIR__);
require_once(ROOT_PATH . '/vendor/autoload.php');

use Taiga\Api;
use Taiga\IssueType;


$taigaUrl = 'http://xxx.com/';
$login = 'xxx@gmail.com';
$pass = 'xxxx';
$taigaAuthorId = 16;
$taigaProjectId = 7;

$api = new Api($taigaUrl);
$api->login($login, $pass);



$name = 'Title';
$mail = 'Mail';
$msg = 'Message';
$api->createIssue($taigaAuthorId, $taigaProjectId, $name, IssueType::QUESTION, $msg);








