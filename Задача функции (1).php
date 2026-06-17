<?php

function low_quantity($data) {
    return $data - ($data * 0.5);
}

function high_quantity($data) {
    return $data * 0.5;
}

function medium_quantity($data) {
    return 0;
}

function processData($data) {
    if ($data < 7) {
        $result = low_quantity($data);
    } elseif ($data > 40) {
        $result = high_quantity($data);
    } elseif ($data == 10) {
        $result = medium_quantity($data);
    } else {
        $result = $data;
    }
    
    return round($result);
}

function countUniqueResults($start, $end) {
    $results = [];
    
    for ($i = $start; $i <= $end; $i++) {
        $results[] = processData($i);
    }
    
    return count(array_unique($results));
}

echo "- РЕЗУЛЬТАТЫ ЗАДАЧИ -\n";
echo "Диапазон от 1 до 15: " . countUniqueResults(1, 15) . " уникальных результатов\n";
echo "Диапазон от 3 до 55: " . countUniqueResults(3, 55) . " уникальных результатов\n";
echo "Диапазон от 9 до 43: " . countUniqueResults(9, 43) . " уникальных результатов\n";

echo "\n- ДЕМОНСТРАЦИЯ РАБОТЫ processData() -\n";
$testValues = [5, 7, 10, 15, 30, 41, 50];
foreach ($testValues as $val) {
    echo "processData($val) = " . processData($val) . "\n";
}

?>
