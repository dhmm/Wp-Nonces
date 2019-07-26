<?php
namespace Moutlou;

class WpNonce {
  /**
   * Generates and returns a nonce. The nonce is generated based on the current time , 
   * the $action argument and the current user ID.
   * 
   * @param $action (optional)
   *    Type :         string/int 
   *    Description :  Action name. Should give the context to what os taking place.
   */
  public function WpCreateNonce ($action=-1) {
    return wp_create_nonce($action);
  }
}