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
//$crawler->filter('body > p');

// Filter via an XPath then anchor tags
//$crawler = $crawler->filterXPath('//*[@id="rock-circuitbreaker"]')
//    ->filter('a');

// Get link for specific text on page
//$crawler->selectLink('Terms of Use')->link();
