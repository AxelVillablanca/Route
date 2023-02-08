<?php
    require_once "models/Orden.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idOrden'])){
                echo json_encode((Orden::getWHEREO($_GET['idOrden'])));
            }
            else{
                echo json_encode((Orden::getAllO()));
            }
            break;

        case 'POST':

            $datosO = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datosO != NULL){

                    $array = Orden::insertO($datosO->fechaCreacion, $datosO->estado, $datosO->precioTotal, $datosO->idCarrito, $datosO->idEnvio);
                    $arr = array ('idOrden'=>array_values($array)[1],'fechaCreacion'=>$datosO->fechaCreacion, 'estado'=>$datosO->estado, 'precioTotal'=>$datosO->precioTotal, 'idCarrito'=>$datosO->idCarrito, 'idEnvio'=>$datosO->idEnvio);
                    
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
                $datosO = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datosO != NULL){
                        if(Orden::updateO($datosO->idOrden ,$datosO->fechaCreacion, $datosO->estado, $datosO->precioTotal, $datosO->idCarrito, $datosO->idEnvio)) {
                            http_response_code(200);
                        }
                        else{
                            http_response_code(400);
                        }
                }
                break;

        
            default:

            break;

            //FIN items

            }