<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioMetro;
class DashboardController extends Controller
{
public function index()
    {
        $formularios = FormularioMetro::all();
        return view('dashboard', compact('formularios'));
    }

    public function create()
{
    $razones = DB::table('t1_razon')->where('estado', 1)->get();
    $tiposDocumento = DB::table('t1_tipo_documento')->get();
    $generos = DB::table('t1_genero')->get();
    $vias = DB::table('t1_via_principal')->get();
    $municipios = DB::table('t1_municipio')->get();
    $estratos = DB::table('t1_estrato')->get();
    $sisben = DB::table('t1_sisben')->get();
    $niveles = DB::table('t1_nivel_academico')->get();
    $grados = DB::table('t1_grado')->get();
    $semestres = DB::table('t1_semestre')->get();
    $discapacidades = DB::table('t1_tipo_discapacidad')->get();
    $beneficios = DB::table('t1_beneficio_sapiencia')->get();

    return view('welcome', compact(
        'razones','tiposDocumento','generos','vias','municipios',
        'estratos','sisben','niveles','grados','semestres',
        'discapacidades','beneficios'
    ));
}}
