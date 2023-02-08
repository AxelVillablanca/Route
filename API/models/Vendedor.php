<?php
    require_once "connection/Connection.php";

    class Vendedor {

        public static function getAllV() {
            $db = new Connection();
            $query = "SELECT *FROM vendedor";
            $resultado = $db->query($query);
            $datosV = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosV[] = [
                        'idVendedor' => $row['idVendedor'],
                        'nombreVendedor' => $row['nombreVendedor'],
                        'password' => $row['password'],
                        'emailVendedor' => $row['emailVendedor'],
                        'loginStatus' => $row['loginStatus']
                    ];
                }//end while
                return $datosV;
            }//end if
            return $datosV;
        }//end getAll

        public static function getWhereV($idVendedor) {
            $db = new Connection();
            $query = "SELECT *FROM vendedor WHERE idVendedor=$idVendedor";
            $resultado = $db->query($query);
            $datosV = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datosV[] = [
                        'idVendedor' => $row['idVendedor'],
                        'nombreVendedor' => $row['nombreVendedor'],
                        'password' => $row['password'],
                        'emailVendedor' => $row['emailVendedor'],
                        'loginStatus' => $row['loginStatus']
                    ];
                }//end while
                return $datosV;
            }//end if
            return $datosV;
        }//end getWhere

        public static function insertV($nombreV, $password, $emailV, $loginStatus) {
            $db = new Connection();
            $query = "INSERT INTO vendedor (nombreVendedor, password, emailVendedor, loginStatus)
            VALUES('".$nombreV."', '".$password."', '".$emailV."', '".$loginStatus."')";
            $db->query($query);
            if($db->affected_rows) {
                return array(true, mysqli_insert_id($db));
            }//end if
            return FALSE;
        }//end insert

        public static function updateV($idVendedor, $nombreV, $password, $emailV, $loginStatus) {
            $db = new Connection();
            $query = "UPDATE vendedor SET
            nombreVendedor='".$nombreV."', password='".$password."', emailVendedor='".$emailV."', loginStatus='".$loginStatus."'
            WHERE idVendedor=$idVendedor";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function deleteV($idVendedor) {
            $db = new Connection();
            $query = "DELETE FROM vendedor WHERE idVendedor=$idVendeddor";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Vendedor