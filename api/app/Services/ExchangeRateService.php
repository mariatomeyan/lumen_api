<?php
namespace App\Services;

use App\Interfaces\ExchangeRateInterface;
use App\Services\Currency;

class ExchangeRateService implements ExchangeRateInterface {
    private $currency;

    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }
    public function getAPIEndpoint(): string
    {
        return 'env()';
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function exchange(Currency $exchange_to): float
    {
       return 'calculation ';
    }

}
