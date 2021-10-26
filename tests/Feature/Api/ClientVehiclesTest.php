<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Client;
use App\Models\Vehicle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientVehiclesTest extends TestCase
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
    public function it_gets_client_vehicles()
    {
        $client = Client::factory()->create();
        $vehicles = Vehicle::factory()
            ->count(2)
            ->create([
                'client_id' => $client->id,
            ]);

        $response = $this->getJson(
            route('api.clients.vehicles.index', $client)
        );

        $response->assertOk()->assertSee($vehicles[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_client_vehicles()
    {
        $client = Client::factory()->create();
        $data = Vehicle::factory()
            ->make([
                'client_id' => $client->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.clients.vehicles.store', $client),
            $data
        );

        $this->assertDatabaseHas('vehicles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $vehicle = Vehicle::latest('id')->first();

        $this->assertEquals($client->id, $vehicle->client_id);
    }
}
