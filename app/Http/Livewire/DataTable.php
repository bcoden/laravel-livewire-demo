<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $search;
    public $active = true;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = [
        'search',
        'sortField',
        'sortAsc',
        'active',
        'page' => ['except' => 1]
    ];

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
            ->when($this->sortField, function($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->paginate(10);
        return view('livewire.data-table', [
            'users' => $users
        ]);
    }
}
