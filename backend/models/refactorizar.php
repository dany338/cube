<?php

namespace backend\models;

use Yii;
class Prueba extends \yii\db\ActiveRecord
{
    const statusX = '6';
    const statusY = '1';
    const statusZ = '2';
    public function post_confirm()
    {
        // Se puede utilizar una sola linea para consultar el dato de esta manera se disminuye el número de lineas
        // que se puedan emplear en una sola instrucción
        $servicio = Service::find(Input::get('service_id'));
        // cuando se hace una comparación con objetos siempre es con doble igual == y mas si se va a comparar con NULL
        // de igual manera se puede emplear la función is_null
        if($servicio !== NULL) 
        {
            // Una de las buenas practicas a emplear es el uso de variables constantes definidas en la clase ya que con el tiempo
            // por alguna razon los identificadores pueden cambiar
            if($servicio->status_id == statusX) {
                return Response::json(array('error'=>'2'));
            }
            // se coloca esta comparación aca pues si el servicio del user uuid es vacio rompe el código y no sigue ejecutando instrucciones innecesarias
            if($servicio->user->uuid == '') { 
                return Response::json(array('error'=>'0'));
            }

            if($servicio->driver_id == NULL && $servicio->status_id == statusY) 
            {
                // La función save de la clase de componentes de yii2 hace las veces de insercción y actualización segun corresponda
                $driver = Driver::find(Input::get('service_id'));
                $driver->available = '0';
                if($driver->save())
                {
                    $servicio->driver_id = Input::get('service_id');
                    $servicio->status_id = statusZ;
                    $servicio->car_id = $driver->car_id;
                    // de esta forma primero realizamos el update a la clase driver e inmediatamente el update a la clase servicio
                    if($servicio->save())
                    {
                        $pushMessage = 'Tu servicio ha sido confirmado!';
                        // Una de las malas practicas es dejar comentarios en el codigo pues esto ocupa espacio tanto en el archivo y hace una función
                        // poco presentable de leer

                        // como ya tenemos el objeto servicio consultado no es necesario volver a llamar a la función como se hace en el código    
                        // $servicio = Service::find(Input::get('service_id'));
                        $push = Push::make();
                            
                        if($servicio->user->type == '1') {
                            $result = $push->ios($servicio->user->uuid, 1, 'honk.wav', 'Open', array('serviceId'=>$servicio->id));
                        }
                        else {
                            $result = $push->android2($servicio->user->uuid, 1, 'default', 'Open', array('serviceId'=>$servicio->id));
                        }
                        return Response::json(array('error'=>'0'));
                    } 
                }    
            } // Al tener una condición de escape exitosa dentro de las instrucciones anteriores no es necesario hacer el else, en Caso de que no ingrese al if simplemente retorna.
            return Response::json(array('error'=>'1'));
        }
        return Response::json(array('error'=>'3'));
    }
}
?>