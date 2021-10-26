<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Piece;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PieceControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_pieces()
    {
        $pieces = Piece::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pieces.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pieces.index')
            ->assertViewHas('pieces');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_piece()
    {
        $response = $this->get(route('pieces.create'));

        $response->assertOk()->assertViewIs('app.pieces.create');
    }

    /**
     * @test
     */
    public function it_stores_the_piece()
    {
        $data = Piece::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pieces.store'), $data);

        $this->assertDatabaseHas('pieces', $data);

        $piece = Piece::latest('id')->first();

        $response->assertRedirect(route('pieces.edit', $piece));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_piece()
    {
        $piece = Piece::factory()->create();

        $response = $this->get(route('pieces.show', $piece));

        $response
            ->assertOk()
            ->assertViewIs('app.pieces.show')
            ->assertViewHas('piece');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_piece()
    {
        $piece = Piece::factory()->create();

        $response = $this->get(route('pieces.edit', $piece));

        $response
            ->assertOk()
            ->assertViewIs('app.pieces.edit')
            ->assertViewHas('piece');
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

        $response = $this->put(route('pieces.update', $piece), $data);

        $data['id'] = $piece->id;

        $this->assertDatabaseHas('pieces', $data);

        $response->assertRedirect(route('pieces.edit', $piece));
    }

    /**
     * @test
     */
    public function it_deletes_the_piece()
    {
        $piece = Piece::factory()->create();

        $response = $this->delete(route('pieces.destroy', $piece));

        $response->assertRedirect(route('pieces.index'));

        $this->assertDeleted($piece);
    }
}
