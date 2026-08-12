<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class AdminAsociationController extends Controller
{
    public function editadmin( User $user)
    {
    	$roles = Role::get();
        $employees = Employee::pluck('name','id');
        return view('serve.admin.asociar', compact('user','employees','roles'));
    }

    public function updateadmin(Request $request, User $user)
    {
        //actualizar usuario
        $user->update($request->all());
        //actualizar roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado Correctamente');
    }
}
 