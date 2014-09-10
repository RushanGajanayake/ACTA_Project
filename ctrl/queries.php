<?php


/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/3/14
 * Time: 9:59 AM
 */


class mysqlQuery{

    private $db_connection = null;
    //public $query = "";


    public function __construct(){

        $this->databaseConnection();


    }



    private function databaseConnection(){

        if($this->db_connection != null){

            return true;
        }
        else{

            return $this->db_connection = DB_conn::conn();


        }
    }

    private function tableExist($table){

        if($this->databaseConnection()){
            $result = $this->db_connection->query("SHOW TABLES LIKE '$table'");

            if(!$result){
                echo "There is not existing table..!!";
                return false;
            }
            if($result->rowCount()>0){
                //echo "existing table <br>";
                return true;
            }
        }
    }

    public function insert($table,$values,$row=null){

        //echo $table;
        $items=count($values);

        if($this->tableExist($table)== true){
            $result = 'INSERT INTO '.$table;

            if($row != null){
                $result .= ' ('.$row.')';
            }

            for($i=0; $i<$items;$i++){
                $values[$i]= '"'.$values[$i].'"';

            }

            $values = implode(',',$values);
            $result .= ' VALUES('.$values.')';

            //echo $result;

            $sql = $this->db_connection->prepare($result);

            $sql->execute();

            if($sql){
                return true;
            }
            else{
                return false;
            }
        }


    }

    public function update($table,$rows,$where)
    {
        if($this->tableExist($table))
        {
            $keys1 = array_keys($where);
            $whr = ' ';

            for($i = 0; $i < count($where); $i++)
            {
                if(is_string($where[$keys1[$i]]))
                {
                    $whr .= $keys1[$i].'="'.$where[$keys1[$i]].'"';
                }
                else
                {
                    $whr .= $where[$i].'='.$where[$keys1[$i]];
                }
                if($i != count($where)-1)
                {
                    $whr .= ' AND ';
                }

            }

            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            //echo $keys;
            for($i = 0; $i < count($rows); $i++)
            {
                if(is_string($rows[$keys[$i]]))
                {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else
                {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                if($i != count($rows)-1)
                {
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$whr;
//            echo $update;

            $sql = $this->db_connection->prepare($update);
            $sql->execute();


            if($sql)
            {
                return true;
            }
            else{
                return false;
            }
        }
        else
        {
            //echo "false";
            return false;
        }
    }

    public function delete($table,$where = null)
    {
        if($this->tableExist($table))
        {
            if($where == null){
                $delete = 'DELETE '.$table;
            }
            else{
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
            }

            $sql = $this->db_connection->prepare($delete);
            $sql->execute();

            if($sql)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }



}

?>