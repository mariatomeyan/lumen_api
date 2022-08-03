<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CurrencyExchangeDownloaderCommand extends Command {

    protected $signature = 'download:currency:rates';
    protected $description = 'Downloads currency rates!';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://v6.exchangerate-api.com/v6/b9355d54a2ca68fa63838170/latest/EUR');
        $this->info($response->body());
    }
}
