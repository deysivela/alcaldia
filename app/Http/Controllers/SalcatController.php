<?php

namespace App\Http\Controllers;

use App\Salcat;
use Illuminate\Http\Request;

class SalcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salcats = Salcat::all();
        return view('serve.salcat.create', compact('salcats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salcat = Salcat::create($request->all());

        return redirect()->route('salcats.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salcategorie  $salcategorie
     * @return \Illuminate\Http\Response
     */
    public function show(Salcat $salcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salcategorie  $salcategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Salcat $salcat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salcategorie  $salcategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salcat $salcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salcategorie  $salcategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salcat $salcat)
    {
        $salcat->delete();

        return redirect()->route('salcats.create');
    }
}
