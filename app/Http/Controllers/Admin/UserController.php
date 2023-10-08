<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function view;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::all();
        return view('admin.users.index', ['usersList' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\User\CreateRequest $request)
    {
        $data = $request->only(['name','email','password']);
        $user = new User($data);
        if($request->is_admin === 'true'){
            $user->is_admin = 1;
        }else{
            $user->is_admin = 0;
        }
        if ($user->save()) {
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно добавлен');
        }
        return back()->with('error', 'Категорию не удалось добавить');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\User\EditRequest $request, User $user)
    {
        if($request->is_admin === 'true'){
            $user->is_admin = 1;
        }else{
            $user->is_admin = 0;
        }
        if ($user->save()) {
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно изменен');
        }
        return back()->with('error', 'Пользователя не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
          
           $user->delete();
            
           return response()->json('ok');
       } catch (Exception $ex) {
           Log::error($ex->getMessage(), $ex->getTrace());
           return response()->json('error', 400);
       }
    }
}
