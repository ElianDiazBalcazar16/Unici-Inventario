<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class InventarioPController extends Controller
{
    public function index()
    {
        // $info = DB::table('Entradas')
        //             ->select('Codigo','TUnidad')
        //             ->groupBy('Codigo')
        //             ->get();

        $Entradas = DB::table('Entradas')
                    ->join('Producto', 'Entradas.idCodigo', '=', 'Producto.id')
                    ->select('Entradas.idCodigo', 'Producto.Codigo', DB::raw('SUM("Entradas"."Cantidad") as total_entrada'))
                    ->groupBy('Entradas.idCodigo', 'Producto.Codigo',)
                    ->get();

        $Salidas = DB::table('Salidas')
                    ->join('Producto', 'Salidas.idCodigo', '=', 'Producto.id')
                    ->select('Salidas.idCodigo', 'Producto.Codigo', DB::raw('SUM("Cantidad") as total_salida'))
                    ->groupBy('Salidas.idCodigo', 'Producto.Codigo')
                    ->get();
        
        $entradasArray = $Entradas->keyBy('Codigo')->toArray();
        $salidasArray = $Salidas->keyBy('Codigo')->toArray();

        // dd($Entradas);
                    
        $Datos = [];
                    
        $productos = array_unique(array_merge(array_keys($entradasArray), array_keys($salidasArray)));

        // dd($entradasArray, $salidasArray);
                    
        foreach ($productos as $producto) {
            // $TUnidad = $entradasArray[$producto]->TUnidad;
            $TUnidad = 'pieza';
            $totalEntrada = $entradasArray[$producto]->total_entrada ?? 0;
            $totalSalida = $salidasArray[$producto]->total_salida ?? 0;
                        
            $Datos[] = [
                'Codigo' => $producto,
                'total_entrada' => $totalEntrada,
                'total_salida' => $totalSalida,
                'saldo' => $totalEntrada - $totalSalida,
                // 'unidad' => $TUnidad
                'unidad' => $TUnidad
            ];
        }

        // dd($cursos);
        return view('papeleria.papeleriainsumos', [
            'Entradas' => $Entradas,
            'Salidas' => $Salidas,
            'Datos' => $Datos,
        ]);
        // return view('General');
    }
    public function entradas()
    {
        $Entradas = DB::table('Entradas')
                    ->join('Producto', 'Entradas.idCodigo', '=', 'Producto.id')
                    ->select('*', 'Producto.Codigo')
                    ->get();

        // dd($Entradas);
        return view('papeleria.entradas', [
            'Entradas' => $Entradas,
        ]);
        // return view('General');
    } 
    
    public function salidas()
    {
        $Entradas = DB::table('Salidas')
                    ->join('Producto', 'Salidas.idCodigo', '=', 'Producto.id')
                    ->select('*', 'Producto.Codigo')
                    ->get();

        // dd($Entradas);
        return view('papeleria.salidas', [
            'Entradas' => $Entradas,
        ]);
        // return view('General');
    } 

    public function Descarga($filename)
    {
        // dd('llego');
        // Obtener la ruta completa del archivo
        $filePath = storage_path('app/private/uploads/' . $filename);
        
        // Verificar si el archivo existe
        if (file_exists($filePath)) {
            // Descargar el archivo
            return response()->download($filePath);
        } else {
            // Si el archivo no existe, devolver un error
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }
    }

    public function createE(Request $Request)
    {
        // DD('mango');

        // if($Request->hasFile('DirArchivo')){
        //     $file = $Request->file('DirArchivo');
        //     $originalName = $file->getClientOriginalName();
            
        //     $path = $file->storeAs('uploads/images', $originalName);

        //     $DirDB = $originalName;
        // } else {
        //     $path = " "; 
        // }

        // dd($Request);

        DB::table('Entradas')->insert([ 
            'idCodigo'          => $Request->Codigo,
            'Descripcion'       => $Request->Descripcion,
            'Cantidad'          => $Request->Cantidad,
            'Fecha'             => DB::raw('CURRENT_DATE'), 
            'QuienRecibe'       => $Request->QuienR,
            'Observaciones'     => $Request->Observaciones,
            'T_Inventario'      => 'ms', 
            'TUnidad'           => $Request->TUnidad,
            // 'Imagen'            => $path, 
        ]);
        return redirect('/Inventario');
    }

    public function createS(Request $Request)
    {
        // DD('mango');

        // if($Request->hasFile('DirArchivo')){
        //     $file = $Request->file('DirArchivo');
        //     $originalName = $file->getClientOriginalName();
            
        //     $path = $file->storeAs('uploads/images', $originalName);

        //     $DirDB = $originalName;
        // } else {
        //     $path = " "; 
        // }

        // dd($Request);

        DB::table('Salidas')->insert([ 
            'idCodigo'          => $Request->Codigo,
            'Descripcion'       => $Request->Descripcion,
            'Cantidad'          => $Request->Cantidad,
            'Fecha'             => DB::raw('CURRENT_DATE'), 
            'Area'              => $Request->Area,
            'QuienRecibe'       => $Request->QuienR,
            'Observaciones'     => $Request->Observaciones,
            'T_Inventario'      => 'ms', 
            'Unidad'           => $Request->TUnidad,
            // 'Imagen'            => $path, 
        ]);
        return redirect('/Inventario/salidas');
    }
    
    public function edit($id)
    {
        $Datos = DB::table('InventarioGeneral')
                ->where('id',$id)
                ->select('*')
                ->first();
        return view('Edit', [
            'Datos' => $Datos
        ]);
    }
    
    public function delite($id)
    {
        $Datos = DB::table('InventarioGeneral')
                ->where('id',$id)
                ->delete();
        return redirect()->back();
    }
    
    public function editUP(Request $Request, $id)
    {
        // dd($Request);

        try{
            $Request->validate([
                'CodigoDeBarras' => 'required|string|max:255',
                'IdNomenclatura' => 'required|string',
                'Campus'        => 'nullable|string',
                'ResponsableArea' => 'nullable|string',
                'ResponsableBien' => 'nullable|string',
                'Marca' => 'nullable|string',
                'Color' => 'nullable|string',
                'Adquisicion' => 'nullable|date',
                'Area' => 'nullable|string',
                'Bien' => 'nullable|string',
                'Modelo' => 'nullable|string',
                'SAT' => 'nullable|string',
                'NumSerie' => 'nullable|string',
                'Precio' => 'nullable|numeric',
                'ContaFiscal' => 'nullable|string',
                'Estado' => 'nullable|string',
                'Descripcion' => 'nullable|string',
                'Observaciones' => 'nullable|string',
                'Factura' => 'nullable|string',
                'Imagen' => 'nullable|string',
                'Medida' => 'nullable|string',
            ]);

            if($Request->hasFile('DirArchivo')){
                $file = $Request->file('DirArchivo');
                $originalName = $file->getClientOriginalName();
                
                $path = $file->storeAs('uploads/images', $originalName);
                
                // dd("Archivo almacenado en: ",$path);
                DB::table('InventarioGeneral')->where('id', $id)->update([
                    'Imagen' => $originalName,
                ]);
            }
            
            DB::table('InventarioGeneral')
                ->where('id',$id)
                ->update([
                    'CodigoDeBarras' => $Request->CodigoDeBarras,
                    'IdNomenclatura' => $Request->IdNomenclatura,
                    'Campus'        => $Request->Campus,
                    'ResponsableArea' => $Request->ResponsableArea,
                    'ResponsableBien' => $Request->ResponsableBien,
                    'Marca' => $Request->Marca,
                    'Color' => $Request->Color,
                    'Fecha' => $Request->Adquisicion,
                    'Area' => $Request->Area,
                    'Bien' => $Request->Bien,
                    'Modelo' => $Request->Modelo,
                    'Sat' => $Request->SAT,
                    'NumSerie' => $Request->NumSerie, // Asegúrate de que este campo esté en tu formulario
                    'Precio' => $Request->Precio,     // Campo adicional
                    'CodigoCFiscal' => $Request->ContaFiscal,
                    'Estado' => $Request->Estado,
                    'Descripcion' => $Request->Descripcion,
                    'Observaciones' => $Request->Observaciones,
                    'Factura' => $Request->Factura, 
                    'Medida' => $Request->Medida,
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th, $Request);
        }

        return redirect('/General');
    }
}