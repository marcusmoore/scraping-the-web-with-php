<?php

namespace App\Spatie\Observers;

use League\CLImate\CLImate;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver;

class LogsStatus implements CrawlObserver
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
        $this->climate->out('Will crawl: ' . $url);
    }

    /**
     * Called when the crawler has crawled the given url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface|null $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     *
     * @return void
     */
    public function hasBeenCrawled(UriInterface $url, $response, ?UriInterface $foundOnUrl = null)
    {
        $this->climate->bold()->out('Finished crawling: ' . $url);
    }

    /**
     * Called when the crawl has ended.
     *
     * @return void
     */
    public function finishedCrawling()
    {
        $this->climate->green()->bold('Finished crawling the queue!');
    }
}