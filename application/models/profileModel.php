<?php 

class profileModel extends database {

    public function addFruit($fruit){

        if($this->Query("INSERT INTO fruit(name, price, quality, userId) VALUES (?,?,?,?)", $fruit)){
            return true;
        }

    }

    public function getData($userId){

        if($this->Query("SELECT * FROM users WHERE id = ? ", [$userId])){

            $data = $this->fetchAll();
            return $data;

        }

    }

}


?>