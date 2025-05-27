<?php

namespace App\Http\Controllers;

use App\Models\ChessMatch;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Match_;

class ChessMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 10;
        return view('matches', [
           'matches' => ChessMatch::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return view('match', [
           'match' => ChessMatch::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        if (!Gate::allows('admin-only-action', ChessMatch::all()->where('id', $id)->first()))
        {
            return redirect('/error')->with('message', "Для выполнения этого действия необходимы права администратора");
        }
        User::destroy($id);
        return redirect('/users')->withErrors(['success' => 'Матч был удален',]);
    }
}
