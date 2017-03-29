<?php

namespace Otezz\Doku;

use GuzzleHttp\Client;

/**
 * Class Library
 * Doku's Global Function
 *
 * @package Otezz\Doku
 */
class Library
{
    /**
     * @param $data
     * @return string
     */
    public static function createWords($data)
    {
        if (!empty($data['device_id'])) {
            if (!empty($data['pairing_code'])) {
                return sha1($data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'] . $data['token'] . $data['pairing_code'] . $data['device_id']);
            } else {
                return sha1($data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'] . $data['device_id']);
            }
        } else if (!empty($data['pairing_code'])) {
            return sha1($data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'] . $data['token'] . $data['pairing_code']);
        } else if (!empty($data['currency'])) {
            return sha1($data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency']);
        } else if (!empty($data['resultmsg']) && !empty($data['edustatus'])) {
            return sha1($data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['resultmsg'] . $data['edustatus']);
        } else {
            return sha1($data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice']);
        }
    }

    /**
     * @param $data
     * @return string
     */
    public static function createWordsRaw($data)
    {
        if (!empty($data['device_id'])) {
            if (!empty($data['pairing_code'])) {
                return $data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'] . $data['token'] . $data['pairing_code'] . $data['device_id'];
            } else {
                return $data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'] . $data['device_id'];
            }
        } else if (!empty($data['pairing_code'])) {
            return $data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'] . $data['token'] . $data['pairing_code'];
        } else if (!empty($data['currency'])) {
            return $data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'] . $data['currency'];
        } else {
            return $data['amount'] . Doku::$mallId . Doku::$sharedKey . $data['invoice'];
        }
    }

    /**
     * @param $data
     * @return string
     */
    public static function formatBasket($data)
    {
        $parseBasket = null;

        if (is_array($data)) {
            foreach ($data as $basket) {
                $parseBasket = $basket['name'] . ',' . $basket['amount'] . ',' . $basket['quantity'] . ',' . $basket['subtotal'] . ';';
            }
        } else if (is_object($data)) {
            foreach ($data as $basket) {
                $parseBasket = $basket->name . ',' . $basket->amount . ',' . $basket->quantity . ',' . $basket->subtotal . ';';
            }
        }

        return $parseBasket;
    }
}
