<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_return_igv_to_price()
    {
        $this->assertEquals(18, igv(100));
    }

    public function test_return_total_price()
    {
        $this->assertEquals(118, total_price(100));
    }

    public function test_return_igv_to_total_price()
    {
        $this->assertEquals(100, get_igv_to_total_price(118));
    }

    public function test_return_mail_validation()
    {
        $this->assertTrue(mail_validation('Echumacero@mail.com'));
        $this->assertFalse(mail_validation('xd'));
    }
}
