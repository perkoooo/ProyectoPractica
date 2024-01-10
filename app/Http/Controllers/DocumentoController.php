<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $documentos = Documento::all(); // O cualquier lógica para obtener tus documentos

        return view('finanza.documento.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all(); // Obtén la lista de todas las empresas
        return view('finanza.documento.create', compact('empresas'));
        return view('finanza.documento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
  
       

        $documentos = new Documento;
        $documentos  -> DOC_FOLIO = $request->get('DOC_FOLIO');
        $documentos  -> DOC_TD= $request->get('DOC_TD');
        $documentos  -> DOC_NNC= $request->get('DOC_NNC');
        $documentos  -> DOC_FC= $request->get('DOC_FC');
        $documentos  -> DOC_TMV= $request->get('DOC_TMV');
        $documentos  -> empresa_EMP_RUT= $request->get('Empresa_EMP_RUT');
        $documentos ->  DOC_NT=$request->get('DOC_NT');
        $documentos ->  DOC_EST=$request->get('DOC_EST');
        $documentos -> save();
        return redirect('documento.index');
   }
    
    
    //   $region->save(); 
     
   

       
       
        // Redirecciona a la vista index con un mensaje de éxito
        
  
        /*Session::flash('error', 'No se pudo crear el documento. Asegúrate de que todos los datos son válidos.');
        return redirect()->route('documento.create');*/
    

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($DOC_ID)
    {
        $documentos = Documento::find($DOC_ID);
        return view('finanza.documento.edit')->with('documento',$documentos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $DOC_ID)
    {
         // Validación de campos requeridos por Eloquent
    // Validación de datos
    $request->validate([
        'DOC_FOLIO' => 'required',
        'DOC_TD' => 'required',
       
        'DOC_FC' => 'required',
        'DOC_TMV' => 'required',
        'DOC_EST' => 'required',
        'DOC_NT' => 'required|numeric',
        // Agrega validaciones adicionales según sea necesario
    ]);

    // Encuentra el documento que deseas actualizar
    $documento = Documento::find($DOC_ID);

    // Actualiza los atributos con los datos proporcionados en la solicitud
    $documento->DOC_FOLIO = $request->input('DOC_FOLIO');
    $documento->DOC_TD = $request->input('DOC_TD');
  
    $documento->DOC_FC = $request->input('DOC_FC');
    $documento->DOC_TMV = $request->input('DOC_TMV');
    $documento->DOC_EST = $request->input('DOC_EST');
    $documento->DOC_NT = $request->input('DOC_NT');
    
    // Actualiza más campos según sea necesario

    // Guarda los cambios en la base de datos
    $documento->save();

   

    // Redirección y mensaje flash
    return redirect()->route('documento.index')->with('success', 'Documento actualizado exitosamente');
    }
    
        public function destroy($DOC_ID)
        {
            $documento = Documento::find($DOC_ID);

            // Verificar si el documento existe
            if ($documento) {
                $documento->delete();
                return redirect()->route('documento.index')->with('success', 'Documento eliminado exitosamente');
            } else {
                return redirect()->route('documento.index')->with('warning', 'Documento no encontrado');
            }
        }

    // Otros métodos del controlador

    
}

