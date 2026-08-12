<?php

namespace App\Http\Controllers;

use App\Draft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\DraftStoreRequest;
use App\Http\Requests\DraftUpdateRequest;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts = Draft::all();
        return view('serve.draft.index', compact('drafts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serve.draft.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DraftStoreRequest $request)
    {
        $draft = Draft::create($request->all());

        if ($request->file('photo')) {
            $path = Storage::disk('public')->put('server/imagenes/proyectos',$request->file('photo'));
            $draft->fill(['photo' => asset($path)])->save();
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show(Draft $draft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function edit(Draft $draft)
    {
        return view('serve.draft.edit', compact('draft'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function update(DraftUpdateRequest $request, Draft $draft)
    {
        $draft->update($request->all());

        if ($request->file('photo')) {
            $path = Storage::disk('public')->put('server/imagenes/proyectos',$request->file('photo'));
            $draft->fill(['photo' => asset($path)])->save();
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draft $draft)
    {
        $draft->delete();
        return redirect()->route('projects.index');
    }
}
