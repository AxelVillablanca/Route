<?php
    require_once "connection/Connection.php";

    class Cliente {

        public static function getAllC() {
            $db = new Connection();
            $query = "SELECT *FROM cliente";
            $resultado = $db->query($query);
            $datosC = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosC[] = [
                        'idCliente' => $row['idCliente'],
                        'nombreCliente' => $row['nombreCliente'],
                        'apellidoCliente' => $row['apellidoCliente'],
                        'emailCliente' => $row['emailCliente'],
                        'telefonoCliente' => $row['telefonoCliente']
                    ];
                }//end while
                return $datosC;
            }//end if
            return $datosC;
        }//end getAll

        public static function getWhereC($idCliente) {
            $db = new Connection();
            $query = "SELECT *FROM cliente WHERE    =$idCliente";
            $resultado = $db->query($query);
            $datosC = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosC[] = [
                        'idCliente' => $row['idCliente'],
                        'nombreCliente' => $row['nombreCliente'],
                        'apellidoCliente' => $row['apellidoCliente'],
                        'emailCliente' => $row['emailCliente'],
                        'telefonoCliente' => $row['telefonoCliente']
                    ];
                }//end while
                return $datosC;
            }//end if
            return $datosC;
        }//end getWhere

        public static function insertC($nombreC, $apellidoC, $emailC, $telefonoC) {
            $db = new Connection();
            $query = "INSERT INTO cliente (nombreCliente, apellidoCliente, emailCliente, telefonoCliente)
            VALUES('".$nombreC."', '".$apellidoC."', '".$emailC."', '".$telefonoC."')";
            $db->query($query);
            if($db->affected_rows) {
                return array(true, mysqli_insert_id($db));
            }//end if
            return FALSE;
        }//end insert

        public static function updateC($idCliente, $nombreC, $apellidoC, $emailC, $telefonoC) {
            $db = new Connection();
            $query = "UPDATE cliente SET
            nombreCliente='".$nombreC."', apellidoCliente='".$apellidoC."', emailCliente='".$emailC."', telefonoCliente='".$telefonoC."'
            WHERE idCliente=$idCliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function deleteC($idCliente) {
            $db = new Connection();
            $query = "DELETE FROM cliente WHERE idCliente=$idCliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Cliente