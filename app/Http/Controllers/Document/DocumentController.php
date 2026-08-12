<?php
 
namespace App\Http\Controllers\Document;
use App\Http\Controllers\Controller;

use App\Http\Requests\DocumentStoreRequest;
use App\Http\Requests\DocumentUpdateRequest;

use App\Http\Requests\DocumentImportantStoreRequest;
use App\Http\Requests\DocumentImportantUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Document;
use App\Categorie;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all()->where('categorie','!=','IMPORTANTES');
        return view('serve.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorie::pluck('tipo','id');
        return view('serve.document.create', compact('categorias'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        $data = $request->all();
        $data['date_creation'] = $this->normalizeDate($request->input('date_creation'));
        $document = Document::create($data);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put('server/documentos/reglamentario',$request->file('file'));
            $document->fill(['file' => $path])->save();
        }

        return redirect()->route('doc.index')
            ->with('success', 'Documento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('serve.document.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $categorias = Categorie::pluck('tipo','id');
         return view('serve.document.edit', compact('document','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        $data = $request->all();
        $data['date_creation'] = $this->normalizeDate($request->input('date_creation'));
        $document->update($data);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put('server/documentos/reglamentario',$request->file('file'));
            $document->fill(['file' => $path])->save();
        }

        return redirect()->route('doc.index')
                ->with('success', 'Documento Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        // $ruta = Storage::delete(public_path =>asset('documentos/'.$document->file));
        // dd($ruta);
        // Storage::disk('public')->delete(public_path('Documentos/'.$document->file));
        $document->delete();
        return back()->with('success','Eliminado Correctamente');
    }





//Important Document

    public function index_important()
    {
        // $documents = Document::paginate();
        $documents  = Document::all()->where('categorie','IMPORTANTES');
        return view('serve.document.important.index', compact('documents'));
    }

    public function create_important()
    {
        $categorias = Categorie::pluck('tipo','id');
        return view('serve.document.important.create', compact('categorias'));
    }

    public function store_important(DocumentImportantStoreRequest $request)
    {
        $data = $request->all();
        $data['date_creation'] = $this->normalizeDate($request->input('date_creation'));
        $document = Document::create($data);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put('server/documentos/importantes',$request->file('file'));
            $document->fill(['file' => $path])->save();
        }

        return redirect()->route('important.index')
            ->with('success', 'Documento creado con exito');
    }
    public function show_important(Document $document)
    {
        return view('serve.document.important.show', compact('document'));
    }

    public function edit_important(Document $document)
    {
         return view('serve.document.important.edit', compact('document'));
    }

    public function update_important(DocumentImportantUpdateRequest $request, Document $document)
    {
        $data = $request->all();
        $data['date_creation'] = $this->normalizeDate($request->input('date_creation'));
        $document->update($data);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put('server/documentos/importantes',$request->file('file'));
            $document->fill(['file' => $path])->save();
        }

        return redirect()->route('important.index')
                ->with('success', 'Documento Actualizado con exito');
    }

    public function destroy_important(Document $document)
    {
        // $ruta = Storage::delete(public_path =>asset('documentos/'.$document->file));
        // dd($ruta);
        // Storage::disk('public')->delete(public_path('Documentos/'.$document->file));
        $document->delete();
        return back()->with('success','Eliminado Correctamente');
    }




    // Links Operation Documents

    public function clasification()
    {
        $lm = Document::all()->where('categorie', 'LEYES MUNICIPALES');
        $rm = Document::all()->where('categorie', 'RESOLUCIONES MUNICIPALES');
        $rma = Document::all()->where('categorie', 'RESOLUCIONES MUNICIPALES ADMINISTRATIVOS');
        $de = Document::all()->where('categorie', 'DECRETOS EDILES');
        $it = Document::all()->where('categorie', 'INFORMES DE TRANSPARENCIA');
        $ia = Document::all()->where('categorie', 'INFORMES DE AUDITORIA');
        $ig = Document::all()->where('categorie', 'INFORMES DE GESTION');

        return view('serve.document.operation.clasification', compact('lm','rm','rma','de','it','ia','ig'));
    }
    public function search_advanced()
    {
        return view('serve.document.operation.search');
    }
    public function document_important()
    {
        $importants = Document::all()->where('categorie','IMPORTANTES');
        return view('serve.document.operation.important', compact('importants'));
    }
    public function current_document()
    {
        $currents = Document::all()->where('statu','Vigente');
        return view('serve.document.operation.current', compact('currents'));
    }
    public function noncurrent_document() 
    {
         $noncurrents = Document::all()->where('statu','No Vigente');
        return view('serve.document.operation.noncurrent', compact('noncurrents'));
    }

    //Operations Documents

    public function clasifications_leymunicipal()
    {
        $lm = Document::all()->where('categorie','LEYES MUNICIPALES');
        return view('serve.document.operation.clasification.leymunicipal', compact('lm'));
    }
    public function clasifications_resomunicipal()
    {
        $rm = Document::all()->where('categorie','RESOLUCIONES MUNICIPALES');
        return view('serve.document.operation.clasification.resomunicipal', compact('rm'));
    }
    public function clasifications_resomuniadmi()
    {
        $rma = Document::all()->where('categorie','RESOLUCIONES MUNICIPALES ADMINISTRATIVOS');
        return view('serve.document.operation.clasification.resomuniadmi', compact('rma'));
    }
    public function clasifications_deedi()
    {
        $de = Document::all()->where('categorie','DECRETOS EDILES');
        return view('serve.document.operation.clasification.deedi', compact('de'));
    }
    public function clasifications_infotrans()
    {
        $it = Document::all()->where('categorie','INFORMES DE TRANSPARENCIA');
        return view('serve.document.operation.clasification.infotrans', compact('it'));
    }
    public function clasifications_infoaud()
    {
        $ia = Document::all()->where('categorie','INFORMES DE AUDITORIA');
        return view('serve.document.operation.clasification.infoaud', compact('ia'));
    }
    public function clasifications_infoges()
    {
        $ig = Document::all()->where('categorie','INFORMES DE GESTION');
        return view('serve.document.operation.clasification.infoges', compact('ig'));
    }

    //statu publish
    public function publish(Document $document)
    {
        // dd($document);
        // $document = Document::find($id);
       if ($document->publish == 0) {
            $document->publish = 1;

            $document->save();
        }
        else{
            if ($document->publish == 1) {
                $document->publish = 0;

                $document->save();
            }
        } 
        // return redirect()->route('doc.index');
        return redirect()->back();
    }
}
