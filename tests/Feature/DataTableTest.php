<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTable;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DataTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function main_page_contains_data_table_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('data-table');
    }

    /** @test */
    public function data_table_active_flag_works_correctly() {
        $active = User::factory()->count(1)->active()->create()->first();
        $inactive = User::factory()->count(1)->inActive()->create()->first();

        Livewire::test(DataTable::class)
            ->assertSee($active->name)
            ->assertDontSee($inactive->name)
            ->set('active', false)
            ->assertDontSee($active->name)
            ->assertSee($inactive->name);
    }

    /** @test */
    public function data_table_search_works_correcyly() {
        $users = User::factory()->count(2)->create();

        Livewire::test(DataTable::class)
            ->set('search', $users[0]->email)
            ->assertSee($users[0]->email)
            ->assertDontSee($users[1]->email);
    }

    /** @test */
    public function data_table_sort_by_name_works_correcyly() {
        $userA = User::factory()->create([
            'name' => 'Abigail A'
        ]);

        $userB = User::factory()->create([
            'name' => 'Zed Z'
        ]);

        Livewire::test(DataTable::class)
            ->set('sortField', 'name')
            ->assertSeeInOrder([$userA->name, $userB->name])
            ->set('sortAsc', false)
            ->assertSeeInOrder([$userB->name, $userA->name]);
    }

    /** @test */
    public function data_table_sort_by_email_works_correcyly() {
        $userA = User::factory()->create([
            'name' => 'Abigail A'
        ]);

        $userB = User::factory()->create([
            'name' => 'Zed Z'
        ]);

        Livewire::test(DataTable::class)
            ->set('sortField', 'email')
            ->assertSeeInOrder([$userA->email, $userB->email])
            ->set('sortAsc', false)
            ->assertSeeInOrder([$userB->email, $userA->email]);
    }
}
