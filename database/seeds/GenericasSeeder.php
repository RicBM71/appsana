<?php

use App\Parametro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class GenericasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Parametro::truncate();

        $p = new Parametro;
        $p->titulo = "Horario Estado Alarma - FASE 0";
        $p->linea1 = "Lunes a Viernes de 9h a 14h.";
        $p->linea2 = "Horario preferente mayores 65 de 10h a 12h.";
        $p->linea3 = "* El horario variará semanalmente conforme a la situación actual.";


        $p->save();



    }
}
