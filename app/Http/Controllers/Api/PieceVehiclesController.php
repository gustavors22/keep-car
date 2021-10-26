<?php
namespace App\Http\Controllers\Api;

use App\Models\Piece;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleCollection;

class PieceVehiclesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Piece $piece)
    {
        $this->authorize('view', $piece);

        $search = $request->get('search', '');

        $vehicles = $piece
            ->vehicles()
            ->search($search)
            ->latest()
            ->paginate();

        return new VehicleCollection($vehicles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Piece $piece, Vehicle $vehicle)
    {
        $this->authorize('update', $piece);

        $piece->vehicles()->syncWithoutDetaching([$vehicle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Piece $piece, Vehicle $vehicle)
    {
        $this->authorize('update', $piece);

        $piece->vehicles()->detach($vehicle);

        return response()->noContent();
    }
}
