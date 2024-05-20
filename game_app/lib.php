<?php

const NO_SHOT = 0;
const SHOT = 1;
const NO_SHIP = 0;
const SHIP = 1;

function render_map($map, $letter, $num_index, $map_state) {
    if (!$letter || !$num_index) {
        return 'Ошибка: отсутствуют данные для букв или индексов';
    }

    $html_letters = '<div class="letters-box">';
    for ($li = 0; $li < 10; $li++) {
        $letters = $letter[$li] ?? '?';
        $html_letters .= "<div class='letters'>$letters</div>";
    }
    $html_letters .= '</div>';

    $html = '<div class="map">';
    for ($ni = 0; $ni < 10; $ni++) {
        $numbers = $num_index[$ni] ?? '?';
        $html .= "<div class='numbers'>$numbers</div>";
    }

    for ($ri = 0; $ri < 10; $ri++) {
        for ($ci = 0; $ci < 10; $ci++) {
            $attributes = 'class="sq"';
            if ($map_state[$ri][$ci] == SHOT && $map[$ri][$ci] == NO_SHIP) {
                $attributes = 'class="miss sq"';
            } elseif ($map_state[$ri][$ci] == SHOT && $map[$ri][$ci] == SHIP) {
                $attributes = 'class="hit sq"';
            }
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

function shoot($map_state, $coords) {
    if ($coords && isset($map_state[$coords[0]][$coords[1]])) {
        $map_state[$coords[0]][$coords[1]] = SHOT;
    }
    return $map_state;
}

function get_coords($request) {
    if (isset($request['shoot'])) {
        $coords = explode('x', $request['shoot']);
        return array_map('intval', $coords); // Преобразование координат в целые числа
    }
    return false;
}

function save_map($map, $letter, $num_index, $map_name) {
    $data = array(
        'map' => $map,
        'letter' => $letter,
        'num_index' => $num_index
    );
    file_put_contents("./data/{$map_name}.json", json_encode($data));
}

function load_map($map_name) {
    $map_file = "./data/{$map_name}.json";
    if (file_exists($map_file)) {
        $data = file_get_contents($map_file);
        $data = json_decode($data, true);
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
