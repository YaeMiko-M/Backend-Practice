<?php

function validateRegistrationData($data) {
    if (empty($data['email'])) {
        return ['status' => false, 'message' => 'Email обязателен для заполнения'];
    }
    if (strpos($data['email'], '@') === false) {
        return ['status' => false, 'message' => 'Email должен содержать символ "@"'];
    }
    if (strlen($data['email']) <= 5) {
        return ['status' => false, 'message' => 'Email должен быть длиннее 5 символов'];
    }
    
    if (empty($data['name'])) {
        return ['status' => false, 'message' => 'Имя обязательно для заполнения'];
    }
    if (!preg_match('/^[a-zA-Zа-яА-Я\s\-]+$/u', $data['name'])) {
        return ['status' => false, 'message' => 'Имя может содержать только буквы'];
    }
    
    if (empty($data['password'])) {
        return ['status' => false, 'message' => 'Пароль обязателен для заполнения'];
    }
    if (strlen($data['password']) <= 8) {
        return ['status' => false, 'message' => 'Пароль должен быть длиннее 8 символов'];
    }
    if (!preg_match('/[a-zA-Z]/', $data['password']) || !preg_match('/[0-9]/', $data['password'])) {
        return ['status' => false, 'message' => 'Пароль должен содержать буквы и цифры'];
    }
    
    if (empty($data['repit_password'])) {
        return ['status' => false, 'message' => 'Повтор пароля обязателен для заполнения'];
    }
    if ($data['password'] !== $data['repit_password']) {
        return ['status' => false, 'message' => 'Пароли не совпадают'];
    }
    
    if (!empty($data['phone_number'])) {
        if (strlen((string)$data['phone_number']) <= 5) {
            return ['status' => false, 'message' => 'Номер телефона должен быть длиннее 5 символов'];
        }
    }
    
    if (!empty($data['came_from'])) {
        $allowedSources = ['site', 'city', 'tv', 'others'];
        if (!in_array($data['came_from'], $allowedSources)) {
            return ['status' => false, 'message' => 'Выберите один из вариантов: сайт, город, телевидение, другое'];
        }
    }
    
    if (empty($data['date_birth'])) {
    return ['status' => false, 'message' => 'Дата рождения обязательна для заполнения (формат ГГГГ-ММ-ДД или ГГГГ/ММ/ДД)'];
    }
    
    $birthDate = DateTime::createFromFormat('Y-m-d', $data['date_birth']);
    if (!$birthDate) {
    $birthDate = DateTime::createFromFormat('Y/m/d', $data['date_birth']);
    }
    if (!$birthDate) {
    return ['status' => false, 'message' => 'Неверный формат даты. Используйте ГГГГ-ММ-ДД или ГГГГ/ММ/ДД'];
    }
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    
    if ($age <= 15) {
        return ['status' => false, 'message' => 'Возраст должен быть больше 15 лет'];
    }
    if ($age >= 67) {
        return ['status' => false, 'message' => 'Возраст должен быть меньше 67 лет'];
    }
    
    return ['status' => true, 'message' => 'Регистрация успешно завершена'];
}

$data = [
    'email' => 'maria.jadekmm903@mail.com',
    'password' => 'password123',
    'repit_password' => 'password123',
    'phone_number' => 79113684590,
    'name' => 'Мария',
    'came_from' => 'site',
    'date_birth' => '2007-05-08'
];

$result = validateRegistrationData($data);

echo " ВАРИАНТ 1: var_export (показывает структуру)\n";
var_export($result);

echo "\n ВАРИАНТ 2: Красивый вывод (для пользователя)\n";
if ($result['status']) {
    echo "✅ " . $result['message'];
} else {
    echo "❌ " . $result['message'];
}

?>
