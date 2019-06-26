<?php 
    require_once 'core/init.php';
   
    // $user = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('alex'));
    // $user = DB::getInstance()->get('users', array('username', '=', 'alex'));
    //$user = DB::getInstance()->query("SELECT * FROM users");

/*     if($user->error()) {
        echo 'No user';
    } else {
        echo 'OK!';
    }

    if(!$user->count()) {
        echo 'No user';
    } else {
        // foreach($user->results() as $user) {
        //     echo $user->username, '<br>';
        // }

        echo $user->first()->username;
    } */

    $userInsert = DB::getInstance()->insert('users', array(
        'username' => 'Dale',
        'password' => 'password',
        'salt' => 'salt'
    ));

    // $userUpdate = DB::getInstance()->update('users', 1, array(
    //     'password' => 'newpassword'
    // ));
?> 
