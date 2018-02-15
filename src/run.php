<?php


use Goutte\Client;

require_once __DIR__ . './../vendor/autoload.php';


$client = new Client();

$crawler = $client->request('GET', 'https://github.com/explore');

$crawler->filter('a')->each(function ($node) {
    print_r($node->link()->getUri());
});