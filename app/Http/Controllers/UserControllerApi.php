<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use mysql_xdevapi\Exception;

class UserControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(User::orderBy('id', 'asc')->limit($request->perpage ?? 10)->offset(($request->perpage ?? 10) * ($request->page ?? 0))->get());
    }

    public function total()
    {
        return response(User::all()->count());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*if (!Gate::allows('create-user'))
        {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на создание пользователя',
            ]);
        }*/
        $validated = $request->validate([
            'name' => 'required|string|unique:users|max:30',
            'password' => 'required|confirmed|string|min:6|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'image' => 'required|file'
        ]);
        $file = $request->file('image');
        $fileName = rand(1, 100000).'_'.$file->getClientOriginalName();
        try {
            $path = Storage::disk('s3')->putFileAs('user_avatar', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch (Exception $e)
        {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        };
        $user = new User($validated);
        $user->avatar = $fileUrl;
        $user->save();
        return response()->json([
            'code' => 0,
            'message' => 'Пользователь успешно создан',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:users,name,'.$id.'|max:30',
            'image' => 'file',
        ]);
        $user = User::all()->where('id', $id)->first();
        $user->name = $validated['name'];
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = rand(1, 100000).'_'.$file->getClientOriginalName();
            try {
                $path = Storage::disk('s3')->putFileAs('user_avatar', $file, $fileName);
                $fileUrl = Storage::disk('s3')->url($path);
            }
            catch (Exception $e)
            {
                return response()->json([
                    'code' => 2,
                    'message' => 'Ошибка загрузки файла в хранилище S3',
                ]);
            };
            $user->avatar = $fileUrl;
        }
        $user->save();
        return response()->json([
            'code' => 0,
            'message' => 'Профиль был успешно обновлен',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
