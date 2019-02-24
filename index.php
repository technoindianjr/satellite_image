<?php
    require('PHP_AES_Cipher.php');

    // Object of PHP_AES_Cipher class 
    $object = new PHP_AES_Cipher;

    // Static data which is provided and created for API
    $method = 'POST';
    $email = '16etcit007@technonjr.org';
    $user_role = 'student';
    $resource_id = 'MFTOSU2NLO5:200';
    $secret_key = 'FVFLN9HKR512TPRJQHWLD3SYX49IXQEOVYQCAYWYV9VE9TK';
    $access_token = 'ekc3MxvFLcQtPab4GMZxyTfu9Po0IrpGW5LC3AroMiT7k35opdvhhC6pCBmQE1fb7ddxd0';
    
    // $key is taken from the document file considered as public key 
    $key = 'a34ef52hfnj56j47;';
    
    // String for URL format
    $string = 'email_id='.$email.'&user_role='.$user_role.'&resource_id='.$resource_id;
    
    // Base URL of API
    $url = 'https://iclor.itrackglobal.com/user/content';

    // Method to get encrypted data ( Mentioned in Document ) 
    $iv = substr($secret_key,0,16);
    $encrypt = $object->encrypt($key,$iv,$string);
    $finaldata = rawurlencode($encrypt);

    // Data array to convert the data in  HTTPS POST format 
    $data = array('data' => $finaldata, 'access_token' => $access_token);

    // Curl methods to request the URL or API 
    $postfields =  $data;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    $result = curl_exec($ch);

    echo $result;
?>