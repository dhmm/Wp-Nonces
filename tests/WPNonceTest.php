<?php
declare(strict_types = 1);

namespace Moutlou;

use PHPUnit\Framework\TestCase;
use Moutlou\WPNonce;

class WPNonceTest extends TestCase
{
    public function testCreateNonce()
    {
        $wpNonce = new WPNonce();
        $result = $wpNonce->createNonce();
        $this->assertEquals(1, $result);
    }
    public function testVerifyNonce()
    {
        $wpNonce = new WPNonce();
        $result = $wpNonce->verifyNonce($nonce = 'test-nonce');
        $this->assertEquals(1, $result);
    }
    public function testNonceField()
    {
        $wpNonce = new WPNonce();
        $result = $wpNonce->nonceField();
        $this->assertEquals(1, $result);
    }
    public function testRefererField()
    {
        $wpNonce = new WPNonce();
        $result = $wpNonce->refererField();
        $this->assertEquals(1, $result);        
    }
    public function testNonceUrl()
    {
      $wpNonce = new WPNonce();
      $result = $wpNonce->nonceUrl('https://github.com/dhmm');
      $this->assertEquals(1, $result);  
    }
    public function testNonceAys()
    {
      $wpNonce = new WPNonce();
      $result = $wpNonce->nonceAys('test-action');
      $this->assertEquals(1, $result);        
    }
    public function testCheckAdminReferer()
    {
      $wpNonce = new WPNonce();
      $result = $wpNonce->checkAdminReferer();
      $this->assertEquals(1, $result);        
    }
    public function testCheckAjaxReferer()
    {
      $wpNonce = new WPNonce();
      $result = $wpNonce->checkAjaxReferer();
      $this->assertEquals(1, $result);        
    }
}

function wp_create_nonce()
{
    return 1;
}
function wp_verify_nonce($nonce)
{
    return 1;
}
function wp_nonce_field()
{
    return 1;
}
function wp_referer_field()
{
    return 1;
}
function wp_nonce_url($actionUrl)
{
    return 1;
}
function wp_nonce_ays($action)
{
    return 1;
}
function check_admin_referer()
{
    return 1;
}
function check_ajax_referer()
{
    return 1;
}