<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all()->except([1, 2]);
        $specials = Role::find([1, 2]);
        $rolecreados = Role::all()->except([1, 2]);
        return view('serve.roles.index', compact('roles', 'specials', 'rolecreados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('serve.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'special' => 'nullable|in:all-access,no-access',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create($this->rolePayload($request));
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Rol Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Caffeinated\Shinobi\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('serve.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Caffeinated\Shinobi\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('serve.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Caffeinated\Shinobi\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'special' => 'nullable|in:all-access,no-access',
            'permissions' => 'nullable|array',
        ]);

        $role->update($this->rolePayload($request));
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Rol Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Caffeinated\Shinobi\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol Eliminado Correctamente');
    }

    /**
     * Build role attributes, always ensuring a non-empty slug.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function rolePayload(Request $request)
    {
        $name = trim((string) $request->input('name'));
        $slug = trim((string) $request->input('slug'));

        if ($slug === '') {
            $slug = Str::slug($name);
        }

        if ($slug === '') {
            $slug = 'rol-' . Str::random(8);
        }

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $request->input('description'),
            'special' => $request->input('special'),
        ];
    }
}
