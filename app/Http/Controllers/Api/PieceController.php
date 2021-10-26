<?php

namespace App\Http\Controllers\Api;

use App\Models\Piece;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PieceResource;
use App\Http\Resources\PieceCollection;
use App\Http\Requests\PieceStoreRequest;
use App\Http\Requests\PieceUpdateRequest;

class PieceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Piece::class);

        $search = $request->get('search', '');

        $pieces = Piece::search($search)
            ->latest()
            ->paginate();

        return new PieceCollection($pieces);
    }

    /**
     * @param \App\Http\Requests\PieceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PieceStoreRequest $request)
    {
        $this->authorize('create', Piece::class);

        $validated = $request->validated();

        $piece = Piece::create($validated);

        return new PieceResource($piece);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Piece $piece)
    {
        $this->authorize('view', $piece);

        return new PieceResource($piece);
    }

    /**
     * @param \App\Http\Requests\PieceUpdateRequest $request
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function update(PieceUpdateRequest $request, Piece $piece)
    {
        $this->authorize('update', $piece);

        $validated = $request->validated();

        $piece->update($validated);

        return new PieceResource($piece);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Piece $piece)
    {
        $this->authorize('delete', $piece);

        $piece->delete();

        return response()->noContent();
    }
}
