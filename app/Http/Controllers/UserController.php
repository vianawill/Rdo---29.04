<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* método Jefferson */
        User::create($request->all());
        return redirect()->route('alunos.index');
        
        
        /* método ChatGPT 
        $request->validate([
            'name' => 'required',
            'cpf' => 'required | size:11 | unique:users',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
        ]);

        /* método ChatGPT 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'cpf' => $request->cpf,
        ]);

        /* método ChatGPT 
        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /* método Jeferson */
        $user->update($request->all());
        return redirect()->route('users.index');

        /* método ChatGPT 
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users, email,' . $user->id,
            'password' => 'nullable | min:8',
            'cpf' => 'required | size:11 | unique:users, cpf,' . $user->id,
        ]);

        /* método ChatGPT
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'cpf' => $request->cpf,
        ]);

        /* método ChatGPT
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user -> delete();
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
