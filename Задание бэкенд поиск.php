<?php

function searchData($data, $search) {
    $result = [];
    
    foreach ($data as $key => $item) {
        $matched = false;
        
        foreach ($search as $field => $value) {
            if (isset($item[$field]) && $item[$field] == $value) {
                $matched = true;
                break;
            }
        }
        
        if ($matched) {
            $result[$key] = $item;
        }
    }
    
    return $result;
}

$data = [
    'product1' => ['price' => 100000, 'name' => 'Телефон'],
    'product2' => ['price' => 45000, 'name' => 'Ноутбук'],
    'product3' => ['price' => 10000, 'name' => 'Планшет'],
    'product4' => ['price' => 30000, 'name' => 'Телефон'],
    'product5' => ['price' => 1500, 'name' => 'Наушники'],
    'product6' => ['price' => 100000, 'name' => 'Монитор'],
    'product7' => ['price' => 3000, 'name' => 'Клавиатура']
];

echo "- ПОИСК ПО ЦЕНЕ -\n";
$search = ['price' => 100000];
$result = searchData($data, $search);
print_r($result);

echo "\n- ПОИСК ПО ИМЕНИ -\n";
$search = ['name' => 'Телефон'];
$result = searchData($data, $search);
print_r($result);

echo "\n- ПОИСК ПО ЦЕНЕ ИЛИ ИМЕНИ -\n";
$search = ['price' => 100000, 'name' => 'Телефон'];
$result = searchData($data, $search);
print_r($result);

?>
