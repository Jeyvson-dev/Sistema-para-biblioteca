<?php

require_once '../connect/connect.php';

class ListBook extends Connection{


    public function showBookList(){

        echo json_encode($this->sqlShowBookList());

    }

    private function sqlShowBookList(){

        $this->connect();

        $sql = "
               SELECT 
                    *
               FROM
                    book b,
                    status_book sb
               WHERE
                    b.ID_STATUS_BOOK = sb.ID_STATUS_BOOK
                ORDER BY
                    name_book                    
        ";

        $stmt = $this->connect->query($sql);

        $bookList = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $bookList;

    }


}

?>