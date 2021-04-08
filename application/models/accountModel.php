<?php

class accountModel extends database {


    public function checkEmail($email){

        if($this->Query("SELECT email FROM users WHERE email = ?", [$email])){

            if($this->rowCount() > 0 ){
                return false;
            } else {
                return true;
            }

        }

    }

    public function createAccount($data){

        if($this->Query("INSERT INTO users (name, email, phone, password, address, city, state, country, pincode) VALUES (?,?,?,?,?,?,?,?,?)", $data)){
            return true;
        }

    }

    public function userLogin($email, $phone){

        if($this->Query("SELECT * FROM users WHERE email = ? ", [$email])){
            
            if($this->rowCount() > 0 ){

                $row = $this->fetch();
                $dbPassword = $row->password;
                $userId = $row->id;
                if(password_verify($phone, $dbPassword)){

                    return ['status' => 'ok', 'data' => $userId];

                } else {
                    return ['status' => 'phoneNotMacthed'];
                }

            } else {
                return ['status' => 'emailNotFound'];
            }

        }


    }

}


?>