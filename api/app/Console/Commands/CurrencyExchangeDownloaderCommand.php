<?php
namespace App\Console\Commands;
use App\Events\DownloadCurrencyRatesEvent;
use App\Services\Currency;
use App\Services\ExchangeRateService;
use Illuminate\Console\Command;

class CurrencyExchangeDownloaderCommand extends Command {

    protected $signature = 'download:currency:rates';
    protected $description = 'Downloads currency rates';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $service =  new ExchangeRateService(Currency::EUR);
        event(new DownloadCurrencyRatesEvent($service));
    }
}
