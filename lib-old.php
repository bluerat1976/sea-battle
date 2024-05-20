<?

function render_map($map, $letter, $num_index) {

    // Проверка наличия данных в массивах $letter и $num_index
    if (!$letter || !$num_index) {
        return 'Error: missing letters and indexes';
    }


    $html_letters = '<div class="letters-box">';
        for($li = 0; $li <10; $li++) {
            $letters = $letter[$li];     
        $html_letters .= "<div class='letters'>$letters</div>";
   }
    $html_letters .= '</div>';

    $html = '<div class="map">';
  
        for($ni = 0; $ni <10; $ni++) {
            $numbers = $num_index[$ni]; 
        
            $html .= "<div class='numbers'>$numbers</div>";
        }

        for ($ri = 0; $ri < 10 ; $ri++) { 
            for ($ci = 0 ; $ci < 10; $ci++) {  
                
                    $attributes = $map[$ri][$ci] == 1 ? 'class="ship sq"' : 'class="sq"';
                    $attributes .= "href=\"/?shoot={$ri}x{$ci}\"";
            
                    $html .= "<a $attributes></a>";  
            }
        } 
        $html .= '</div>';
        return $html_letters .= $html;
}


function process_request($request) {

}

function shoot($map, $coords) {
    if($coords) {
        $map[$coords[0]][$coords[1]] = 1;
    }
    return $map;
}

function get_coords($request) {
    if (isset($request['shoot'])) {
        $coords = explode('x', $request['shoot']);
        return $coords;
    } 
    return false;
}

function save_map($map, $letter, $num_index) {
    $data = array(
        'map' => $map,
        'letter' => $letter,
        'num_index' => $num_index,
    );

   file_put_contents("./data/map.json", json_encode($data));
}

function load_map() {
    // Проверяем, существует ли файл с картой
    $map_file = "./data/map.json";
    if (file_exists($map_file)) {
        // Читаем содержимое файла
        $data = file_get_contents($map_file);
        // Разбираем JSON в ассоциативный массив
        return json_decode($data, true);
        
    };
        
};

// function load_map() {
//     return json_decode(file_get_contents("./data/map.json"), true);
// }