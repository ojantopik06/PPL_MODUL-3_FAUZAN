<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Test case untuk login berhasil dengan kredensial yang valid
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama
                    ->assertSee('Log in') // Memastikan teks 'Login' terlihat di halaman
                    ->clickLink('Log in') // Mengklik tautan 'Login'
                    ->assertPathIs('/login') // Memastikan berada di halaman login
                    ->type('email', 'admin@gmail.com') // Memasukkan email ke kolom email
                    ->type('password', 'password') // Memasukkan password ke kolom password
                    ->press('LOG IN') // Mengklik tombol LOGIN
                    ->pause(2000) // Menunggu 2 detik untuk memuat halaman
                    ->assertPathIs('/dashboard'); // Memastikan diarahkan ke dashboard
        });
    }
}