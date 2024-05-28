<?
    require_once 'lib.php';

    // Obtain from data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
 
    $users = load_users();
   
    $found = user_exist($users, $username, $password);
    

   if($found) {
        print("WELCOME!");
   } else {
        header("Location: /match.php ");
   }

