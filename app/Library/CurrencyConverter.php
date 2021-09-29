<?php


namespace App\Library;


use Cache;
use Http;

class CurrencyConverter
{
    /**
     * @param string $currency
     * @return mixed
     */
    public function getCurrencyConversion(string $currency = "NGN"): mixed
    {
        $rates = $this->getRates();
        return $rates[$currency] ?? null;
    }

    /**
     * used to get the array of currencies
     * @return mixed
     */
    private function getRates(): mixed
    {
        return Cache::remember('currencies', 1000, function () {
            $url = "https://currencyapi.net/api/v1/rates?key=AWRs068UtzA5CuC7o8iePiJw9uhUvLV08Xdu&base=USD";
            $now = Http::get($url, [
                'key' => 'AWRs068UtzA5CuC7o8iePiJw9uhUvLV08Xdu',
                'base' => 'USD'
            ]);
            return $now->json('rates');
        });
    }
}
