<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CitasController extends Controller
{
    public function index(){

        $citas = DB::connection('sanaval')->select('SELECT * FROM citas WHERE paciente = ? ORDER BY fecha DESC LIMIT 0,10', [806]);

        dd($citas);

    }
}
