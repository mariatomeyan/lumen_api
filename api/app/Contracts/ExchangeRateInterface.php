<?php

namespace App\Contracts;
use App\Services\Currency;

interface ExchangeRateInterface
{
    public function getAPIEndpoint(): string;
    public function getCurrency(): string;
    public function exchange(Currency $exchange_to): float;
}
