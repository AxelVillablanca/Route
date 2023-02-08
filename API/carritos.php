<?php
    require_once "models/Carrito.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idCarrito'])){
                echo json_encode((Carrito::getWHERECA($_GET['idCarrito'])));
            }
            else{
                echo json_encode((Carrito::getAllCA()));
            }
            break;

        case 'POST':

            $datosCA = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datosCA != NULL){

                    $array = Carrito::insertCA($datosCA->precioSubtotal, $datosCA->idCliente);
                    $arr = array ('idCarrito'=>array_values($array)[1],'precioSubtotal'=>$datosCA->precioSubtotal, 'idCliente'=>$datosCA->idCliente);
                    
                    if(array_values($array)[0]) {
                        echo json_encode($arr);
                    }
                    else{
                        http_response_code(400);
                    }
            }
            break;

            case 'PUT':
                $datos = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datos != NULL){
                        if(Carrito::updateCA($datosCA->idCarrito ,$datosCA->precioSubtotal, $datosCA->idCliente)) {
                            http_response_code(200);
                        }
                        else{
                            http_response_code(400);
                        }
                }
                break;

        
            default:

            break;

            //FIN CARRITO

            }