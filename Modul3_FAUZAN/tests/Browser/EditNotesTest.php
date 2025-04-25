<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * Test case untuk mengedit catatan
     */
    public function testEditNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama
                    ->assertSee('Log in') // Memastikan teks 'Login' terlihat di halaman
                    ->clickLink('Log in') // Mengklik tautan 'Login'
                    ->assertPathIs('/login') // Memastikan berada di halaman login
                    ->type('email', 'admin@gmail.com') // Memasukkan email ke kolom email
                    ->type('password', 'password') // Memasukkan password ke kolom password
                    ->press('LOGIN') // Mengklik tombol LOGIN
                    ->pause(2000) // Menunggu 2 detik untuk memuat halaman
                    ->assertPathIs('/dashboard') // Memastikan diarahkan ke dashboard
                    ->assertSee('Note') // Memastikan teks 'Note' terlihat di halaman
                    ->clickLink('Note') // Mengklik tautan 'Note'
                    ->assertPathIs('/notes') // Memastikan berada di halaman notes
                    ->assertSee('Edit') // Memastikan tombol Edit terlihat
                    ->clickLink('Edit') // Mengklik tombol Edit pada catatan
                    ->assertPathIs('/edit-note') // Memastikan berada di halaman edit catatan
                    ->type('Title', 'Catatan Test Update') // Mengubah judul catatan
                    ->type('Description', 'Ini adalah isi catatan yang sudah diupdate') // Mengubah isi catatan
                    ->press('UPDATE') // Mengklik tombol UPDATE
                    ->pause(2000) // Menunggu 2 detik untuk memuat halaman
                    ->assertPathIs('/notes') // Memastikan diarahkan kembali ke halaman notes
                    ->assertSee('Catatan Test Update') // Memastikan judul catatan yang diupdate terlihat
                    ->assertSee('Ini adalah isi catatan yang sudah diupdate'); // Memastikan isi catatan yang diupdate terlihat
        });
    }
}
