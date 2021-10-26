<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.pieces.index', compact('pieces', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Piece::class);

        return view('app.pieces.create');
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

        return redirect()
            ->route('pieces.edit', $piece)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Piece $piece)
    {
        $this->authorize('view', $piece);

        return view('app.pieces.show', compact('piece'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Piece $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Piece $piece)
    {
        $this->authorize('update', $piece);

        return view('app.pieces.edit', compact('piece'));
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

        return redirect()
            ->route('pieces.edit', $piece)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('pieces.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
