<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_store_successfully()
    {
        $response = $this->post(
            route('categories.store'),
            [
                'name' => 'ropa',
            ]
        );

        $response->assertStatus(200);
    }

    public function test_categories_index_successfully()
    {
        $response = $this->get(route('categories.index'));
        $response->assertStatus(200);
    }

    public function test_categories_update_successfully()
    {
        $category = Category::where('name', 'ropa')->first();
        $response = $this->put(
            route('categories.update', $category->id),
            [
                'name'=>'ropa2',
            ]
        );

        $response->assertStatus(200);
    }

    public function test_categories_show_successfully()
    {
        $category = Category::where('name','ropa2')->first();
        $response = $this->get(
            route('categories.show',$category->id)
        );
        $response->assertStatus(200);
    }

    public function test_categories_destroy_successfully()
    {
        $category = Category::where('name','ropa2')->first();
        $response = $this->delete(
            route('categories.destroy',$category->id)
        );
        $response->assertStatus(200);
    }
}
