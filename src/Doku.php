<?php

namespace Otezz\Doku;

/**
 * Class Doku
 *
 * @package Otezz\Doku
 */
class Doku
{
    public static $isProduction = false;

    //local
    const sandboxPrePaymentUrl = 'http://staging.doku.com/api/payment/PrePayment';
    const sandboxPaymentUrl = 'http://staging.doku.com/api/payment/paymentMip';
    const sandboxDirectPaymentUrl = 'http://staging.doku.com/api/payment/PaymentMIPDirect';
    const sandboxGenerateCodeUrl = 'http://staging.doku.com/api/payment/doGeneratePaymentCode';

    //production
    const prePaymentUrl = 'https://pay.doku.com/api/payment/PrePayment';
    const paymentUrl = 'https://pay.doku.com/api/payment/paymentMip';
    const directPaymentUrl = 'https//pay.doku.com/api/payment/PaymentMIPDirect';
    const generateCodeUrl = 'https://pay.doku.com/api/payment/doGeneratePaymentCode';

    public static $sharedKey; //doku's merchant unique key
    public static $mallId; //doku's merchant id

    public static function getPrePaymentUrl()
    {
        return Doku::$isProduction ?
            Doku::prePaymentUrl : Doku::sandboxPrePaymentUrl;
    }

    public static function getPaymentUrl()
    {
        return Doku::$isProduction ?
            Doku::paymentUrl : Doku::sandboxPaymentUrl;
    }

    public static function getDirectPaymentUrl()
    {
        return Doku::$isProduction ?
            Doku::directPaymentUrl : Doku::sandboxDirectPaymentUrl;
    }

    public static function getGenerateCodeUrl()
    {
        return Doku::$isProduction ?
            Doku::generateCodeUrl : Doku::sandboxGenerateCodeUrl;
    }
}
