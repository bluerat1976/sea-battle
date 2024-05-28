
<?php
require_once 'lib.php';

$map_data = load_map('map');
$map = $map_data['map'];
$letter = $map_data['letter'];
$num_index = $map_data['num_index'];

$map_state_data = load_map('map_state');
$map_state = $map_state_data['map'];

$coords = get_coords($_GET);
if ($coords) {
    $map_state = shoot($map_state, $coords);
    save_map($map_state, $letter, $num_index, 'map_state');
}
?>

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
        <table class="navbar">
            <tr>
                <td><h2>SEA BUTTLE</h2></td>
                <td><a href="/match.php">New Match</a></td>
            </tr>
        </table>



    </div>
</body>
</html>