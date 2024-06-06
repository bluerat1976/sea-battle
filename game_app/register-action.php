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

          if (strlen($username) <= 3) {
            header("Location: /create-account.php?message=" . urlencode('Username must be more than 3 characters'));
            exit();
        }
        
        // 4. Проверка длины пароля
        if (strlen($password) <= 3) {
            header("Location: /create-account.php?message=" . urlencode('Password must be more than 3 characters'));
            exit();
        }
          $existing_users = load_users();
          
          foreach ($existing_users as $user) {
            if($user['username'] === $username) {
                  header("Location: /create-account.php?message=" . urlencode('Such usernamealready exists. Input other username.'));
            exit();
            }
          }

          $existing_users[] = [
               "username" => $username,
               "password" => $password,
          ];

          save_users($existing_users);
    }

   
   // header("Location: /match.php ");