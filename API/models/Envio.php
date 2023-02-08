<?php
    require_once "connection/Connection.php";

    class Envio {

        public static function getAllE() {
            $db = new Connection();
            $query = "SELECT *FROM envio";
            $resultado = $db->query($query);
            $datosE = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosE[] = [
                        'idEnvio' => $row['idEnvio'],
                        'precioEnvio' => $row['precioEnvio'],
                        'fechaEnvio' => $row['fechaEnvio'],
                        'direccionEnvio' => $row['direccionEnvio'],
                        'regionEnvio' => $row['regionEnvio']
                    ];
                }//end while
                return $datosE;
            }//end if
            return $datosE;
        }//end getAll

        public static function getWhereE($idEnvio) {
            $db = new Connection();
            $query = "SELECT *FROM envio WHERE idEnvio=$idEnvio";
            $resultado = $db->query($query);
            $datosE = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosE[] = [
                        'idEnvio' => $row['idEnvio'],
                        'precioEnvio' => $row['precioEnvio'],
                        'fechaEnvio' => $row['fechaEnvio'],
                        'direccionEnvio' => $row['direccionEnvio'],
                        'regionEnvio' => $row['regionEnvio']
                    ];
                }//end while
                return $datosE;
            }//end if
            return $datosE;
        }//end getWhere

        public static function insertE($precioE, $fechaE, $direccionE, $regionE) {
            $db = new Connection();
            $query = "INSERT INTO envio (precioEnvio, fechaEnvio, direccionEnvio, regionEnvio)
            VALUES('".$precioE."', '".$fechaE."', '".$direccionE."', '".$regionE."')";
            $db->query($query);
            if($db->affected_rows) {
                return array(true, mysqli_insert_id($db));
            }//end if
            return FALSE;
        }//end insert

        public static function updateE($idEnvio, $precioE, $fechaE, $direccionE, $regionE) {
            $db = new Connection();
            $query = "UPDATE envio SET
            precioEnvio='".$precioE."', fechaEnvio='".$fechaE."', direccionEnvio='".$direccionE."', regionEnvio='".$regionE."'
            WHERE idEnvio=$idEnvio";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function deleteC($idEnvio) {
            $db = new Connection();
            $query = "DELETE FROM envio WHERE idEnvio=$idEnvio";
            $db->query($query);
            if($db->affected_rows) {    
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class ENVIO