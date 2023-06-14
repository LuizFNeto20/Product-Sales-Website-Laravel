<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function list()
    {
        $users = User::orderBy('id')->get();
        return view(
            'components/Listings/UserList',
            compact('users')
        );
    }

    function save(Request $request) {
        $usuario = User::find($request->input('id'));
  
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->cep = $request->input('cep');
        $usuario->house_number = $request->input('HouseNumber');
        $usuario->password = Hash::make($request->input('password'));

        $usuario->save();

        return redirect('/');
      }

    function edit($id)
    {
        $user = User::find($id);

        return view("components/Forms/FormUser", compact('user'));
    }

    function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user/list');
    }
}