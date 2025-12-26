<?php

namespace App\Http\Controllers;

use App\Models\ChessMatch;
use Illuminate\Http\Request;

class ChessMatchControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(ChessMatch::orderBy('id', 'asc')->limit($request->perpage ?? 10)->offset(($request->perpage ?? 10) * ($request->page ?? 0))->get());
    }
    public function total()
    {
        return response(ChessMatch::all()->count());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(ChessMatch::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function by_id($id)
    {
        return response(ChessMatch::orderBy('id', 'desc')->where('black_ID', $id)->orWhere('white_ID', $id)->limit(5)->get());
    }
}
