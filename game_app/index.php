
<? //require_once 'input.php' ?>
<? 
    
    require_once 'lib.php';
//require_once 'map.php';
    $map_data = load_map();
    $map = $map_data['map'];
    $letter = $map_data['letter'];
    $num_index = $map_data['num_index'];
    //save_map($map);
    $coords = get_coords($_GET);
    $map = shoot($map, $coords);
    //header('Location: /');
    
?>

 <? //require_once 'template.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sea Battle Game</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <h1>Sea Battle Game</h1>
    <div class="container">
        <?= render_map($map, $letter, $num_index) ?>
    </div>
</body>
</html>
<?= save_map($map, $letter, $num_index); ?>