<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\GuzzleException;

class CountryController extends Controller
{
    protected $client;
    
    function __construct() 
    {
        $this->client = new Client();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAllCountries()
    {
        $allCountries = [];
        try{
            $res = $this->client->request('GET', 'https://restcountries.eu/rest/v2/all');
            $allCountries = json_decode($res->getBody());
        } catch(GuzzleException $e) {
            Log::info('API error: ' . $e->getMessage());
        }
        
        return view('country.list', compact('allCountries'));
    }

    public function countryDetail($countryId)
    {
        $country = [];
        try {
            $res = $this->client->request('GET', 'https://restcountries.eu/rest/v2/alpha/' . $countryId);
            $country = json_decode($res->getBody());
        } catch(GuzzleException $e) {
            Log::info('API error: ' . $e->getMessage());
        }
        
        
        return view('country.detail', compact('country'));
    }

    public function currencyCountries($currency)
    {
        $allCountries = [];
        try {
            $res = $this->client->request('GET', 'https://restcountries.eu/rest/v2/currency/' . $currency);
            $allCountries = json_decode($res->getBody());
        } catch(GuzzleException $e) {
            Log::info('API error: ' . $e->getMessage());
        }
        
        return view('country.list', compact('allCountries'));
    }
}
