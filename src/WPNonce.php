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
    /**
     * Retrieves or displays the nonce hidden form field.
     *
     * @param string $action        Action name. Should give the context to what is taking place.
     *                              Optional but recommended. Default: -1.
     * @param string $name          This is the name of the nonce hidden form field to be created. Once
     *                              the form is submitted, you can access the generated nonce via
     *                              $_POST[$name]. Default: '_wpnonce'
     * @param boolean $referer      Whether also the referer hidden form field should be created
     *                              with the wp_referer_field() function. Default: true
     * @param boolean $echo         Whether to display or return the nonce hidden form field,
     *                              and also the referer hidden form field if the $referer argument
     *                              is set to true. Default: true
     *
     * @return string               The nonce hidden form field, optionally followed by the referer
     *                              hidden form field if the $referer argument is set to true.
     */
    public function nonceField($action = -1, $name = '_wpnonce', $referer = true, $echo = true)
    {
        return wp_nonce_field($action, $name, $referer, $echo);
    }
    /**
     * Retrieve URL with nonce added to URL query. The returned result is escaped for display.
     *
     * @param string $actionUrl     URL to add nonce action
     * @param string $action        Nonce action name. Default: -1
     * @param string $name          Nonce name. Default: _wpnonce
     *
     * @return string               URL with nonce action added.
     */
    public function nonceUrl($actionUrl, $action = -1, $name = '_wpnonce')
    {
        return wp_nonce_url($actionUrl, $action, $name);
    }
    /**
     * Display 'The link you followed has expired.' message to confirm the action being taken.
     * If the action has the nonce explain message, then it will be displayed along with the
     * 'Are you sure?'
     *
     * @param string $action        The nonce action.
     *
     * @return void                 This function does not return a value.
     */
    public function nonceAys($action)
    {
        return wp_nonce_ays($action);
    }
    /**
     * Tests either if the current request carries a valid nonce, or if the current request
     * was referred from an administration screen; depending on whether the $action argument
     * is given (which is prefered), or not, respectively. On failure, the function dies
     * after calling the wp_nonce_ays() function.
     *
     * Used to avoid CSRF security exploits. Nonces should never be relied on for authentication
     * or authorization, access control. Protect your functions using current_user_can(),
     * always assume Nonces can be compromised.
     *
     * The now improper name of the function is kept for backward compatibility and has origin
     * in previous WordPress versions where the function only checked the referer. For details,
     * see the Notes section below.
     *
     * @param string $action          Action name. Should give the context to what is taking
     *                                place. (Since 2.0.1). Default: -1
     * @param string $queryArg        Where to look for nonce in the $_REQUEST PHP variable.
     *                                (Since 2.5). Default: '_wpnonce'
     *
     * @return boolean/void           To return boolean true, in the case of the obsolete usage,
     *                                the current request must be referred from an administration
     *                                screen; in the case of the prefered usage, the nonce must be
     *                                sent and valid. Otherwise the function dies with an
     *                                appropriate message ("Are you sure you want to do this?" by
     *                                default).
     */
    public function checkAdminReferer($action = -1, $queryArg = '_wpnonce')
    {
        return check_admin_referer($action, $queryArg);
    }
    /**
     * This function can be overridden by plugins. If no plugin redefines this function, then the
     * standard functionality will be used.
     *
     * The standard function verifies the AJAX request, to prevent any processing of requests which
     * are passed in by third-party sites or systems.
     *
     * Nonces should never be relied on for authentication, authorization or access control. Protect
     * your functions using current_user_can() and always assume that nonces can be compromised.
     *
     * @param string $action          Action nonce Default: -1
     * @param string $queryArg        Where to look for nonce in $_REQUEST (since 2.5) Default: false
     * @param boolean $die            Whether to die if the nonce is invalid Default: true
     *
     * @return boolean                If parameter $die is set to false, this function will return a
     *                                boolean of true if the check passes or false if the check fails.
     */
    public function checkAjaxReferer($action = -1, $queryArg = false, $die = true)
    {
        return check_ajax_referer($action, $queryArg, $die);
    }
}
