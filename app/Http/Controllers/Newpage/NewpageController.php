<?php

namespace App\Http\Controllers\Newpage;
use App\Http\Controllers\Controller;
use App\Newpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewpageStoreRequest;
use App\Http\Requests\NewpageUpdateRequest;

class NewpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newpages = Newpage::all();
        return view('serve.newpage.index', compact('newpages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serve.newpage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewpageStoreRequest $request)
    {
        $data = $request->except('photo');
        $data['fecha'] = $this->normalizeDate($request->input('fecha'));

        if ($request->file('photo')) {
            $data['photo'] = Storage::disk('public')->put('server/imagenes/noticias', $request->file('photo'));
        }

        Newpage::create($data);

        return redirect()->route('newpages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newpage  $newpage
     * @return \Illuminate\Http\Response
     */
    public function show(Newpage $newpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newpage  $newpage
     * @return \Illuminate\Http\Response
     */
    public function edit(Newpage $newpage)
    {
        return view('serve.newpage.edit', compact('newpage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newpage  $newpage
     * @return \Illuminate\Http\Response
     */
    public function update(NewpageUpdateRequest $request, Newpage $newpage)
    {
        $data = $request->except('photo');
        $data['fecha'] = $this->normalizeDate($request->input('fecha'));

        if ($request->file('photo')) {
            $data['photo'] = Storage::disk('public')->put('server/imagenes/noticias', $request->file('photo'));
        }

        $newpage->update($data);

        return redirect()->route('newpages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newpage  $newpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newpage $newpage)
    {
        $newpage->delete();
        return redirect()->route('newpages.index');
    }
}
