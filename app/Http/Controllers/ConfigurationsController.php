<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    public function indexCampus()
    {
        $Datos = DB::table('Campus')
                    ->select('*')
                    ->get();

        return view('Campus', [
            'Datos' => $Datos,
        ]);
    }

    public function createCampus(Request $Request)
    { 
        DB::table('Campus')->insert([
            'Nombre' => $Request->Nombre,
        ]);
        return redirect('/Campus');
    }
    
    public function V_EditCampus($id)
    {
        $Datos = DB::table('Campus')
                ->where('id',$id)
                ->select('*')
                ->first();

        $campos = [
            'Nombre' => 'Nombre del campus',
        ];
        return view('PEdit', [
            'Datos'     => $Datos,
            'campos'    => $campos
        ]);
    }
    
    public function deliteCampus($id)
    {
        $Datos = DB::table('Campus')
                ->where('id',$id)
                ->delete();
        return redirect()->back();
    }
    
    public function editUPCampus(Request $Request, $id)
    {
        try{
            $Request->validate([
                'Nombre' => 'required|string|max:255',
            ]);
            DB::table('Campus')
                ->where('id',$id)
                ->update([
                    'Nombre' => $Request->Nombre
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th, $Request);
        }
        return redirect('/Campus');
    }

    // ------------------ Areas ---
    public function indexAreas()
    {
        $Datos = DB::table('Areas')
                ->join('Campus', 'Areas.Campus', '=', 'Campus.id') // Relación entre tablas
                ->select('Areas.*', 'Campus.Nombre as NombreCampus') // Selecciona todos los campos de Areas y el nombre del campus
                ->get();

        // dd($Datos);

        $Campus = DB::table('Campus')
                ->select('*')
                ->get();

        return view('Areas', [
            'Datos'     => $Datos,
            'Campus'    => $Campus,
        ]);
    }

    public function createAreas(Request $Request)
    { 
        // dd($Request);
        DB::table('Areas')->insert([
            'Campus' => $Request->Campus,
            'Nombre' => $Request->Nombre,
            'Responsable' => $Request->Responsable
        ]);
        return redirect('/Areas');
    }
    
    public function V_EditAreas($id)
    {
        $Datos = DB::table('Areas')
                ->where('id',$id)
                ->select('*')
                ->first();

        $Campus = DB::table('Campus')
                ->select('*')
                ->get();

        $campos = [
            'Campus' => 'Campus',
            'Nombre' => 'Nombre del Areas',
            'Responsable' => 'Responsable del area',
        ];
        return view('PEditA', [
            'Datos'     => $Datos,
            'campos'    => $campos,
            'Campus'    => $Campus,
        ]);
    }
    
    public function deliteAreas($id)
    {
        $Datos = DB::table('Areas')
                ->where('id',$id)
                ->delete();
        return redirect()->back();
    }
    
    public function editUPAreas(Request $Request, $id)
    {
        // dd($Request);
        try{
            $Request->validate([
                'Campus' => 'required|numeric|max:255',
                'Nombre' => 'required|string|max:255',
                'Responsable' => 'required|string|max:255',
            ]);
            DB::table('Areas')
                ->where('id',$id)
                ->update([
                    'Campus' => $Request->Campus,
                    'Nombre' => $Request->Nombre,
                    'Responsable' => $Request->Responsable
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th, $Request);
        }
        return redirect('/Areas');
    }
    // ------------------ Areas ---
    public function indexBien()
    {
        // $Datos = DB::table('Areas')
        //         ->join('Campus', 'Areas.Campus', '=', 'Campus.id') // Relación entre tablas
        //         ->select('Areas.*', 'Campus.Nombre as NombreCampus') // Selecciona todos los campos de Areas y el nombre del campus
        //         ->get();

        // dd($Datos);

        $Datos = DB::table('Producto')
                ->select('*')
                ->get(); 

        return view('Bien.Bien', [
            'Datos'     => $Datos,
        ]);
    }

    public function createBien(Request $Request)
    { 
        // dd($Request);
        DB::table('Producto')->insert([
            'Codigo' => $Request->Codigo,
            'Proveedor' => $Request->Proveedor, 
        ]);
        return redirect('/Bien');
    }
    
    public function V_EditBien($id)
    {
        $Datos = DB::table('Producto')
                ->where('id',$id)
                ->select('*')
                ->first();

        $campos = [
            'Codigo' => 'Codigo',
            'Proveedor' => 'Nombre del proveedor',
        ];
        return view('Bien.Edit', [
            'Datos'     => $Datos,
            'campos'    => $campos,
        ]);
    }
    
    public function deliteBien($id)
    {
        $Datos = DB::table('Producto')
                ->where('id',$id)
                ->delete();
        return redirect()->back();
    }
    
    public function editUPBien(Request $Request, $id)
    {
        // dd($Request);
        try{
            $Request->validate([
                'Codigo' => 'required|string|max:255',
                'Proveedor' => 'required|string|max:255',
            ]);
            DB::table('Producto')
                ->where('id',$id)
                ->update([
                    'Codigo' => $Request->Codigo,
                    'Proveedor' => $Request->Proveedor
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th, $Request);
        }
        return redirect('/Bien');
    }
}