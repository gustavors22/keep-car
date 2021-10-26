<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Piece;
use App\Models\Vehicle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehiclePiecesTest extends TestCase
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
    public function it_gets_vehicle_pieces()
    {
        $vehicle = Vehicle::factory()->create();
        $piece = Piece::factory()->create();

        $vehicle->piecies()->attach($piece);

        $response = $this->getJson(
            route('api.vehicles.pieces.index', $vehicle)
        );

        $response->assertOk()->assertSee($piece->name);
    }

    /**
     * @test
     */
    public function it_can_attach_pieces_to_vehicle()
    {
        $vehicle = Vehicle::factory()->create();
        $piece = Piece::factory()->create();

        $response = $this->postJson(
            route('api.vehicles.pieces.store', [$vehicle, $piece])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $vehicle
                ->piecies()
                ->where('pieces.id', $piece->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_pieces_from_vehicle()
    {
        $vehicle = Vehicle::factory()->create();
        $piece = Piece::factory()->create();

        $response = $this->deleteJson(
            route('api.vehicles.pieces.store', [$vehicle, $piece])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $vehicle
                ->piecies()
                ->where('pieces.id', $piece->id)
                ->exists()
        );
    }
}
