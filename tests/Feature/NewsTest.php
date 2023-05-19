<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_status_success(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }
    public function test_show_status_success(): void
    {
        $response = $this->get( route('news.show',[
            'id' => 1
        ]));

        $response->assertStatus(200);
    }
}
