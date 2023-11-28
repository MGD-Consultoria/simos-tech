<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\SensorReport;
use Illuminate\Http\Request;

class SensoresController extends Controller
{
    function insertValues(Request $request)
    {
        try{
            $response = ['status'=>1,'message'=>'Sucesso'];
            if(!empty($request->codigo_identificacao)){
                $sensor = Sensor::query()->where('codigo_identificacao',$request->codigo_identificacao)->first();
                if(!empty($sensor->id)){
                    SensorReport::create([
                        'sensor_id'=>$sensor->id,
                        'valor'=>$request->valor
                    ]);
                    return ['status'=>1,'message'=>'Sucesso'];
                }else{
                    throw new \Exception('Código de identificação inválido');
                }
            }else{
                throw new \Exception('Código de identificação obrigatório');
            }
        }catch (\Exception $exception){
            return ['status'=>0,'message'=>$exception->getMessage()];
        }
    }
}
