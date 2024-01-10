<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public $relacion_1;
    public function index()
    {
        $empresas=Empresa::all();
        return view('finanza.empresa.index')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas=Comuna::all();
        $regiones=Region::all();
        //return $regiones;
        return View('finanza.empresa.create')->with('comunas',$comunas)
                                             ->with('regiones',$regiones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variable=$request->get('rut');
        $variable1=$request->get('cm');
        $variable2=$request->get('rg');
       // return $variable1;
       
        if (Empresa::where('emp_rut',$variable)->exists()){
         $msg='Empresa Existe';   
         return view('finanza.empresa.create')->with($msg);
        }else{

        Empresa::create([
            'emp_rut' => $request->get('rut'),
            'emp_gr'=> $request->get('gr'),
            'emp_rs'=> $request->get('rs'),
            'emp_nf'=> $request->get('nf'),
            'emp_dr'=> $request->get('dr'),
            'emp_cm'=> $request->get('cm'),
            'emp_rg'=> $request->get('rg'),
            'emp_tl'=> $request->get('tl'),
            'emp_eml'=> $request->get('eml'),
            'Comuna_COM_ID'=>$request->get('cm')
        ]);
       
    }
     //   $region->save(); 
       return redirect('/empresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
       $empresas=Empresa::where('EMP_RUT',$id)->first();
       $comuna=Comuna::all();
       $region=Region::all();
       $relacion1=Comuna::with('empresas')->get();
     // $comunas=Comuna::where('COM_ID',$relacion1->Comuna_COM_ID);
    
     //$relacion_2=Comuna::with('regiones')->get();
      //$empresas =Empresa::find($id);
      
     //return $relacion1;
        return view('finanza.empresa.edit')->with('empresas', $empresas)
                                           ->with('comuna', $comuna)
                                           ->with('region',$region);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         $gr=$request->get('gr');
         $rs=$request->get('rs');
         $nf=$request->get('nf');
         $dr=$request->get('dr');
         $tl=$request->get('tl');
         $cm=$request->get('cm');
         $rg=$request->get('rg');
         $eml=$request->get('eml');

        $affected = DB::table('Empresa')
        ->where('emp_rut', $id)
        ->update(['emp_gr' => $gr,
                  'emp_rs' => $rs,
                  'emp_nf' => $nf,
                  'emp_dr' => $dr,
                  'emp_tl' => $tl,
                  'emp_cm' => $cm,
                  'emp_rg' => $rg,
                  'emp_eml'=>$eml,]);

  return redirect ('/empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted= DB::table('empresa')->where('EMP_RUT','=',$id)->delete();
        return redirect('/empresa');
    }
}
