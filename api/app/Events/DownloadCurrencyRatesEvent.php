<?php

namespace App\Events;

use App\Contracts\ExchangeRateInterface;

class DownloadCurrencyRatesEvent extends Event
{
    public $service;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ExchangeRateInterface $service)
    {
        $this->service = $service;
    }
}
