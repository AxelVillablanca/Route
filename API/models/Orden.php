<?php
    require_once "connection/Connection.php";

    class Orden {

        public static function getAllO() {
            $db = new Connection();
            $query = "SELECT *FROM ORDEN";
            $resultado = $db->query($query);
            $datosO = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosO[] = [
                        'idOrden' => $row['idOrden'],
                        'fechaCreacion' => $row['fechaCreacion'],
                        'estado' => $row['estado'],
                        'precioTotal' => $row['precioTotal'],
                        'idCarrito' => $row['idCarrito'],
                        'idEnvio' => $row['idEnvio']
                    ];
                }//end while
                return $datosO;
            }//end if
            return $datosO;
        }//end getAll

        public static function getWhereO($idOrden) {
            $db = new Connection();
            $query = "SELECT *FROM ORDEN WHERE idOrden=$idOrden";
            $resultado = $db->query($query);
            $datosO = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosO[] = [
                        'idOrden' => $row['idOrden'],
                        'fechaCreacion' => $row['fechaCreacion'],
                        'estado' => $row['estado'],
                        'precioTotal' => $row['precioTotal'],
                        'idCarrito' => $row['idCarrito'],
                        'idEnvio' => $row['idEnvio']
                    ];
                }//end while
                return $datosO;
            }//end if
            return $datosO;
        }//end getWhere

        public static function insertO($fechaC, $estado, $precioTo, $idCarrito, $idEnvio) {
            $db = new Connection();
            $query = "INSERT INTO ORDEN (fechaCreacion, estado, precioTotal, idCarrito, idEnvio)
            VALUES('".$fechaC."', '".$estado."', '".$precioTo."', '".$idCarrito."' , '".$idEnvio."')";
            $db->query($query);
            if($db->affected_rows) {
                return array(true, mysqli_insert_id($db));
            }//end if
            return FALSE;
        }//end insert

        public static function updateO($idOrden,$fechaC, $estado, $precioTo, $idCarrito, $idEnvio) {
            $db = new Connection();
            $query = "UPDATE ORDEN SET
            fechaCreacion='".$fechaC."', estado='".$estado."', precioTotal='".$precioTo."', idCarrito='".$idCarrito."', idEnvio='".$idEnvio."'
            WHERE idOrden=$idOrden";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function deleteO($idOrden) {
            $db = new Connection();
            $query = "DELETE FROM ORDEN WHERE idOrden=$idOrden";
            $db->query($query);
            if($db->affected_rows) {    
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class ITEMS
