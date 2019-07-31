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
}

function wp_create_nonce()
{
    return 1;
}
function wp_create_verify_nonce($nonce)
{
    return 1;
}
function wp_nonce_field()
{
    return 1;
}
