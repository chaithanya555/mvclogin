<?php

class accountController extends framework {


    public function __construct(){

        if($this->getSession('userId')){
            $this->redirect("profile");
        }
        $this->helper("link");
        $this->accountModel = $this->model('accountModel');
        
    }

    public function index(){

        $this->view("signup");
    }

    public function createAccount(){

        $userData = [

         'name'        => $this->input('name'),
         'email'           => $this->input('email'),
         'phone'        => $this->input('phone'),
         'address'           => $this->input('address'),
         'city'           => $this->input('city'),
         'state'           => $this->input('state'),
         'country'           => $this->input('country'),
         'pincode'           => $this->input('pincode'),
         'nameError'   => '',
         'emailError'      => '',
         'phoneError'   => '',
         'addressError'   => '' ,
         'cityError'   => '' ,
         'stateError'   => '' ,
         'countryError'   => '' ,
         'pincodeError'   => '' 

        ];

        if(empty($userData['name'])){

            $userData['nameError'] = 'Full Name is required';

        }

        if(empty($userData['email'])){
            $userData['emailError'] = 'Email is required';
        } else {
            if(!$this->accountModel->checkEmail($userData['email'])){

             $userData['emailError'] = "Sorry this email is already exist";

            }
        }

        if(empty($userData['phone'])){
            $userData['phonerError'] = "phone number is required";
        } else if(strlen($userData['phone']) < 5 ){
            $userData['phoneError'] = "Passowrd must be 10 digits";
        }

        if(empty($userData['nameError']) && empty($userData['emailError']) && empty($userData['phoneError'])){
            
            $password = password_hash($userData['phone'], PASSWORD_DEFAULT);
            $data = [$userData['name'], $userData['email'], $userData['phone'], $password, $userData['address'], $userData['city'], $userData['state'], $userData['country'], $userData['pincode']];
            if($this->accountModel->createAccount($data)){
                
                $this->setFlash("accountCreated", "Your account has been created successfully");
                $this->redirect("accountController/loginForm");

            }

        } else {
            $this->view('signup', $userData);
        }

    }

    public function loginForm(){
        $this->view("login");
    }

    public function userLogin(){

        $userData = [

         'email'         => $this->input('email'),
         'phone'      => $this->input('phone'),
         'emailError'    => '',
         'phoneError' => ''

        ];

        if(empty($userData['email'])){
            $userData['emailError'] = "Email is required";
        }

        if(empty($userData['phone'])){
            $userData['phoneError'] = "Phone Number is required";
        }

        if(empty($userData['emailError']) && empty($userData['phoneError'])){

            $result = $this->accountModel->userLogin($userData['email'], $userData['phone']);
            if($result['status'] === 'emailNotFound'){
                $userData['emailError'] = "Sorry invalid email";
                $this->view("login", $userData);
            } else if($result['status'] === 'phoneNotMacthed'){
                $userData['phoneError'] = "Sorry invalid phone number";
                $this->view("login", $userData);
            } else if($result['status'] === "ok"){
                $this->setSession("userId", $result['data']);
                $this->redirect("profile");
            }
;
        } else {
            $this->view("login", $userData);
        }

    }

}


?>