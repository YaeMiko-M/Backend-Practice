<?php

$data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ]
    ]
];

// Преобразуем данные в плоский массив
$items = [];
foreach ($data['category'] as $key => $item) {
    $items[] = [
        'key' => $key,
        'priority' => (int)$item['priority'],
        'user_count' => $item['views']['user_count'],
        'bot_count' => $item['views']['bot_count']
    ];
}


$maxBot = max(array_column($items, 'bot_count'));
echo "Максимальный bot_count: $maxBot\n";

$minBot = min(array_column($items, 'bot_count'));
echo "Минимальный bot_count: $minBot\n";

usort($items, function($a, $b) {
    return $a['priority'] - $b['priority'];
});

echo "\nВсе значения user_count и bot_count (по возрастанию priority):\n";
foreach ($items as $item) {
    echo "priority: {$item['priority']}, user_count: {$item['user_count']}, bot_count: {$item['bot_count']}\n";
}

?>
