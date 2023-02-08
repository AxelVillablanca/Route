<?php
    require_once"connection/Connection.php";

    class Producto {

        public static function getAll(){
        $db = new Connection();

        $query = "SELECT * FROM producto";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'idProducto' => $row['idProducto'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'stock' => $row['stock'],
                    'precio' => $row['precio'],
                    'estado' => $row['estado']
                ];
            }
            return $datos;
        }
            return $datos;
        }//getAll


        PUBLIC static function getWHERE($idProducto){
            $db = new Connection();
    
            $query = "SELECT * FROM producto where idProducto=$idProducto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[] = [
                        'idProducto' => $row['idProducto'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion'],
                        'stock' => $row['stock'],
                        'precio' => $row['precio'],
                        'estado' => $row['estado']
                    ];
                }
                return $datos;
            }
                return $datos;
            }//geTwhere
    
    
            public static function insert($nombre, $descripcion, $stock, $precio, $estado) {
                $db = new Connection();
                $query = "INSERT INTO producto (nombre, descripcion, stock, precio, estado)
                VALUES('".$nombre."', '".$descripcion."', '".$stock."', '".$precio."', '".$estado."')";
                $db->query($query);
                if($db->affected_rows) {
                    return array(true, mysqli_insert_id($db));
                }//end if
                return FALSE;
            }//end insert
    
            public static function update($idProducto, $nombre, $descripcion, $stock, $precio, $estado) {
                $db = new Connection();
                $query = "UPDATE producto SET
                nombre='".$nombre."', descripcion='".$descripcion."', stock='".$stock."', precio='".$precio."', estado='".$estado."' 
                WHERE idProducto=$idProducto";
                $db->query($query);
                if($db->affected_rows) {
                    return TRUE;
                }//end if
                return FALSE;
            }//end update
    
            public static function delete($idProducto){
                $db = new Connection();
                $query = "DELETE FROM producto WHERE idProducto=$idProducto";
                $db->query($query);
                if($db->affected_rows){
                    return TRUE;
                }
                return FALSE;
            }//delete


        }//classs producto

    