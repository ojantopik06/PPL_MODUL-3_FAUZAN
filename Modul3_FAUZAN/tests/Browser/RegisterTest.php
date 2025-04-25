<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * Test case untuk registrasi pengguna baru
     */
    public function tesRegist(): void 
    {
        $this->browse(function (Browser $browser) { // Memulai test browser dengan callback function
            $browser->visit('/') // Mengunjungi halaman utama website
            ->assertSee('Register') // Memastikan teks 'Register' terlihat di halaman
            ->clickLink(link: 'Register') // Mengklik tautan 'Register'
            ->assertPathIs(path: '/Register') // Memastikan berada di halaman registrasi
            ->type(field: 'Name', value: 'Admin') // Memasukkan nama ke kolom nama
            ->type(field: ' Email', value: 'admin@gmail.com') // Memasukkan email ke kolom email
            ->type(field: 'Password', value: 'password') // Memasukkan password ke kolom password
            ->type(field: 'Confirm Password', value: 'password') // Memasukkan konfirmasi password
            ->Press(Button: 'REGISTER') // Mengklik tombol register
            ->Pause(2000) // Menunggu 2 detik untuk memuat halaman
            ->assertPathIs(path: '/dashboard'); // Memastikan diarahkan ke dashboard
        });
    }
}