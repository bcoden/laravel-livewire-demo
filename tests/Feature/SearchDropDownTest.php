<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropDownTest extends TestCase
{
    /** @test  */
    public function main_page_contains_search_dropdown_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('search-dropdown');
    }

    /** @test */
    public function search_dropdown_searches_correctly_if_song_exists() {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('Hello')
            ->set('search', 'Walk off the earth')
            ->assertSee('Hello');
    }

    /** @test */
    public function search_dropdown_searches_correctly_if_song_does_not_exist() {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('No results found')
            ->set('search', 'jsahuadhci')
            ->assertSee('No results found');
    }
}
