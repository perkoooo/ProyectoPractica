<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informes;
use App\Models\Documento;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{
    public function index()
    {
       
        // Lógica para obtener datos
        $year = date('Y'); // Obtener el año actual por defecto
        $month = date('m'); // Obtener el mes actual por defecto
        $utilidad = $this->calcularUtilidad($year, $month);
        // Lógica para obtener datos según el año y mes actual
        $Compras = Documento::whereYear('DOC_FC', $year)
            ->whereMonth('DOC_FC', $month)
            ->where('DOC_TMV', 'Compras')
            ->get();

        $Ventas = Documento::whereYear('DOC_FC', $year)
            ->whereMonth('DOC_FC', $month)
            ->where('DOC_TMV', 'Ventas')
            ->get();
        $utilidad = $this->calcularUtilidad($year, $month);
        // Otros datos que quieras pasar a la vista
        $data = [
            'Compras' => $Compras,
            'Ventas' => $Ventas,
            'utilidad' => $utilidad,
            // Otros datos que quieras pasar a la vista
        ];

        // Devuelve la vista con los datos necesarios
        return view('finanza.informes.index', $data);
    }

    public function obtenerDatos(Request $request)
    {
       
        // Lógica para obtener datos según el año y mes seleccionados
        $year = $request->input('year');
        $month = $request->input('month');
       
        $Compras = Documento::with('empresa')  // Asegúrate de tener definida la relación en tu modelo
            ->whereYear('DOC_FC', $year)
            ->whereMonth('DOC_FC', $month)
            ->where('DOC_TMV', 'Compra')
            ->get();

        $Ventas = Documento::with('empresa')  // Asegúrate de tener definida la relación en tu modelo
            ->whereYear('DOC_FC', $year)
            ->whereMonth('DOC_FC', $month)
            ->where('DOC_TMV', 'Venta')
            ->get();
        // Otras consultas según tus necesidades

      
        return view('finanza.informes.index', compact('Compras', 'Ventas'));
    }
        public function calcularUtilidad($year, $month)
    {
        $comprasTotal = Documento::whereYear('DOC_FC', $year)
            ->whereMonth('DOC_FC', $month)
            ->where('DOC_TMV', 'Compras')
            ->sum('DOC_NT');

        $ventasTotal = Documento::whereYear('DOC_FC', $year)
            ->whereMonth('DOC_FC', $month)
            ->where('DOC_TMV', 'Ventas')
            ->sum('DOC_NT');

        $utilidad = $comprasTotal - $ventasTotal ;

        return $utilidad;
    }
}
