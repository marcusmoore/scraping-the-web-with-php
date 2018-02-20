<?php


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once __DIR__ . './../vendor/autoload.php';

$url = 'https://www.theverge.com';

$guzzle = new Client();
$response = $guzzle->get($url);
$contents = (string)$response->getBody();

$crawler = new Crawler($contents, $url);

// jQuery-like filtering with CssSelector
//$headers = $crawler->filter('.c-compact-river h2');
//
//foreach($headers as $header){
//    echo $header->nodeValue . PHP_EOL;
//}

// Filter via an XPath then anchor tags
//$crawler = $crawler->filterXPath('//*[@id="rock-circuitbreaker"]')
//    ->filter('a');
//
//foreach($crawler as $anchor){
//    echo $anchor->nodeValue . PHP_EOL;
//}

// Get link for specific text on page
//$link = $crawler->selectLink('Terms of Use')->link();
//print_r($link);
//print_r($link->getUri());
