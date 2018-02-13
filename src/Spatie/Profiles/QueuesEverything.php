<?php

namespace App\Spatie\Profiles;

use League\CLImate\CLImate;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlProfile;

class QueuesEverything implements CrawlProfile
{
    protected $climate;

    public function __construct()
    {
        $this->climate = new CLImate();
    }

    /**
     * Determine if the given url should be crawled.
     *
     * @param \Psr\Http\Message\UriInterface $url
     *
     * @return bool
     */
    public function shouldCrawl(UriInterface $url): bool
    {
        return true;
    }
}