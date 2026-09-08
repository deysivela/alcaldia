<?php

namespace App\Http\Controllers\Cultura;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\CulturaStoreRequest;
use App\Http\Requests\CulturaUpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CulturaController extends Controller
{
    const CATEGORIE = 'CULTURA';

    public function index()
    {
        $documents = Document::where('categorie', self::CATEGORIE)
            ->orderBy('date_creation', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('serve.cultura.index', compact('documents'));
    }

    public function create()
    {
        return view('serve.cultura.create');
    }

    public function store(CulturaStoreRequest $request)
    {
        $data = $request->except('file', 'cod', 'statu');
        $data['categorie'] = self::CATEGORIE;
        $data['publish'] = 0;
        $data['date_creation'] = $this->normalizeDate($request->input('date_creation'));

        $document = Document::create($data);

        if ($request->hasFile('file')) {
            $document->fill(['file' => $this->storeUpload($request->file('file'))])->save();
        }

        return redirect()->route('cultura.index')
            ->with('success', 'Cronograma / actividad de Cultura creado con éxito');
    }

    public function show(Document $document)
    {
        $this->ensureCultura($document);

        return view('serve.cultura.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $this->ensureCultura($document);

        return view('serve.cultura.edit', compact('document'));
    }

    public function update(CulturaUpdateRequest $request, Document $document)
    {
        $this->ensureCultura($document);

        $data = $request->except('file', 'cod', 'statu');
        $data['categorie'] = self::CATEGORIE;
        $data['date_creation'] = $this->normalizeDate($request->input('date_creation'));
        $document->update($data);

        if ($request->hasFile('file')) {
            $document->fill(['file' => $this->storeUpload($request->file('file'))])->save();
        }

        return redirect()->route('cultura.index')
            ->with('success', 'Cronograma / actividad de Cultura actualizado con éxito');
    }

    public function destroy(Document $document)
    {
        $this->ensureCultura($document);
        $document->delete();

        return back()->with('success', 'Eliminado correctamente');
    }

    public function publish(Document $document)
    {
        $this->ensureCultura($document);

        $document->publish = $document->publish == 1 ? 0 : 1;
        $document->save();

        return redirect()->back();
    }

    protected function ensureCultura(Document $document)
    {
        if ($document->categorie !== self::CATEGORIE) {
            abort(404);
        }
    }

    protected function storeUpload(UploadedFile $file)
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $folder = $extension === 'pdf'
            ? 'server/documentos/cultura'
            : 'server/imagenes/cultura';

        return Storage::disk('public')->put($folder, $file);
    }
}
