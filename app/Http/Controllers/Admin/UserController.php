<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use TheSeer\Tokenizer\Exception;
use function back;
use function redirect;
use function response;
use function view;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::query()//извлечение всех пользователей кроме авторизованного(себя)
                ->where('id', '!=', Auth::id())
                ->get();
        return view('admin.users.index', ['usersList' => $users]);
    }
    
    public function toggleAdmin(User $user) 
    {
        $user->is_admin = !$user->is_admin;
        //dd($user->is_admin);
        
        $user->save();
        
        return redirect()->route('admin.users.index')->with('success', 'Права изменены');
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
    public function store(CreateRequest $request)
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
    public function update(EditRequest $request, User $user)
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
