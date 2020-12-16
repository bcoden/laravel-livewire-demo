<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataTableTest extends TestCase
{
    /** @test  */
    public function main_page_contains_data_table_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('data-tables');
    }
}
