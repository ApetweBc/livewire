<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\http\Livewire\SearchDropdown;

class searchDropdowntest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function search_dropdown_page_exist(){

        $this->get('/')
        ->assertSeeLivewire('search-dropdown');
    }


    public function search_dropdown_searches_correctly_if_song_exist(){

         Livewire::test(searchDropdown::class)
         ->assertDontSee('John Lenon')
         ->set('search', 'Imagine')
         ->assertSee('John Lenon');

    }


    public function search_dropdown_searches_correctly_if_no_song_exist(){

        Livewire::test(searchDropdown::class)
        ->set('search', 'absxogmonel')
        ->assertSee('No search results');

   }

}
