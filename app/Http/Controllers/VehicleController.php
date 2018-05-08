<?php

namespace App\Http\Controllers;

use App\Entities\Vehicle;
use Illuminate\Http\Request;

use App\Repositories\IVehicleRepository as IVehicleRepository;

class VehicleController extends Controller
{
    /**
     * @var IVehicleRepository
     */
    private $iVehicleRepository;

    /**
     * VehicleController constructor.
     * @param IVehicleRepository $iVehicleRepository
     */
    public function __construct(IVehicleRepository $iVehicleRepository)
    {
        $this->iVehicleRepository = $iVehicleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = $this->iVehicleRepository->all();

        return view('vehicles.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.form', ['update' => false, 'vehicle' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'veiculo' => 'required',
            'marca' => 'required',
        ]);

        $this->iVehicleRepository->create($request->all());

        return redirect()->route('veiculos.index')
            ->with('success','Veículo criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     */
    public function show($id)
    {
        $vehicle = $this->iVehicleRepository->find($id);
        return view('vehicles.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = true;
        $vehicle = $this->iVehicleRepository->find($id);
        return view('vehicles.form',compact('vehicle', 'update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'veiculo' => 'required',
            'marca' => 'required',
        ]);

        $this->iVehicleRepository->update($request->except('_token', '_method'), $id);

        return redirect()->route('veiculos.index')
            ->with('success','Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->iVehicleRepository->remove($id);

        return redirect()->route('veiculos.index')
            ->with('success','Veículo excluído com sucesso!');
    }
}
