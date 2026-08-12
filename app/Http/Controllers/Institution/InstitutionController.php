<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;
// use App\User;
// use Auth;
class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::all();
        return view('serve.institution.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serve..create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path('server/build/images').'/usersecond/', $name);
        }
        $usersecond = new Usersecond();
        $usersecond->nombre = $request->input('nombre');
        $usersecond->apellido =$request->input('apellido');
        $usersecond->email =$request->input('correo');
        $usersecond->password =$request->input('contra');
        $usersecond->estado =$request->input('estado');
        $usersecond->avatar = $name;
        $usersecond->user_id = auth()->user()->id;
        $usersecond->save();

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usersecond  $usersecond
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usersecond  $usersecond
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        return view('serve.usersecond.edit', compact('usersecond'));
        // return $usersecond;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usersecond  $usersecond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        $usersecond->fill($request->except('avatar'));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $usersecond->avatar=$name;
            $file->move(public_path('server/build/images').'/usersecond/', $name);
        }

        $usersecond->save();

        return redirect('/user');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usersecond  $usersecond
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $file_path = public_path('server/build/images').'/usersecond/'.$usersecond->avatar;
        \File::delete($file_path);
        $usersecond->delete();
        return redirect('/user');
    }
}
