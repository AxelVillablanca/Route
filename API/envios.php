<?php
    require_once "models/Envio.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idEnvio'])){
                echo json_encode((Envio::getWHEREE($_GET['idEnvio'])));
            }
            else{
                echo json_encode((Envio::getAllE()));
            }
            break;

        case 'POST':

            $datosE = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datosE != NULL){


                    $array = Envio::insertE($datosE->precioEnvio, $datosE->fechaEnvio, $datosE->direccionEnvio, $datosE->regionEnvio);
                    $arr = array ('idEnvio'=>array_values($array)[1],'precioEnvio'=>$datosE->precioEnvio, 'fechaEnvio'=>$datosE->fechaEnvio, 'direccionEnvio'=>$datosE->direccionEnvio, 'regionEnvio'=>$datosE->regionEnvio);
                    
                    if(array_values($array)[0]) {
                        //http_response_code(200);
                        echo json_encode($arr);
                    }
                    else{
                        http_response_code(400);
                    }

            }
            break;

            case 'PUT':
                $datosE = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datosE != NULL){
                        if(Envio::updateE($datosE->idEnvio ,$datosE->precioEnvio, $datosE->fechaEnvio, $datosE->direccionEnvio, $datosE->regionEnvio)) {
                            http_response_code(200);
                        }
                        else{
                            http_response_code(400);
                        }
                }
                break;

        
            default:

            break;

            //FIN ENVIO

            }