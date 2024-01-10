<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     
          
        $comunas  = Comuna::all();
        return view('finanza.comuna.index')->with('comunas',$comunas);
    }     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones = Region::all();
        return view('finanza.comuna.create')->with('regiones',$regiones);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $rg, $region;
    public function store(Request $request)
    {

        $this->validate($request, [
            'rg' => 'required',    
        ]);
        Comuna::create([
            'rg_id'=> $request->get('rg'),
            'COM_NOM'=> $request->get('nom'),
            'Region_RG_ID' => $request->get('rg'),
            
        ]);
       

     //   $comuna->save();
       return redirect('/comuna'); 
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
       $comunas = Comuna::where('com_id',$id)->First();
       $relacion=Region::with('comunas')->get();
     // return $relacion;
           
         return view('finanza.comuna.edit')->with('comunas',$comunas)
                                           ->with('relacion',$relacion);
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
        $nom=$request->get('nom'); 
        $affected = DB::table('Comuna')
        ->where('COM_ID', $id)
        ->update(['COM_NOM' => $nom]);
        return redirect('/comuna');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted= DB::table('Comuna')->where('COM_ID','=',$id)->delete();
        return redirect('/comuna');
   }

}