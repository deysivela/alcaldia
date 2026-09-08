<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Categorie;
use App\Newpage;
use App\Draft;
use App\Employee;
use App\Salarie;
use App\Contact;
use App\Charge;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
   public function index()
   {
      $news = Newpage::orderBy('fecha', 'desc')->orderBy('id', 'desc')->take(4)->get();
      $novedades = $this->buildNovedades(24);
      $novedadesImagenes = $novedades
         ->filter(function ($item) {
            return empty($item['is_pdf']) && !empty($item['is_image']) && !empty($item['preview']);
         })
         ->take(8)
         ->values();
      $novedadesDocumentos = $novedades
         ->filter(function ($item) {
            return !empty($item['is_pdf']);
         })
         ->take(8)
         ->values();

   	return view('client.layouts.content', compact('news', 'novedadesImagenes', 'novedadesDocumentos'));
   }

   /**
    * Últimos contenidos publicados (noticias, documentos y proyectos)
    * para el bloque de novedades de la portada.
    */
   protected function buildNovedades($limit = 8)
   {
      $categoryMeta = [
         'LEYES MUNICIPALES' => [
            'label' => 'Ley municipal',
            'route' => 'leyes-municipales',
            'icon' => 'icon-Book',
         ],
         'RESOLUCIONES MUNICIPALES' => [
            'label' => 'Resolución',
            'route' => 'resoluciones-municipales',
            'icon' => 'icon-File-Bookmark',
         ],
         'RESOLUCIONES MUNICIPALES ADMINISTRATIVOS' => [
            'label' => 'Resolución adm.',
            'route' => 'resoluciones-mun-adm',
            'icon' => 'icon-File-Bookmark',
         ],
         'DECRETOS EDILES' => [
            'label' => 'Decreto edil',
            'route' => 'decretos-ediles',
            'icon' => 'icon-File-Edit',
         ],
         'INFORMES DE AUDITORIA' => [
            'label' => 'Auditoría',
            'route' => 'auditoria-interna',
            'icon' => 'icon-File-Search',
         ],
         'INFORMES DE GESTION' => [
            'label' => 'Informe de gestión',
            'route' => 'informes-gestion',
            'icon' => 'icon-Bar-Chart',
         ],
         'IMPORTANTES' => [
            'label' => 'Documento',
            'route' => 'documentos_importantes',
            'icon' => 'icon-Folder-Bookmark',
         ],
         'INFORMES DE TRANSPARENCIA' => [
            'label' => 'Transparencia',
            'route' => 'transparencia',
            'icon' => 'icon-File-Search',
         ],
         'CULTURA' => [
            'label' => 'Cultura',
            'route' => 'cultura',
            'icon' => 'icon-Music-Note2',
         ],
         'ZOONOSIS' => [
            'label' => 'Zoonosis',
            'route' => 'zoonosis',
            'icon' => 'icon-Heart',
         ],
      ];

      $freshDays = 14;
      $items = collect();

      Newpage::orderBy('created_at', 'desc')
         ->orderBy('id', 'desc')
         ->take($limit)
         ->get()
         ->each(function ($item) use ($items, $freshDays) {
            $uploadedAt = $this->parseContentDate($item->created_at);
            if (!$uploadedAt) {
               return;
            }

            $displayDate = $this->parseContentDate($item->fecha) ?: $uploadedAt;
            $media = $this->resolveNovedadMedia($item->photo, route('details', $item));
            // La noticia no es un archivo descargable: se muestra la foto y se abre el detalle.
            $media['url'] = route('details', $item);
            $media['open_file'] = false;
            $media['is_pdf'] = false;
            if (!empty($item->photo)) {
               $media['preview'] = asset(ltrim($item->photo, '/'));
               $media['is_image'] = true;
            }

            // Sin foto no entra al carrusel de imágenes.
            if (empty($media['is_image'])) {
               return;
            }

            $items->push([
               'type' => 'noticia',
               'label' => 'Noticia',
               'icon' => 'icon-Speach-Bubble',
               'title' => $item->titulo,
               'description' => null,
               'code' => null,
               'url' => $media['url'],
               'preview' => $media['preview'],
               'is_pdf' => false,
               'is_image' => true,
               'open_file' => false,
               'date' => $displayDate,
               'uploaded_at' => $uploadedAt,
               'is_new' => $uploadedAt->gte(Carbon::now()->subDays($freshDays)),
            ]);
         });

      Document::where('publish', 1)
         ->orderBy('created_at', 'desc')
         ->orderBy('id', 'desc')
         ->take($limit)
         ->get()
         ->each(function ($item) use ($items, $categoryMeta, $freshDays) {
            $meta = isset($categoryMeta[$item->categorie]) ? $categoryMeta[$item->categorie] : null;
            if (!$meta) {
               return;
            }

            $uploadedAt = $this->parseContentDate($item->created_at);
            if (!$uploadedAt) {
               return;
            }

            $displayDate = $this->parseContentDate($item->date_creation) ?: $uploadedAt;
            $media = $this->resolveNovedadMedia($item->file, route($meta['route']));
            $text = $this->documentNovedadText($item, $meta['label'], $media['is_pdf']);

            // Imágenes de Cultura / Zoonosis: forzar URL pública de la foto.
            if (!empty($media['is_image']) && !empty($item->file)) {
               $media['preview'] = asset(ltrim($item->file, '/'));
               $media['is_pdf'] = false;
            }

            $items->push([
               'type' => 'documento',
               'label' => $meta['label'],
               'icon' => $meta['icon'],
               'title' => $text['title'],
               'description' => $text['description'],
               'code' => $item->cod ?: null,
               'url' => $media['is_image'] ? route($meta['route']) : $media['url'],
               'preview' => $media['preview'],
               'is_pdf' => !empty($media['is_pdf']),
               'is_image' => !empty($media['is_image']),
               'open_file' => !empty($media['is_pdf']) ? $media['open_file'] : false,
               'date' => $displayDate,
               'uploaded_at' => $uploadedAt,
               'is_new' => $uploadedAt->gte(Carbon::now()->subDays($freshDays)),
            ]);
         });

      Draft::orderBy('created_at', 'desc')
         ->orderBy('id', 'desc')
         ->take(4)
         ->get()
         ->each(function ($item) use ($items, $freshDays) {
            $uploadedAt = $this->parseContentDate($item->created_at);
            if (!$uploadedAt) {
               return;
            }

            $typeLabel = $item->type ? ('Proyecto · ' . $item->type) : 'Proyecto';
            $media = $this->resolveNovedadMedia($item->photo, route('proyectos'));
            if (!empty($item->photo) && empty($media['is_pdf'])) {
               $media['preview'] = asset(ltrim($item->photo, '/'));
               $media['is_image'] = true;
               $media['is_pdf'] = false;
            }
            // Carrusel de imágenes: solo proyectos con foto.
            if (empty($media['is_image'])) {
               return;
            }
            $media['url'] = route('proyectos');
            $media['open_file'] = false;

            $items->push([
               'type' => 'proyecto',
               'label' => $typeLabel,
               'icon' => 'icon-Edit-Map',
               'title' => $item->name,
               'description' => $item->place ?: null,
               'code' => null,
               'url' => $media['url'],
               'preview' => $media['preview'],
               'is_pdf' => false,
               'is_image' => true,
               'open_file' => false,
               'date' => $uploadedAt,
               'uploaded_at' => $uploadedAt,
               'is_new' => $uploadedAt->gte(Carbon::now()->subDays($freshDays)),
            ]);
         });

      // No truncar aquí: index() separa imágenes y PDFs con su propio límite.
      return $items
         ->sortByDesc(function ($item) {
            return $item['uploaded_at']->timestamp;
         })
         ->values();
   }

   protected function resolveNovedadMedia(?string $path, string $fallbackUrl)
   {
      $pdfPreview = asset('client/images/pdf.png');
      $result = [
         'url' => $fallbackUrl,
         'preview' => $pdfPreview,
         'is_pdf' => false,
         'is_image' => false,
         'open_file' => false,
      ];

      if (!$path) {
         return $result;
      }

      $raw = trim((string) $path);
      $isAbsolute = (bool) preg_match('#^https?://#i', $raw);
      $fileUrl = $isAbsolute ? $raw : asset(ltrim($raw, '/'));
      $extension = strtolower(pathinfo(parse_url($raw, PHP_URL_PATH) ?: $raw, PATHINFO_EXTENSION));
      $imageExts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

      $result['url'] = $fileUrl;
      $result['open_file'] = true;

      if (in_array($extension, $imageExts, true)) {
         $result['preview'] = $fileUrl;
         $result['is_image'] = true;
         return $result;
      }

      if ($extension === 'pdf' || $extension === '') {
         $result['preview'] = $pdfPreview;
         $result['is_pdf'] = true;
         return $result;
      }

      $result['preview'] = $pdfPreview;
      $result['is_pdf'] = true;

      return $result;
   }

   protected function documentNovedadText(Document $item, string $fallback, bool $isPdf = false)
   {
      $description = !empty($item->description)
         ? trim(preg_replace('/\s+/', ' ', strip_tags($item->description)))
         : null;

      $title = null;
      if (!empty($item->name_document)) {
         $title = trim($item->name_document);
      }

      $entity = trim((string) $item->entity);
      $entityNormalized = mb_strtolower($entity);
      $genericEntities = [
         'gobierno autónomo municipal de llallagua',
         'gobierno autonomo municipal de llallagua',
         'cronograma',
      ];

      if (!$title && $entity !== '' && !in_array($entityNormalized, $genericEntities, true)) {
         $title = $entity;
      }

      if ($isPdf) {
         if (!$title && !empty($item->cod)) {
            $title = $item->cod;
         }
         if (!$title && $description) {
            $title = str_limit($description, 70);
         }
         if (!$title) {
            $title = $fallback;
         }

         // Evitar repetir el mismo texto como título y descripción.
         if ($description && mb_strtolower($description) === mb_strtolower($title)) {
            $description = null;
         }

         return [
            'title' => $title,
            'description' => $description ? str_limit($description, 140) : null,
         ];
      }

      if (!$title && $description) {
         $title = str_limit($description, 90);
         $description = null;
      }

      if (!$title && !empty($item->cod)) {
         $title = $item->cod;
      }

      if (!$title) {
         $title = $fallback;
      }

      return [
         'title' => $title,
         'description' => $description && mb_strtolower($description) !== mb_strtolower($title)
            ? str_limit($description, 100)
            : null,
      ];
   }

   /**
    * @param mixed $value
    * @return Carbon|null
    */
   protected function parseContentDate($value)
   {
      if (!$value) {
         return null;
      }

      try {
         return Carbon::parse($value);
      } catch (\Exception $e) {
         return null;
      }
   }
   public function gaceta()
   {
   	return view('client.gaceta.gaceta');
   }
   public function leyes_municipales()
   {
      $lm = Document::all()->where('categorie','=','LEYES MUNICIPALES')->where('publish','=','1')->sortByDesc('date_creation');
      return view('client.gaceta.lm', compact('lm'));
   }
   public function resoluciones_municipales()
   {
      $rm = Document::all()->where('categorie','=','RESOLUCIONES MUNICIPALES')->where('publish','=','1')->sortByDesc('cod');
      return view('client.gaceta.rm', compact('rm'));
   }
   public function resoluciones_mun_adm()
   {
      $rma = Document::all()->where('categorie','=','RESOLUCIONES MUNICIPALES ADMINISTRATIVOS') ->where('publish','=','1')->sortByDesc('date_creation');
      return view('client.gaceta.rma', compact('rma'));
   }
   public function decretos_ediles()
   {
      $de = Document::all()->where('categorie','=','DECRETOS EDILES')->where('publish','=','1')->sortByDesc('date_creation');
      return view('client.gaceta.de', compact('de'));
   }
   public function auditoria_interno()
   {
      $ai = Document::all()->where('categorie','=','INFORMES DE AUDITORIA')->where('publish','=','1')->sortByDesc('date_creation');
      return view('client.gaceta.ai', compact('ai'));
   }
   public function informes_gestion()
   {
      $ig = Document::all()->where('categorie','=','INFORMES DE GESTION')->where('publish','=','1')->sortByDesc('date_creation');
      return view('client.gaceta.ig', compact('ig'));
   }
   public function documentos_importantes()
   {
      $docimport = Document::all()->where('categorie','=','IMPORTANTES') ->where('publish','=','1')->sortByDesc('date_creation');
      return view('client.gaceta.di', compact('docimport'));
      
   }
   public function transparencia()
   {
      $it = Document::all()->where('categorie','=','INFORMES DE TRANSPARENCIA')->where('publish','=','1')->sortByDesc('date_creation');
   	return view('client.transparencia',compact('it'));
   }

   
   public function actividades()
   {
   		return view('client.actividades');
   }
   public function noticias()
   {
      $newpages = Newpage::orderBy('fecha', 'desc')->orderBy('id', 'desc')->paginate(9);
	  	return view('client.noticias.noticias', compact('newpages'));
   }
   public function details(Newpage $detail)
   {
		return view('client.noticias.details', compact('detail'));
   }

  public function cultura()
   {
      $cronogramas = Document::all()
         ->where('categorie', '=', 'CULTURA')
         ->where('publish', '=', '1')
         ->sortByDesc('date_creation');

   		return view('client.cultura.cultura', compact('cronogramas'));
   }
   public function turismo()
   {
   		return view('client.turismo.turismo');
   }
   public function zoonosis()
   {
      $cronogramas = Document::all()
         ->where('categorie', '=', 'ZOONOSIS')
         ->where('publish', '=', '1')
         ->sortByDesc('date_creation');

      return view('client.zoonosis.zoonosis', compact('cronogramas'));
   }
   public function subalcaldias()
   {
   		return view('client.subalcaldias.subalcaldias');
   }
   public function proyectos()
   {  
      // $alls = Draft::paginate(3);
      $saluds = Draft::all()->where('type','=','Salud');
      $educacions = Draft::all()->where('type','=','Educacion');
      $deportes = Draft::all()->where('type','=','Deporte');
      $culturas = Draft::all()->where('type','=','Cultura');
     return view('client.proyectos.proyectos', compact('saluds','educacions','deportes','culturas'));
   }
   public function rhautoridades()
   {
      $employees = Employee::with('charges')
         ->where('type_employee', 'Autoridad')
         ->orderBy('last_name')
         ->orderBy('name')
         ->get();
      return view('client.rrhh.autoridades', compact('employees'));
   }
   public function rhpersonal()
   {
      $employees = Employee::with(['charges', 'levels'])
         ->orderBy('last_name')
         ->orderBy('name')
         ->get();
      return view('client.rrhh.personal', compact('employees'));
   }
   public function rhessa()
   {
      $salaries = Salarie::with(['salcats', 'clases'])->get();
      return view('client.rrhh.essa', compact('salaries'));
   }
   // public function rhdocumentos()
   // {
   //    $doin = Document::all()->where('categorie','=','IMPORTANTES') ->where('publish','=','1');
   //    return view('client.rrhh.documentos', compact('doin'));
      
   // }
   public function alcalde()
   {
      $employees = DB::table('employees')
      ->join('charges', 'charges.id','=','employees.charge_id')
      ->select('employees.photo','employees.name','employees.last_name','employees.address','charges.charge_employee','employees.email','employees.phone')
      ->whereRaw('UPPER(charges.charge_employee) = ?', ['ALCALDE MUNICIPAL'])
      ->get();
      return view('client.alcalde', compact('employees'));
   }


   // public function contact()
   // {
   //    return view('client.contact.contact');
   // }

   public function store(Request $Request)
   {
      $contact = Contact::create($Request->all());

      return redirect()->back();
   }

   public function vista()
   {
      $contacts = Contact::all();
      return view('serve.sends.send', compact('contacts'));
   }
}
