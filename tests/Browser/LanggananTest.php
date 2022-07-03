<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LanggananTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            // LOGIN
            $browser->assertGuest()->visit('/login')
                    ->type('email','user@mail.com')
                    ->type('password', 'user')
                    ->press('Sign In')
                    ->assertPathIs('/')
                    ->press('OK')
            // BERLANGGANAN
                    ->clickLink('Berlangganan')
                    ->assertPathIs('/subscriptions')
                    ->clicklink('All You Can Eat')
                    ->assertPathIs('/subscriptions/1')
                    ->press('Berlangganan')
                    ->assertPathIs('/cart')
                    ->press('OK')
            // PEMBAYARAN
                    ->clickLink('Checkout')
                    ->assertPathIs('/orders/create')
                    ->type('name','Muhammad Farrel Dwinanda')
                    ->type('phone', '081299073440')
                    ->type('address', 'jalan Kumala 2 Kemang Pratama')
                    ->attach('payment_proof', 'C:\foto rpl\Bukti Transfer.jpg')
                    ->press('Pesan')
            // LOGOUT DAN LOGIN ADMIN
                    ->visit('/logout')->logout()
                    ->assertGuest()->visit('/login')
                    ->type('email','admin@mail.com')
                    ->type('password', 'admin')
                    ->press('Sign In')
                    ->assertPathIs('/')
                    ->press('OK')
            // Menu Dashboard
                    ->visit('/admin')
                    ->clickLink('Pembelian')
                    ->assertPathIs('/admin/orders')
            // Terima Pesanan
                    ->clicklink('Detail')
                    ->press('Terima Pesanan')
                    ->assertSee('Pesanan Dikirim')
                    ->press('OK')
                    ->press('Pesanan Diterima');
        });
    }
}
