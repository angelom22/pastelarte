<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RolesPermisos\Models\Role;
use App\User;
use Storage;
use DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess', 'user.index');
        
        $users = User::with('roles')->orderBy('id', 'Asc')->get();

        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', User::class);
        // return 'crear';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', [$user, ['user.show', 'userown.show'] ]);

        $roles = Role::orderBy('name')->get();

        // return $roles[0];
        
        return view('user.view', compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit', 'userown.edit'] ]);

        $roles = Role::orderBy('name')->get();

        // return $roles[0];
        // dd($user->avatar);
        return view('user.edit', compact( 'roles','user'));
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
        // dd($request->file('avatar'));
        $request->validate([
            'name'          => 'required|max:50|unique:users,name,'.$user->id,
            'email'          => 'required|max:50|unique:users,email,'.$user->id,    
        ]);

        if ($request->hasFile('avatar')) { 
            // Se elimina el avatar actual
            $deleteFile = $user->avatar;
            $file = Storage::disk('public')->delete($deleteFile);
            
            // se guarda el avatar nuevo en la Url correcta
            $foto = request()->file('avatar')->store('public/perfil/'.$request->name);
            $fotoUrl = Storage::url($foto);
            
            // se actualiza el usuario con el avatar nuevo
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $fotoUrl
            ]);
        } else {
            // se actualiza el usuario son el avatar
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }
        
        $user->roles()->sync($request->roles);
        
        return redirect()->route('user.index')->with('status_success', 'Usuario actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {  
        $this->authorize('haveaccess', 'user.destroy');

        $user->delete();

        return redirect()->route('user.index')->with('status_success', 'Se a eliminado el usuario correctamente'); 
    }
}
