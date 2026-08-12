<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\User;


class AddRoleController extends Controller
{
    public function edit(User $user)
    {
    	$roles = Role::get();
        return view('serve.user.viewroles', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado Correctamente');
    }
}
