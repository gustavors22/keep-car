<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Piece;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PieceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_pieces_list()
    {
        $pieces = Piece::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.pieces.index'));

        $response->assertOk()->assertSee($pieces[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_piece()
    {
        $data = Piece::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.pieces.store'), $data);

        $this->assertDatabaseHas('pieces', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_piece()
    {
        $piece = Piece::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber,
        ];

        $response = $this->putJson(route('api.pieces.update', $piece), $data);

        $data['id'] = $piece->id;

        $this->assertDatabaseHas('pieces', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_piece()
    {
        $piece = Piece::factory()->create();

        $response = $this->deleteJson(route('api.pieces.destroy', $piece));

        $this->assertDeleted($piece);

        $response->assertNoContent();
    }
}
