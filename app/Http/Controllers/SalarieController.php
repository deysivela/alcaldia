<?php

namespace App\Http\Controllers;

use App\Salarie;
use App\Salcat;
use App\Clase;
use Illuminate\Http\Request;
use App\Http\Requests\SalarieStoreRequest;
use App\Http\Requests\SalarieUpdateRequest;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salarie::all();
        // $dates = \DB::table('salaries')
        //         ->select(\DB::raw('sum(nro_item*salary_monthly) AS total'))
        //         ->groupBy('id')
        //         ->get();
                // dd($date);
        return view('serve.salarie.index', compact('salaries'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salcats = Salcat::pluck('category','id');
        $clases= Clase::pluck('clase','id');
        return view('serve.salarie.create', compact('salcats','clases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalarieStoreRequest $request)
    {
        $salarie = Salarie::create($request->all());

        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function show(Salarie $salarie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function edit(Salarie $salarie)
    {
        $salcats = Salcat::pluck('category','id');
        $clases= Clase::pluck('clase','id');
        return view('serve.salarie.edit',compact('salarie','salcats','clases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function update(SalarieUpdateRequest $request, Salarie $salarie)
    {
        $salarie->update($request->all());
        return redirect()->route('salaries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarie $salarie)
    {
        $salarie->delete();
        return redirect()->route('salaries.index');
    }
}
