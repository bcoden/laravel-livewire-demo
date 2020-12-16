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
    public $sortField = 'created_at';
    public $sortAsc = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSortColumn($column) {
        // toggle sort direction
        if ($column === $this->sortField) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $column;
    }

    public function render()
    {
        $wildcard = '%%%s%%';
        $users = User::where('name', 'like', sprintf($wildcard, $this->search))
            ->orWhere('email', 'like', sprintf($wildcard, $this->search))
            ->active($this->active)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);
        return view('livewire.data-tables', [
            'users' => $users
        ]);
    }
}
