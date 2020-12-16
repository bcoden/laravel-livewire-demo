<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTables extends Component
{
    use WithPagination;

    public $search;
    public $active = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $wildcard = '%%%s%%';
        $users = User::where('name', 'like', sprintf($wildcard, $this->search))
            ->orWhere('email', 'like', sprintf($wildcard, $this->search))
            ->active($this->active)->paginate(10);
        return view('livewire.data-tables', [
            'users' => $users
        ]);
    }
}
