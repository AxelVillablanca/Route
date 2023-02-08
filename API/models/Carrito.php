<?php
    require_once "connection/Connection.php";

    class Carrito {

        public static function getAllCA() {
            $db = new Connection();
            $query = "SELECT *FROM carrito";
            $resultado = $db->query($query);
            $datosCA = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosCA[] = [
                        'idCarrito' => $row['idCarrito'],
                        'precioSubtotal' => $row['precioSubtotal'],
                        'idCliente' => $row['idCliente']
                    ];
                }//end while
                return $datosCA;
            }//end if
            return $datosCA;
        }//end getAll

        public static function getWhereCA($idCarrito) {
            $db = new Connection();
            $query = "SELECT *FROM carrito WHERE idCarrito=$idCarrito";
            $resultado = $db->query($query);
            $datosCA = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosCA[] = [
                        'idCarrito' => $row['idCarrito'],
                        'precioSubtotal' => $row['precioSubtotal'],
                        'idCliente' => $row['idCliente']
                    ];
                }//end while
                return $datosCA;
            }//end if
            return $datosCA;
        }//end getWhere

        public static function insertCA($precioS, $idCliente) {
            $db = new Connection();
            $query = "INSERT INTO carrito (precioSubtotal, idCliente)
            VALUES('".$precioS."', '".$idCliente."')";
            $db->query($query);
            if($db->affected_rows) {
                return array(true, mysqli_insert_id($db));
            }//end if
            return FALSE;
        }//end insert

       

        public static function deleteCA($idCarrito) {
            $db = new Connection();
            $query = "DELETE FROM carrito WHERE idCarrito=$idCarrito";
            $db->query($query);
            if($db->affected_rows) {    
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Carrito