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

    // $userInsert = DB::getInstance()->insert('users', array(
    //     'username' => 'Dale',
    //     'password' => 'password',
    //     'salt' => 'salt'
    // ));

    // $userUpdate = DB::getInstance()->update('users', 1, array(
    //     'password' => 'newpassword'
    // ));


    // if(Session::exists('success')) {
    //     echo Session::flash('success');
    // }

    if(Session::exists('home')) {
        echo '<p>' . Session::flash('home') . '</p>';
    }
    
    //echo Session::get(Config::get('session/session_name'));

    $user = new User();
   // $anotherUser = new User(6);

   if($user->isLoggedIn()) {
       ?>
       <p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a></p>
       <ul>
          <li><a href="logout.php">Log out</a></li>
       </ul>
<?php
   } else {
       echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a> </p>';
   }



?> 
