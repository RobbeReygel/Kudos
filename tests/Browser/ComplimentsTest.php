<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ComplimentsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $random = rand();

            $browser->loginAs(\App\User::find(1745658415475687))
                    ->visit('/user/163743962')
                    ->type('compliment', "This is a Dusky compliment with random data: $random")
                    ->press('Give compliment')
                    ->assertPathIs('/user/163743962')
                    ->assertSee("This is a Dusky compliment with random data: $random")
                    ->visit('/compliments/given')
                    ->assertSee("This is a Dusky compliment with random data: $random");                  

        });


    }
}