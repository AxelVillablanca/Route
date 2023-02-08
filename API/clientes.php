<?php
    require_once "models/Cliente.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idCliente'])){
                echo json_encode((Cliente::getWhereC($_GET['idCliente'])));
            }
            else{
                echo json_encode((Cliente::getAllC()));
            }
            break;

        case 'POST':

            $datosC = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datosC != NULL){

                    $array = Cliente::insertC($datosC->nombreCliente, $datosC->apellidoCliente, $datosC->emailCliente, $datosC->telefonoCliente);
                    $arr = array ('idCliente'=>array_values($array)[1],'nombreCliente'=>$datosC->nombreCliente, 'apellidoCliente'=>$datosC->apellidoCliente, 'emailCliente'=>$datosC->emailCliente, 'telefonoCliente'=>$datosC->telefonoCliente);
                    
                    if(array_values($array)[0]) {
                        echo json_encode($arr);
                    }
                    else{
                        http_response_code(400);
                    }


            }
            break;

            case 'PUT':
                $datosC = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datosC != NULL){
                        if(Cliente::updateC($datosC->idCliente ,$datosC->nombreCliente, $datosC->apellidoCliente, $datosC->emailCliente, $datosC->telefonoCliente)) {
                            http_response_code(200);
                        }
                        else{
                            http_response_code(400);
                        }
                }
                break;


            default:

            break;

           

            }//Cliente