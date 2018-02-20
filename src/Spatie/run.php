<?php

use App\Spatie\Observers\LogsStatus;
use App\Spatie\Observers\SleepsForAMoment;
use App\Spatie\Observers\WritesLinksToTextFile;
use App\Spatie\Profiles\QueuesEventLinksForCrawling;
use Spatie\Crawler\Crawler;

require_once __DIR__ . './../../vendor/autoload.php';

// URL to scrape
/*
 * Example of simple crawler
 */
//Crawler::create()
//    ->setCrawlObserver(new LogsStatus())
//    ->setCrawlProfile(new QueuesEventLinksForCrawling())
//    ->startCrawling('http://www.sherdog.com/events');

/*
 * Example of a crawler that:
 * - sleeps after crawling each url
 * - only crawls one layer deep
 * - only crawls one url at a time
 * - uses multiple observers
 */
//Crawler::create()
//    ->setCrawlObservers([
//        new LogsStatus(),
//        new WritesLinksToTextFile(),
//    ])
//    ->setCrawlProfile(new QueuesEventLinksForCrawling())
//    ->setMaximumDepth(1)
//    ->setConcurrency(1)
//    ->startCrawling('http://www.sherdog.com/events');