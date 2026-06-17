<?php

function saveBase64Image($base64String, $imageName) {
    $base64String = preg_replace('/^data:image\/\w+;base64,/', '', $base64String);
    $imageData = base64_decode($base64String);
    
    if ($imageData === false) {
        return false;
    }
    
    $folderPath = __DIR__ . '/image_folder';
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0777, true);
    }
    
    $filePath = $folderPath . '/' . $imageName . '.jpeg';
    
    if (file_put_contents($filePath, $imageData)) {
        return '/image_folder/' . $imageName . '.jpeg';
    }
    
    return false;
}

$jsonString = '{
    "call": {
        "product_name1": {
            "tradable": "true",
            "name": "main_window",
            "image_name": "sun",
            "image": {
                "link": "https://img.freepik.com/premium-photo/sun-with-sun-sky_421632-12290.jpg",
                "base64": "data:image/jpeg;base64,/9j/4AAQSkZJRg..."
            }
        },
        "product_name2": {
            "tradable": "false",
            "name": "another_window",
            "image_name": "sun",
            "image": {
                "link": "https://img.freepik.com/free-photo/fresh-yellow-daisy-single-flower-close-up-beauty-generated-by-ai_188544-15543.jpg",
                "base64": "data:image/jpeg;base64,/9j/4AAQSkZJRg..."
            }
        },
        "product_name3": {
            "tradable": "true",
            "name": "main_window",
            "image_name": "moon",
            "image": {
                "link": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Moon_farside_LRO_color_mosaic.png/300px-Moon_farside_LRO_color_mosaic.png",
                "base64": "data:image/jpeg;base64,/9j/4AAQSkZJRg..."
            }
        }
    }
}';

$data = json_decode($jsonString, true);

if ($data === null) {
    die("Ошибка: неверный формат JSON");
}

$results = [];

foreach ($data['call'] as $product_name => $product_data) {
    if (isset($product_data['tradable']) && $product_data['tradable'] === 'true') {
        if (!isset($product_data['image_name']) || 
            !isset($product_data['image']['link']) || 
            !isset($product_data['image']['base64'])) {
            continue;
        }
        
        $filePath = saveBase64Image($product_data['image']['base64'], $product_data['image_name']);
        
        if ($filePath) {
            $results[] = [
                'image_name' => $product_data['image_name'],
                'link' => $product_data['image']['link'],
                'file_path' => $filePath,
                'name' => $product_data['name'] ?? 'Без названия'
            ];
        }
    }
}

echo " Сохранено изображений: " . count($results) . " \n\n";
print_r($results);

?>
