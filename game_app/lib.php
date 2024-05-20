<?php

function render_map($map, $letter, $num_index) {
    // Проверка наличия данных в массивах $letter и $num_index
    if (!$letter || !$num_index) {
        return 'Ошибка: отсутствуют данные для букв или индексов';
    }

    $html_letters = '<div class="letters-box">';
    for($li = 0; $li < 10; $li++) {
        if (isset($letter[$li])) {
            $letters = $letter[$li];     
            $html_letters .= "<div class='letters'>$letters</div>";
        } else {
            $html_letters .= "<div class='letters'>?</div>";
        }
    }
    $html_letters .= '</div>';

    $html = '<div class="map">';
    for($ni = 0; $ni < 10; $ni++) {
        if (isset($num_index[$ni])) {
            $numbers = $num_index[$ni]; 
            $html .= "<div class='numbers'>$numbers</div>";
        } else {
            $html .= "<div class='numbers'>?</div>";
        }
    }

    for ($ri = 0; $ri < 10; $ri++) { 
        for ($ci = 0; $ci < 10; $ci++) {  
            $attributes = isset($map[$ri][$ci]) && $map[$ri][$ci] == 1 ? 'class="ship sq"' : 'class="sq"';
            $attributes .= " href=\"/?shoot={$ri}x{$ci}\"";
            $html .= "<a $attributes></a>";  
        }
    } 
    $html .= '</div>';
    return $html_letters . $html;
}

function process_request($request) {
    // Обработчик запросов, пока пустой
}

function shoot($map, $coords) {
    if ($coords && isset($map[$coords[0]][$coords[1]])) {
        $map[$coords[0]][$coords[1]] = 1;
    }
    return $map;
}

function get_coords($request) {
    if (isset($request['shoot'])) {
        $coords = explode('x', $request['shoot']);
        return array_map('intval', $coords); // Преобразование координат в целые числа
    } 
    return false;
}

function save_map($map, $letter, $num_index) {
    $data = array(
        'map' => $map,
        'letter' => $letter,
        'num_index' => $num_index
    );
    file_put_contents("./data/map.json", json_encode($data));
}

function load_map() {
    $map_file = "./data/map.json";
    if (file_exists($map_file)) {
        $data = file_get_contents($map_file);
        $data = json_decode($data, true);
        // Проверка данных после загрузки
        if (isset($data['map']) && isset($data['letter']) && isset($data['num_index'])) {
            return $data;
        }
    }
    return array(
        'map' => array_fill(0, 10, array_fill(0, 10, 0)),
        'letter' => range('A', 'J'),
        'num_index' => range(1, 10)
    );
}
