<?php
    require_once "models/Producto.php";

    switch ($_SERVER['REQUEST_METHOD']){

        case 'GET':
            
            if(isset($_GET['idProducto'])){
                echo json_encode((Producto::getWHERE($_GET['idProducto'])));
            }
            else{
                echo json_encode((Producto::getAll()));
            }
            break;
 
        case 'POST':

            $datos = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
            if($datos != NULL){

                    $array = Producto::insert($datos->nombre, $datos->descripcion, $datos->stock, $datos->precio, $datos->estado);
                    $arr = array ('idProducto'=>array_values($array)[1],'nombre'=>$datos->nombre, 'descripcion'=>$datos->descripcion, 'stock'=>$datos->stock, 'precio'=>$datos->precio, 'estado'=>$datos->estado);
                    
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
                $datos = json_decode(file_get_contents('php://input'));//captura la info y la decodifca para objetos
                if($datos != NULL){
                        if(Producto::update($datos->idProducto ,$datos->nombre, $datos->descripcion, $datos->stock, $datos->precio, $datos->estado)) {
                            http_response_code(200);
                        }
                        else{
                            http_response_code(400);
                        }
                }
                break;

        
            default:

            break;

            //FIN PRODUCTO

            }