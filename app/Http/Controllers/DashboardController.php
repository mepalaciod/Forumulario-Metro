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
    }}
