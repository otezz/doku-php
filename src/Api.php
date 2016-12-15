<?php

namespace Otezz\Doku;

use GuzzleHttp\Client;

/**
 * Class Api
 * Api for DOKU communications
 *
 * @package Otezz\Doku
 */
class Api
{
    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function prePayment($data)
    {
        $data['req_basket'] = Library::formatBasket($data['req_basket']);

        return self::getResponse(Doku::prePaymentUrl, $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function payment($data)
    {
        $data['req_basket'] = Library::formatBasket($data['req_basket']);

        return self::getResponse(Doku::paymentUrl, $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function directPayment($data)
    {
        return self::getResponse(Doku::directPaymentUrl, $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function generatePaycode($data)
    {
        return self::getResponse(Doku::generateCodeUrl, $data);
    }

    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private static function getResponse($url, $data)
    {
        $client = new Client();
        $response = $client->post($url, [
            'form_params' => ['data' => json_encode($data)],
        ]);

        return $response;
    }
}
