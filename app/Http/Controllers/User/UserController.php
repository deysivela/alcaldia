<?php
 
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
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
        $users = User::all();
        return view('serve.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::pluck('name','id');
        return view('serve.user.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // $employee_id = $request->get('employee_id');

        $user = new User();
        $user->employee_id = $request->input('employee_id');
        $user->statu = $request->input('statu');
        $user->user = $request->input('user');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('users.index')->with('success','Registro guardado !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('serve.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $employees = Employee::pluck('name','id');
        $roles = Role::get();
        return view('serve.user.edit', compact('user', 'roles','employees'));
    }



    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        // actualizar usuario
        // $user->update($request->all());
        $user->employee_id = $request->get('employee_id');
        $user->statu = $request->get('statu');
        $user->user = $request->get('user');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        //actualizar roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // return back()->with('success','Eliminado Correctamente');
        return redirect()->route('users.index')->with('success','Usuario eliminado con exito!');
    }

}
