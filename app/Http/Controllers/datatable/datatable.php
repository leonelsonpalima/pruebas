<?php

namespace App\Http\Controllers\datatable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Response;
Use App\Personal;

class datatable extends Controller
{
    public function index(){
        return view('datatable.index');
    }
    
    public function buscar(Request $peticion){
        
        $personal = Personal::where('PER_CED', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_CRE', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_NOM', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_APE', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_EMAIL', 'like', '%' . $peticion['datos'] . '%')
                                ->get();
/*        
        $personal = Personal::where('PER_CED', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_CRE', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_NOM', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_APE', 'like', '%' . $peticion['datos'] . '%')
                                ->orWhere('PER_EMAIL', 'like', '%' . $peticion['datos'] . '%')
                                ->get();
*/
        return Response::json($personal);
/*
    return Response::json([
                                ['cedula' => '02478072', 'nombre' => 'RUMUALDO', 'apellidos' => 'BYTRIAGA', 'credencial' => '0388', 'cargo' => 'Casado(a)'],
                                ['cedula' => '02517074', 'nombre' => 'LUIS', 'apellidos' => 'CABUYA', 'credencial' => '0437', 'cargo' => 'Concubino(a)'],
                                ['cedula' => '02729954', 'nombre' => 'GUSTAVO', 'apellidos' => 'DURAN', 'credencial' => '0226', 'cargo' => 'Concubino(a)'],
                                ['cedula' => '02813151', 'nombre' => 'RAFAEL', 'apellidos' => 'VASQUEZ', 'credencial' => '0891', 'cargo' => 'Soltero(a)'],
                                ['cedula' => '02840992', 'nombre' => 'JOSE', 'apellidos' => 'GONZALEZ', 'credencial' => '0510', 'cargo' => 'Casado(a)'],
                                ['cedula' => '02846679', 'nombre' => 'GRACILIANO', 'apellidos' => 'CORALES', 'credencial' => '0868', 'cargo' => 'Casado(a)'],
                                ['cedula' => '02851124', 'nombre' => 'JORGE', 'apellidos' => 'LOVERA', 'credencial' => '0436', 'cargo' => 'Soltero(a)'],
                                ['cedula' => '03007746', 'nombre' => 'BAUTISTA', 'apellidos' => 'LOPEZ', 'credencial' => '0321', 'cargo' => 'Concubino(a)'],
                                ['cedula' => '03127205', 'nombre' => 'ANACLETO', 'apellidos' => 'MORALES', 'credencial' => '0448', 'cargo' => 'Casado(a)'],
                                ['cedula' => '03128970', 'nombre' => 'FELIX', 'apellidos' => 'COLMENARES', 'credencial' => '0336', 'cargo' => 'Casado(a)'],
            ]);
*/
    }
}
