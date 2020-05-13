<?php

namespace App\Http\Controllers;

use Artisaninweb\SoapWrapper\Exceptions\ServiceAlreadyExists;
use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;

class SoapController
{
    /**
     * @var SoapWrapper
     */
    protected $soapWrapper;

    /**
     * SoapController constructor.
     *
     * @param SoapWrapper $soapWrapper
     */
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    /**
     * Use the SoapWrapper
     * @throws ServiceAlreadyExists
     */
    public function show()
    {
        $this->soapWrapper->add('Currency', function ($service) {
            $service
                ->wsdl('http://www.realsun.com.tw/API/index.php?wsdl')
                ->trace(true);
        });

        // Without classmap
        $response = $this->soapWrapper->call('Currency.getKey', [
            'nhid' => 'USD',
            'password'   => 'EUR',
        ]);

        var_dump($response);

        /*// With classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
            new GetConversionAmount('USD', 'EUR', '2014-06-05', '1000')
        ]);

        var_dump($response);*/
        exit;
    }
}