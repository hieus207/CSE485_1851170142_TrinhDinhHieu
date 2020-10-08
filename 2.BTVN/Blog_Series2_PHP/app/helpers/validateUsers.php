<?php

    function validateUser($user){
        $errors=array();
        if(empty($user['username'])){
            array_push($errors,'Username is required');
        }
        if(empty($user['email'])){
            array_push($errors,'Email is required');
        }
        if(empty($user['password'])){
            array_push($errors,'Password is required');
        }
        if($user['passwordConf'] != $user['password']){
            array_push($errors,'Password do not match');
        }
        $existingUser= selectOne('users',['email'=>$user['email']]);
        if(isset($existingUser)){
            array_push($errors,'Email already exists');
        }
        $existingUsername= selectOne('users',['username'=>$user['username']]);
        if(isset($existingUsername)){
            array_push($errors,'Username already exists');
        }
        return $errors;
    }

    function validateUserAd($user){
        $errors=array();
        if(empty($user['username'])){
            array_push($errors,'Username is required');
        }
        if(empty($user['email'])){
            array_push($errors,'Email is required');
        }
        if(empty($user['password'])){
            array_push($errors,'Password is required');
        }
        if($user['passwordConf'] != $user['password']){
            array_push($errors,'Password do not match');
        }
        return $errors;
    }


    function validateLogin($user){
        $errors=array();
        if(empty($user['username'])){
            array_push($errors,'Username is required');
        }
        
        if(empty($user['password'])){
            array_push($errors,'Password is required');
        }
       
        
        return $errors;
    }

?>