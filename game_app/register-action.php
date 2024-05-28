<?
    require_once 'lib.php';
     // 1. Obtain data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    // 2.Password confirmation

    if($password != $password_confirm) {
          header("Location: /create-account.php?message=" . urlencode('passwords & confirmation do not match'));
    } else {
          // 3. Safe user data

         // HW1
          $existing_users = load_users();
          $existing_users[] = [
               "username" => $username,
               "password" => $password,
          ];

          save_users($existing_users);
    }

    

   
   // header("Location: /match.php ");