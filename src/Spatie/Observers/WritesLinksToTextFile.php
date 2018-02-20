<?php

namespace App\Spatie\Observers;

use League\CLImate\CLImate;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver;
use Symfony\Component\DomCrawler\Crawler;

class WritesLinksToTextFile implements CrawlObserver
{
    protected $climate;

    public function __construct()
    {
        $this->climate = new CLImate();
    }

    /**
     * Called when the crawler will crawl the url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     *
     * @return void
     */
    public function willCrawl(UriInterface $url)
    {

    }

    /**
     * Called when the crawler has crawled the given url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface|null $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function hasBeenCrawled(UriInterface $url, $response, ?UriInterface $foundOnUrl = null)
    {
        // get body of response
        $response = (string)$response->getBody();

        // create a new DomCrawler element
        $crawler = new Crawler($response, $url);

        // filter out the links, map them with the domain and implode into a list
        $links = collect($crawler->filterXPath('//a')->links())
            ->map(function ($link) {
                return $link->getUri();
            })
            ->implode(PHP_EOL);

        // write out the links
        file_put_contents('links.txt', $links, FILE_APPEND);
    }

    /**
     * Called when the crawl has ended.
     *
     * @return void
     */
    public function finishedCrawling()
    {

    }
}