<?php

session_start();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'login':

            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $authController = new AuthController();
            $authController->login($email, $password);

            break;
    }
}
class AuthController{

    public function login($email, $password){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'email' => $email,
            'password' => $password),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if($response->code > 0){
            $_SESSION['user_id']= $response->data->id;
            $_SESSION['name']= $response->data->name;
            $_SESSION['lastname']= $response->data->lastname;
            $_SESSION['avatar']= $response->data->avatar;
            $_SESSION['email']= $response->data->email;
            $_SESSION['phone_number']= $response->data->phone_number;
            $_SESSION['role']= $response->data->role;
            $_SESSION['token']= $response->data->token;


            header("location:../home.php");
        }

    }
}

?>