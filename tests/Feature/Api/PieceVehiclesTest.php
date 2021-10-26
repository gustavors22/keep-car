<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Piece;
use App\Models\Vehicle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PieceVehiclesTest extends TestCase
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
    public function it_gets_piece_vehicles()
    {
        $piece = Piece::factory()->create();
        $vehicle = Vehicle::factory()->create();

        $piece->vehicles()->attach($vehicle);

        $response = $this->getJson(route('api.pieces.vehicles.index', $piece));

        $response->assertOk()->assertSee($vehicle->name);
    }

    /**
     * @test
     */
    public function it_can_attach_vehicles_to_piece()
    {
        $piece = Piece::factory()->create();
        $vehicle = Vehicle::factory()->create();

        $response = $this->postJson(
            route('api.pieces.vehicles.store', [$piece, $vehicle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $piece
                ->vehicles()
                ->where('vehicles.id', $vehicle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_vehicles_from_piece()
    {
        $piece = Piece::factory()->create();
        $vehicle = Vehicle::factory()->create();

        $response = $this->deleteJson(
            route('api.pieces.vehicles.store', [$piece, $vehicle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $piece
                ->vehicles()
                ->where('vehicles.id', $vehicle->id)
                ->exists()
        );
    }
}
