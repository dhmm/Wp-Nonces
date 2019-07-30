<?php
declare(strict_types = 1);

/**
 * Package Bane : WpNonce
 * Descrioption : Composer package, which serves the functionality working with WordPress Nonces
 * Version      : 1.0
 * Author       : Moutlou
 * License      : GPLv2+
 *
 * @package Wordpress
 * @author Moutlou <dhmm@outlook.com>
 * @version 1.0
 */
namespace Moutlou;

class WPNonce
{
     /**
     * Generates and returns a nonce. The nonce is generated based on the current time ,
     * the $action argument and the current user ID.
     *
     * @param string/int $action    Action name. Should give the context to whats taking place.
     *
     * @return string               The one use form token.
     */
    public function createNonce($action = -1)
    {
        return wp_create_nonce($action);
    }

    /**
     *  Verify that a nonce is correct and unexpired with the respect to a specified action.
     *
     * @param string $nonce         Nonce to verify.
     * @param string/int $action    Action name. Should give the context to what is taking place and
     *                              be the same when the nonce was created. Default: -1
     *
     * @return string/int           Boolean false if the nonce is invalid. Otherwise, returns an integer
     *                              with the value of:
     *                              1 – if the nonce has been generated in the past 12 hours or less.
     *                              2 – if the nonce was generated between 12 and 24 hours ago.
     */
    public function verifyNonce($nonce, $action = -1)
    {
        return wp_create_verify_nonce($nonce, $action);
    }
}
