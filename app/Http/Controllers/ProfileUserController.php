<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $employees=Employee::all();
        $users=User::all();
        $roles=Role::all();
        $permissions=Permission::all();
        return view('serve.admin.principal', compact('users', 'roles', 'permissions','employees'));
    }


    public function profile()
    {
        return view('serve.admin.profile', array('user'=> Auth::user()));
    }


    public function updates_avatar(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo =$request->file('photo');
            $filename = time().'.'. $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save(public_path('server/imagenes/funcionarios/'.$filename));

            /** @var \App\User $user */
            $user = Auth::user();
            $user->photo=$filename;
            $user->save();
        }
        return view('serve.admin.profile', array('user'=> Auth::user()));
    }

    public function updates_password(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
            ]);
         if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser la misma que su contraseña actual. Por favor, elija una contraseña diferente.");
        }
        //Change Password
        /** @var \App\User $user */
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Contraseña Actualizada');

    }
} 