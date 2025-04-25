<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotesTest extends DuskTestCase
{
    /**
     * Test case untuk menghapus catatan
     */
    public function testDeleteNotes(): void
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
                    ->assertSee('Delete') // Memastikan tombol Delete terlihat
                    ->press('Delete') // Mengklik tombol Delete pada catatan
                    ->pause(1000) // Menunggu 1 detik untuk konfirmasi
                    ->acceptDialog() // Menerima konfirmasi dialog penghapusan
                    ->pause(2000) // Menunggu 2 detik untuk proses penghapusan
                    ->assertDontSee('Catatan Test Update') // Memastikan catatan yang dihapus tidak terlihat
                    ->assertSee('Note deleted successfully'); // Memastikan pesan sukses muncul
        });
    }
}