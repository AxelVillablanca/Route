<?php
    require_once "models/Items.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idItems'])){
                echo json_encode((Items::getWHEREI($_GET['idItems'])));
            }
            else{
                echo json_encode((Items::getAllI()));
            }
            break;

        case 'POST':

            $datosI = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datosI != NULL){

                $array = Items::insertI($datosI->cantidadItem, $datosI->precioItem, $datosI->precioTotalItem, $datosI->idProducto, $datosI->idCarrito);
                $arr = array ('idItems'=>array_values($array)[1],'cantidadItem'=>$datosI->cantidadItem, 'precioItem'=>$datosI->precioItem, 'precioTotalItem'=>$datosI->precioTotalItem, 'idProducto'=>$datosI->idProducto, 'idCarrito'=>$datosI->idCarrito);
                
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
                $datosI = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datosI != NULL){
                        if(Items::updateI($datosI->idItems ,$datosI->cantidadItem, $datosI->precioItem, $datosI->precioTotalItem, $datosI->idProducto, $datosI->idCarrito)) {
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