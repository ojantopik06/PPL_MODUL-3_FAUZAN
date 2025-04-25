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
                    ->assertSee('View') // Memastikan tombol View terlihat
                    ->clickLink('View') // Mengklik tombol View pada catatan
                    ->pause(2000) // Menunggu 2 detik untuk memuat halaman
                    ->assertPathIs('/view-note') // Memastikan berada di halaman detail catatan
                    ->assertSee('Note Detail') // Memastikan judul halaman detail terlihat
                    ->assertSee('Title') // Memastikan label Title terlihat
                    ->assertSee('Description') // Memastikan label Description terlihat
                    ->assertPresent('.note-title') // Memastikan elemen judul catatan ada
                    ->assertPresent('.note-description') // Memastikan elemen deskripsi catatan ada
                    ->assertSee('Back') // Memastikan tombol Back terlihat
                    ->clickLink('Back') // Mengklik tombol Back
                    ->assertPathIs('/notes'); // Memastikan kembali ke halaman notes
        });
    }
}
