<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\RolesPermisos\Models\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


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
        
        $rules = [
            'name'      => 'required|max:50|unique:users,name,'.$user->id,
            'email'     => 'required|max:50|unique:users,email,'.$user->id,
            'avatar'    => 'image|max:2048'
        ];
        
        // señaden las validaciones a los campos password
        if ($request->filled('old_password')) {
            // $rules['old_password'] = ['required', 'confirmed'];
            $rules['password'] = ['required','min:8'];
            $rules['password_confirmation'] = ['required', 'same:password'];
        }

        // Comparacion de contraseña old y la que se encuentra en base de datos
        // if (Hash::check($request->old_password, $user->password)) {
        //     $user->update($request->validate($rules));
        // }        
        
        
        // condicional para guardar el avatar del usuario
        if ($request->hasFile('avatar') ) {
            
            if ($user->avatar != 'perfil/perfil.png'){
                // Se elimina el avatar actual
                Storage::delete($user->avatar);
            }

            // Se guarda la imagen nueva
            $foto = $request->file('avatar')->store('perfil/'.$request->name);
            
            // se actualiza el usuario con el avatar nuevo
            $user->update(
                [
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'avatar'    => $foto
                ]
            );

            // optimización de la imagen
            $image = Image::make(Storage::get($foto))
                            ->widen(250)
                            ->encode();

            // se reemplaza la imagen que subio el usuario por la imagen optimizada
            Storage::put($user->avatar, (string) $image);

        } else {

            $user->update($request->validate($rules));

        }

        $user->roles()->sync($request->roles);
        
        return redirect()->route('admin.user', $user)->with('status_success', 'Usuario actualizado correctamente'); 
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

        if ($user->avatar != 'perfil/perfil.png'){
            // Se elimina el avatar actual
            Storage::delete($user->avatar);
        }
        
        $user->delete();

        return redirect()->route('user.index')->with('status_success', 'Se a eliminado el usuario correctamente'); 
    }
}
