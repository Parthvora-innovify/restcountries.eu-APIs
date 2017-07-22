<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\GuzzleException;

class CountryController extends Controller
{
    /**
     * The Guzzle Client object.
     *
     * @var client
     */
    protected $client;

    /**
     * The base URL of the API.
     *
     */
    const API_URL = 'https://restcountries.eu/rest/v2/';
    
    /**
     * Intianiatate Guzzle
     * Constructor
     */
    function __construct() 
    {
        $this->client = new Client();
    }

    /**
     * Display country listing.
     *
     * @return \Illuminate\View\View
     */
    public function listAllCountries()
    {
        $allCountries = [];
        try{
            $res = $this->client->request('GET', self::API_URL . 'all');
            $allCountries = json_decode($res->getBody());
        } catch(GuzzleException $e) {
            Log::info('API error: ' . $e->getMessage());
        }
        
        return view('country.list', compact('allCountries'));
    }

    /**
     * Display details of a specific country.
     *
     * @param  srting  $countryId
     * @return \Illuminate\View\View
     */
    public function countryDetail($countryId)
    {
        $country = [];
        try {
            $res = $this->client->request('GET', self::API_URL . 'alpha/' . $countryId);
            $country = json_decode($res->getBody());
        } catch(GuzzleException $e) {
            Log::info('API error: ' . $e->getMessage());
        }
        
        
        return view('country.detail', compact('country'));
    }

    /**
     * Display all countries which are using specified currency.
     *
     * @param  srting  $currency
     * @return \Illuminate\View\View
     */
    public function currencyCountries($currency)
    {
        $allCountries = [];
        try {
            $res = $this->client->request('GET', self::API_URL . 'currency/' . $currency);
            $allCountries = json_decode($res->getBody());
        } catch(GuzzleException $e) {
            Log::info('API error: ' . $e->getMessage());
        }
        
        return view('country.list', compact('allCountries'));
    }
}
