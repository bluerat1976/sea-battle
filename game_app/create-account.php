<?php
require_once 'lib.php';
$message = get_message($_GET);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account | Sea Battle Game</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <h1>Crate Account For Sea Battle Game</h1>
    <? if($message) {?>
        <p class="error"><?= $message ?></p>
    <? }?>
    <form action="/register-action.php" method="POST">
                <input name="username" type="text" placeholder="username">
                <input name="password" type="password" placeholder="password">
                <input name="password_confirm" type="password" placeholder="password confirmation">
                <button>REGISTER</button>
            </form>
</body>
</html>