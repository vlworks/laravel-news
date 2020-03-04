<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news')
                    ->type('category', '123')
                    ->press('Добавить категорию')
                    ->assertSee('Поле Назовите категорию обязательно для заполнения.');
        });
    }
}
