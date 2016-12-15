<?php

namespace Otezz\Doku;

/**
 * Class Doku
 *
 * @package Otezz\Doku
 */
class Doku
{
    /**
     *
     */
    const prePaymentUrl = 'http://staging.doku.com/api/payment/PrePayment';
    /**
     *
     */
    const paymentUrl = 'http://staging.doku.com/api/payment/paymentMip';
    /**
     *
     */
    const directPaymentUrl = 'http://staging.doku.com/api/payment/PaymentMIPDirect';
    /**
     *
     */
    const generateCodeUrl = 'http://staging.doku.com/api/payment/doGeneratePaymentCode';

    /**
     * Merchant's unique key
     *
     * @var
     */
    public static $sharedKey;

    /**
     * Merchant ID
     *
     * @var
     */
    public static $mallId;
}
