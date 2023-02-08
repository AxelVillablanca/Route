<?php
    require_once "connection/Connection.php";

    class Items {

        public static function getAllI() {
            $db = new Connection();
            $query = "SELECT *FROM items";
            $resultado = $db->query($query);
            $datosI = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosI[] = [
                        'idItems' => $row['idItems'],
                        'cantidadItem' => $row['cantidadItem'],
                        'precioItem' => $row['precioItem'],
                        'precioTotalItem' => $row['precioTotalItem'],
                        'idProducto' => $row['idProducto'],
                        'idCarrito' => $row['idCarrito']
                    ];
                }//end while
                return $datosI;
            }//end if
            return $datosI;
        }//end getAll

        public static function getWhereI($idItems) {
            $db = new Connection();
            $query = "SELECT *FROM items WHERE idItems=$idItems";
            $resultado = $db->query($query);
            $datosI = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosI[] = [
                        'idItems' => $row['idItems'],
                        'cantidadItem' => $row['cantidadItem'],
                        'precioItem' => $row['precioItem'],
                        'precioTotalItem' => $row['precioTotalItem'],
                        'idProducto' => $row['idProducto'],
                        'idCarrito' => $row['idCarrito']
                    ];
                }//end while
                return $datosI;
            }//end if
            return $datosI;
        }//end getWhere

        public static function insertI($cantidadI, $precioIte, $precioT, $idProducto, $idCarrito) {
            $db = new Connection();
            $query = "INSERT INTO items (cantidadItem, precioItem, precioTotalItem, idProducto, idCarrito)
            VALUES('".$cantidadI."', '".$precioIte."', '".$precioT."', '".$idProducto."' , '".$idCarrito."')";
            $db->query($query);
            if($db->affected_rows) {
                return array(true, mysqli_insert_id($db));
            }//end if
            return FALSE;
        }//end insert

        public static function updateI($idItems,$cantidadI, $precioIte, $precioT, $idProducto, $idCarrito) {
            $db = new Connection();
            $query = "UPDATE items SET
            cantidadItem='".$cantidadI."', precioItem='".$precioIte."', precioTotalItem='".$precioT."', idProducto='".$idProducto."', idCarrito='".$idCarrito."'
            WHERE idItems=$idItems";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function deleteI($idItems) {
            $db = new Connection();
            $query = "DELETE FROM items WHERE idItems=$idItems";
            $db->query($query);
            if($db->affected_rows) {    
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class ITEMS
