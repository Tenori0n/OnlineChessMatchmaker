<?php

namespace App\Http\Controllers;

use App\Models\ChessMatch;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 10;
        return view('users', [
            'users' => User::paginate($perpage)->withQueryString()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:users|max:30',
            'password' => 'required|confirmed|string|min:6|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'rules' => 'required|accepted'
        ]);
        $item = new User($validated);
        $item->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user', [
            'user' => User::all()->where('id', $id)->first(),
            'matches' => ChessMatch::latest('id')->limit(10)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('admin-and-self-only-action', User::all()->where('id', $id)->first()))
        {
            return redirect('/error')->with('message', "Для выполнения этого действия нужно быть владельцем аккаунта или иметь права администратора");
        }
        return view('user_edit',[
            'user' => User::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:users|max:30',
            'password' => 'string|min:6|max:255|nullable',
        ]);
        $user = User::all()->where('id', $id)->first();
        $user->name = $validated['name'];
        if ($validated['password'])
            $user->password = Hash::make($validated['password']);
        $user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('admin-only-action', User::all()->where('id', $id)->first()))
        {
            return redirect('/error')->with('message', "Для выполнения этого действия необходимы права администратора");
        }
        User::destroy($id);
        return redirect('/users');
    }
}
