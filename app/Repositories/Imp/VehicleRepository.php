<?php

namespace App\Repositories\Imp;

use App\Entities\Vehicle;
use App\Repositories\IVehicleRepository;
use Illuminate\Http\Request;

class VehicleRepository implements IVehicleRepository
{
    /**
     * @param $id
     * @return Vehicle
     */
    public function find($id)
    {
        return Vehicle::find($id);
    }

    /**
     * @param array $attributes
     */
    public function create($attributes)
    {
        if(!isset($attributes['vendido']))
            $attributes['vendido'] = 0;

        Vehicle::create($attributes);
    }

    /**
     * @param Vehicle $vehicle
     * @param int $vehicleId
     * @return bool
     */
    public function update($attributes, $vehicleId)
    {
        $vehicle = $this->find($vehicleId);
        $modified = false;

        if(!isset($attributes['vendido']))
            $attributes['vendido'] = 0;

        foreach ($attributes as $key => $value) {
            if ($vehicle->$key !== $value) {
                $vehicle->$key = $value;
                $modified = true;
            }
        }

        return $modified ? $vehicle->save() : false;
    }

    /**
     * @param int $vehicleId
     * @throws \Exception
     */
    public function remove($vehicleId)
    {
        Vehicle::destroy($vehicleId);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Vehicle::all();
    }

}