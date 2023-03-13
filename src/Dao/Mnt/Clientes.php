<?php 

//Tener esto a la mano sirve demasiado

// CREATE TABLE `nw202301`.`clientes` (
//     `clientid` BIGINT(8) NOT NULL AUTO_INCREMENT,
//     `clientname` VARCHAR(45) NULL,
//     `clientstatus` CHAR(3) NULL DEFAULT 'ACT',
//     PRIMARY KEY (`clientid`));
  

    namespace Dao\Mnt; //El name space es: Para especificar como el archivo
    //Nombre de la clase tiene que ser igual al nombre del archivo

    use Dao\Table;

    Class Clientes extends Table{
        
        public static function insert(
        string $clientname, 
        string $clientgender="MAL", 
        string $clientphone1,
        string $clientphone2, 
        string $clientemail, 
        string $clientIdnumber, 
        string $clientbio, 
        string $clientdatecrt,
        string $clientstatus="Act"): int
        {
            $sqlstr = "INSERT INTO clientes (clientname, clientgender, 
            clientphone1, clientphone2, clientemail, clientIdnumber, 
            clientbio, clientstatus, clientdatecrt) /*values(?, ?)*/
            
            values
            (:clientname, 
            :clientgender, 
            :clientphone1, 
            :clientphone2, 
            :clientemail, 
            :clientIdnumber, 
            :clientbio, 
            :clientstatus,
            :clientdatecrt);";

            $rowsInserted = self::executeNonQuery($sqlstr, array("clientname"=>$clientname, 
            "clientgender"=>$clientgender, 
            "clientphone1"=>$clientphone1, 
            "clientphone2"=>$clientphone2, 
            "clientemail"=>$clientemail, 
            "clientIdnumber"=>$clientIdnumber, 
            "clientbio"=>$clientbio,
            "clientdatecrt"=>$clientdatecrt, 
            "clientstatus"=>$clientstatus));
            //executenonquery para ejecutar comando que solo envia datos, más no recibe datos
            return $rowsInserted;
        }

        public static function update(
            string $clientname,
            string $clientgender, 
            string $clientphone1,
            string $clientphone2, 
            string $clientemail, 
            string $clientIdnumber, 
            string $clientbio,
            string $clientdatecrt,
            string $clientstatus,
            int $clientid
        )
        {
            $sqlstr = "UPDATE clientes set 
            clientname = :clientname, 
            clientgender = :clientgender, 
            clientphone1 = :clientphone1, 
            clientphone2 = :clientphone2, 
            clientemail = :clientemail, 
            clientIdnumber = :clientIdnumber, 
            clientbio = :clientbio,
            clientdatecrt = :clientdatecrt,
            clientstatus = :clientstatus 
            where clientid = :clientid;";

            $rowsUpdate = self::executeNonQuery(
                $sqlstr,
                array(
                    "clientname" => $clientname,
                    "clientgender"=>$clientgender, 
                    "clientphone1"=>$clientphone1, 
                    "clientphone2"=>$clientphone2, 
                    "clientemail"=>$clientemail, 
                    "clientIdnumber"=>$clientIdnumber, 
                    "clientbio"=>$clientbio,
                    "clientdatecrt"=>$clientdatecrt,
                    "clientstatus" => $clientstatus,
                    "clientid" => $clientid
                )
            );
            return $rowsUpdate;
        }

        // public static function update(
        //     string $clientname,
        //     string $clientstatus,
        //     int $clientid
        // ){
        //     $sqlstr = "UPDATE clientes set clientname = :clientname, clientstatus = :clientstatus where clientid=:clientid;";
        //     $rowsUpdated = self::executeNonQuery(
        //         $sqlstr,
        //         array(
        //             "clientname" => $clientname,
        //             "clientstatus" => $clientstatus,
        //             "clientid" => $clientid
        //         )
        //     );
        //     return $rowsUpdated;
        // }

        public static function delete(int $clientid){
            $sqlstr = "DELETE from clientes where clientid = :clientid";
            $rowsDeleted = self::executeNonQuery(
                $sqlstr,
                array(
                    "clientid" => $clientid
                )
            );
            return $rowsDeleted;
        }

        public static function findall(){
            $sqlstr = "SELECT * FROM clientes;";
            return self::obtenerRegistros($sqlstr, array());
        }

        public static function findbyFilter(){
            
        }

        public static function findbyId(int $clientid){
            $sqlstr = "SELECT * from clientes where clientid = :clientid";
            $row = self::obtenerUnRegistro(
                $sqlstr,
                array(
                    "clientid" => $clientid
                )
            );
            return $row;
        }



    }
    

?>