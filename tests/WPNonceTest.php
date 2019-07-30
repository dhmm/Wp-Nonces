<?php
declare(strict_types = 1);

namespace Moutlou\Tests;

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
}
