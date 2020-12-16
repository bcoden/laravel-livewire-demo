<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    const API_ENDPOINT = 'https://itunes.apple.com/search';

    public $search;
    public $searchResults = [];

    public function updatedSearch($newValue) {
        if (strlen($this->search) < 3) {
            $this->searchResults =[];
            return;
        }

        $searchFor = urlencode($this->search);
        $response = Http::get(sprintf('%s?term=%s&limit=10', self::API_ENDPOINT, $searchFor));
        $this->searchResults = $response->json()['results'];
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
