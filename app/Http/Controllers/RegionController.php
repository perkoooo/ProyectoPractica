<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RegionController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::all();
       // return $regiones;
        return view('finanza.region.index')->with('regiones',$regiones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finanza.region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     
        $variable=$request->get('id');
       
        if (Region::where('rg_id',$variable)->exists()){
            
         return view('finanza.region.create');
        }else{

        Region::create([
            'rg_id' => $request->get('id'),
            'rg_nom'=> $request->get('nom'),

        ]);
       
    }
     //   $region->save();
       return redirect('/region'); 
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
        $regiones =Region::where('RG_ID',$id)->First();
       // return $regiones;
        return view('finanza.region.edit')->with('regiones',$regiones);
                                          
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
        $affected = DB::table('Region')
        ->where('rg_id', $id)
        ->update(['rg_nom' => $nom]);


     //$regiones =Region::where('RG_ID',$id)->First();
      $regiones = Region::find($id);
       $regiones->rg_nom =$request->get('nom');
       $regiones->save();
  /*       Region::Update([
            'rg_nom'->$request->get('nom'),
              ]);*/
    return redirect('/region');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  return $id;
        $deleted= DB::table('Comuna')->where('Region_RG_ID','=',$id)->delete();
        $deleted= DB::table('Region')->where('RG_ID','=', $id )->delete();
        return redirect('/region');
    }
}
