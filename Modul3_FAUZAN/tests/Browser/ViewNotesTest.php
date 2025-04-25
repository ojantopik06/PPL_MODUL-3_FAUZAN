<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewNotesTest extends DuskTestCase
{
    /**
     * Test case untuk melihat daftar catatan
     */
    public function testViewNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama
                    ->assertSee('Log in') // Memastikan teks 'Log in' terlihat di halaman
                    ->clickLink('Log in') // Mengklik tautan 'Log in'
                    ->assertPathIs('/login') // Memastikan berada di halaman login
                    ->type('email', 'admin@gmail.com') // Memasukkan email ke kolom email
                    ->type('password', 'password') // Memasukkan password ke kolom password
                    ->press('LOGIN') // Mengklik tombol LOGIN
                    ->pause(2000) // Menunggu 2 detik untuk memuat halaman
                    ->assertPathIs('/dashboard') // Memastikan diarahkan ke dashboard
                    ->assertSee('Note') // Memastikan teks 'Note' terlihat di halaman
                    ->clickLink('Note') // Mengklik tautan 'Note'
                    ->assertPathIs('/notes') // Memastikan berada di halaman notes
                    ->assertSee('My Notes') // Memastikan judul halaman terlihat
                    ->assertSee('Create Note') // Memastikan tombol Create Note terlihat
                    ->assertSee('Title') // Memastikan kolom Title terlihat
                    ->assertSee('Description') // Memastikan kolom Description terlihat
                    ->assertSee('Action') // Memastikan kolom Action terlihat
                    ->pause(2000); // Menunggu 2 detik untuk memuat data
        });
    }
}
