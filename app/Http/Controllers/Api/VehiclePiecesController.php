<?php
namespace App\Http\Controllers\Api;

use App\Models\Piece;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PieceCollection;

class VehiclePiecesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Vehicle $vehicle)
    {
        $this->authorize('view', $vehicle);

        $search = $request->get('search', '');

        $pieces = $vehicle
            ->piecies()
            ->search($search)
            ->latest()
            ->paginate();

        return new PieceCollection($pieces);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vehicle $vehicle
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle, Piece $piece)
    {
        $this->authorize('update', $vehicle);

        $vehicle->piecies()->syncWithoutDetaching([$piece->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vehicle $vehicle
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vehicle $vehicle, Piece $piece)
    {
        $this->authorize('update', $vehicle);

        $vehicle->piecies()->detach($piece);

        return response()->noContent();
    }
}
