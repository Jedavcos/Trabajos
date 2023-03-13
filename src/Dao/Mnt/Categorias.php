<?php 

//Tener esto a la mano sirve demasiado

// CREATE TABLE `nw202301`.`categorias` (
//     `catid` BIGINT(8) NOT NULL AUTO_INCREMENT,
//     `catnom` VARCHAR(45) NULL,
//     `catest` CHAR(3) NULL DEFAULT 'ACT',
//     PRIMARY KEY (`catid`));
  

    namespace Dao\Mnt; //El name space es: Para especificar como el archivo
    //Nombre de la clase tiene que ser igual al nombre del archivo

    use Dao\Table;

    Class Categorias extends Table{
        
        public static function insert(string $catnom, string $catest="Act"): int
        {
            $sqlstr = "INSERT INTO categorias (catnom, catest) /*values(?, ?)*/values(:catnom, :catest);";
            $rowsInserted = self::executeNonQuery($sqlstr, array("catnom"=>$catnom, "catest"=>$catest));
            //executenonquery para ejecutar comando que solo envia datos, más no recibe datos
            return $rowsInserted;
        }

        public static function update(
            string $catnom,
            string $catest,
            int $catid
        )
        {
            $sqlstr = "UPDATE categorias set catnom = :catnom, catest = :catest where catid = :catid;";
            $rowsUpdate = self::executeNonQuery(
                $sqlstr,
                array(
                    "catnom" => $catnom,
                    "catest" => $catest,
                    "catid" => $catid
                )
            );
            return $rowsUpdate;
        }

        // public static function update(
        //     string $catnom,
        //     string $catest,
        //     int $catid
        // ){
        //     $sqlstr = "UPDATE categorias set catnom = :catnom, catest = :catest where catid=:catid;";
        //     $rowsUpdated = self::executeNonQuery(
        //         $sqlstr,
        //         array(
        //             "catnom" => $catnom,
        //             "catest" => $catest,
        //             "catid" => $catid
        //         )
        //     );
        //     return $rowsUpdated;
        // }

        public static function delete(int $catid){
            $sqlstr = "DELETE from categorias where catid = :catid";
            $rowsDeleted = self::executeNonQuery(
                $sqlstr,
                array(
                    "catid" => $catid
                )
            );
            return $rowsDeleted;
        }

        public static function findall(){
            $sqlstr = "SELECT * FROM categorias;";
            return self::obtenerRegistros($sqlstr, array());
        }

        public static function findbyFilter(){
            
        }

        public static function findbyId(int $catid){
            $sqlstr = "SELECT * from categorias where catid = :catid";
            $row = self::obtenerUnRegistro(
                $sqlstr,
                array(
                    "catid" => $catid
                )
            );
            return $row;
        }



    }
    

?>