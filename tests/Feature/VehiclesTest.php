<?php

namespace App\Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VehiclesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->vehicle = factory('App\Entities\Vehicle')->create();
    }

    /** @test */
    public function show_all_vehicles()
    {
        $this->get(route('veiculos.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function show_a_single_vehicle()
    {
        $this->get($this->vehicle->path())
            ->assertSee($this->vehicle->veiculo)
            ->assertSee($this->vehicle->marca)
            ->assertSee($this->vehicle->ano)
            ->assertSee($this->vehicle->descricao)
            ->assertSee($this->vehicle->vendido);
    }

    /** @test */
    public function create_vehicles()
    {
        $vehicle = factory('App\Entities\Vehicle')->make();

        $this->get(route('veiculos.create'))
            ->assertStatus(200);

        $this->post(route('veiculos.store'), $vehicle->toArray())
            ->assertRedirect(route('veiculos.index'));
    }

    /** @test */
    public function delete_vehicles()
    {
        $this->get($this->vehicle->path())
            ->assertStatus(200);

        $this->delete(route('veiculos.destroy', $this->vehicle->id))
            ->assertRedirect(route('veiculos.index'));

    }

    /** @test */
    public function edit_vehicles()
    {

        $this->get(route('veiculos.edit', $this->vehicle->id))
            ->assertStatus(200);

    }

}