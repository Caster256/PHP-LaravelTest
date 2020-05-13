<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use GuzzleHttp\Client;

use GuzzleHttp\Client;

class guzzleController extends Controller
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $url = 'http://www.realsun.com.tw/API/restful.php/Get_syndrome_data';

        $result = $this->client->post($url, [
            'json' => [
                'date' => '2020-04-03'
            ]
        ]);

       $json_arr = json_decode($result->getBody(), true);

        echo '<pre>';
        print_r($json_arr);
        echo '</pre>';
    }
}
