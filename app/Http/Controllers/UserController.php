<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\UserStoreRequest;
use App\Policies\UserPolicy;

use Stevebauman\Purify\Facades\Purify;

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
        return redirect()->away('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        // Policies
        if($request->user()->cant('view',$user))
            abort('403','No Autorizado para ver este perfil');

        return view('user.show-user')->with(['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        // Policies
        if($request->user()->cant('edit',$user))
            abort('403','No Autorizado para Editar este perfil');

        return view('user.form-edit')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreRequest $request, $id)
    { 
        $user = User::find($id);

        // Policies
        if($request->user()->cant('update',$user))
            abort('403','No Autorizado para ver Actualizar este perfil');
        
        $userIni = $user->name;
        $cleanRequest = Purify::clean($request->post());
        $user->name = $cleanRequest['name'];
        
        if(!$user->update())
            return back()->withErrors(['update'=>'No se pudo actualizar']);
                
        return back()->with('success','Se realizo el cambio de '.$userIni.' por '.$cleanRequest['name']);               
    }

    /**
     * Muestra el formulario para confirmar el borrado del usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $user = User::find($id);

        // Policies
        if($request->user()->cant('delete',$user))
            abort('403','No Autorizado para Borrar este perfil');
        
        return view('user.form-delete')->with(['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)    
    { 
        $user = User::find($id);
        
        // Policies
        if($request->user()->cant('destroy',$user))
            abort('403','No Autorizado para Eliminar este perfil');

        if(!$user->delete())
            return back()->withErrors(['delete'=>'No se ha podido borrar, intentelo luego']);

        Auth::logout();
        return redirect()->away('/')->with('success','Usuario '.ucfirst($user->name).' Eliminado correctamente!');
    }
}
