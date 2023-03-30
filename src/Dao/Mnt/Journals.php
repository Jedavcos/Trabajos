<?php 

//Tener esto a la mano sirve demasiado

// CREATE TABLE journals (
//     journal_id INT AUTO_INCREMENT PRIMARY KEY,
//     journal_date DATE NOT NULL,
//     journal_type ENUM('DEBIT', 'CREDIT') NOT NULL,
//     journal_description VARCHAR(255) NOT NULL,
//     journal_amount DECIMAL(10,2) NOT NULL,
//     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
// );

    namespace Dao\Mnt;
    use Dao\Table;

    class Journals extends Table
{

    public static function insert(
        string $journal_date,
        string $journal_type = "DEBIT",
        string $journal_description,
        float $journal_amount
    ): int
    {
        $sqlstr = "INSERT INTO journals 
        (journal_date, 
        journal_type, 
        journal_description, 
        journal_amount, 
        created_at) 
        values(:journal_date, 
        :journal_type, 
        :journal_description, 
        :journal_amount, now() );";//Now: funcion que dice la fecha de hoy. 

        $rowsInserted = self::executeNonQuery(
            $sqlstr,
            array(
                "journal_date" => $journal_date,
                "journal_type" => $journal_type,
                "journal_description" => $journal_description,
                "journal_amount" => $journal_amount,

            )
        );
        return $rowsInserted;
    }

    public static function update(
        string $journal_date,
        string $journal_type,
        string $journal_description,
        float $journal_amount,
        int $journal_id

    )
    {
        $sqlstr = "UPDATE journals SET
         journal_date = :journal_date, 
         journal_type = :journal_type, 
         journal_description = :journal_description, 
         journal_amount = :journal_amount 
         WHERE journal_id = :journal_id;";

        $rowsUpdated = self::executeNonQuery(
            $sqlstr,
            array(
                "journal_date" => $journal_date,
                "journal_type" => $journal_type,
                "journal_description" => $journal_description,
                "journal_amount" => $journal_amount,
                "journal_id" => $journal_id,
            )
        );
        return $rowsUpdated;
    }

    public static function delete(int $journal_id)
    {
        $sqlstr = "DELETE from journals where journal_id = :journal_id;";
        $rowsDeleted = self::executeNonQuery(
            $sqlstr,
            array(
                "journal_id" => $journal_id
            )
        );
        return $rowsDeleted;
    }
    public static function findAll()
    {
        $sqlstr = "SELECT * from journals;";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function findById(int $journal_id)
    {
        $sqlstr = "SELECT * from journals where journal_id = :journal_id;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "journal_id" => $journal_id
            )
        );
        return $row;
    }
}
    

?>