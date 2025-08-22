<?php

namespace Tests\Feature;

use App\Models\CModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_c_models(): void
    {
        CModel::factory()->count(3)->create();

        $response = $this->getJson('/api/models');

        $response->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'brand_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'links',
                'meta',
            ]);
    }
}
