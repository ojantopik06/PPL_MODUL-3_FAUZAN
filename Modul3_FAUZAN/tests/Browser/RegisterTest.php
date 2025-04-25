<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    /**
     * Test case untuk registrasi pengguna baru
     * @group Register
     */
    public function testRegist(): void 
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Register')
                    ->clickLink('Register')
                    ->assertPathIs('/register')
                    ->type('name', 'Admin')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Register')
                    ->pause(2000)
                    ->assertPathIs('/dashboard');
        });
    }
}