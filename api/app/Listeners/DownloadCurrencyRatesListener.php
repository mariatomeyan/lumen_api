<?php

namespace App\Listeners;

use App\Events\DownloadCurrencyRatesEvent;
use App\Events\ExampleEvent;
use App\Services\Currency;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class DownloadCurrencyRatesListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DownloadCurrencyRatesEvent  $event
     * @return void
     */
    //todo will update the cache and the channel that one is subscribed to
    public function handle(DownloadCurrencyRatesEvent $event)
    {
       $currency = Currency::EUR->value;
       $response = Http::get($event->service->getAPIEndpoint().$currency);
       \App\Models\Currency::create([
           'currency' => $currency,
           'exchange_data' => $response
       ]);

    }
}
