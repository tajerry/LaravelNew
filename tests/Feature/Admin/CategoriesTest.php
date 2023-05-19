<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_status_success(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }
    public function test_create_status_success(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }
}
