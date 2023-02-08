<?php
    require_once "models/Vendedor.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idVendedor'])){
                echo json_encode((Vendedor::getWhereV($_GET['idVendedor'])));
            }
            else{
                echo json_encode((Vendedor::getAllV()));
            }
            break;

        case 'POST':

            $datosV = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datosV != NULL){
                    if(Vendedor::insertV($datosV->nombreVendedor, $datosV->password, $datosV->emailVendedor, $datosV->loginStatus)) {
                        http_response_code(200);
                    }
                    else{
                        http_response_code(400);
                    }
            }
            break;

            case 'PUT':
                $datosV = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datosV != NULL){
                        if(Vendedor::updateV($datosV->idVendedor ,$datosV->nombreVendedor, $datosV->password, $datosV->emailVendedor, $datosV->loginStatus)) {
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