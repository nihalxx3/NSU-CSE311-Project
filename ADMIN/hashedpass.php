<?php
$users = [
    ['email' => 'mohaimen.mamun@northsouth.edu', 'password' => 'Mamun@@123', 'type' => 'admin'],
    ['email' => 'nazmus.nihal@northsouth.edu', 'password' => 'Nihal@@123', 'type' => 'admin'],
    ['email' => 'nabil.hannan@northsouth.edu', 'password' => 'Nabil@@123', 'type' => 'admin'],
    ['email' => 'shahoriar.4001@gmail.com', 'password' => 'Pass4001', 'type' => 'user'],
    ['email' => 'minhajul.4002@gmail.com', 'password' => 'Pass4002', 'type' => 'user'],
    ['email' => 'rupak.4003@gmail.com', 'password' => 'Pass4003', 'type' => 'user'],
    ['email' => 'tasnia.4004@gmail.com', 'password' => 'Pass4004', 'type' => 'user'],
    ['email' => 'sakib.4005@gmail.com', 'password' => 'Pass4005', 'type' => 'user'],
    ['email' => 'doyita.4006@gmail.com', 'password' => 'Pass4006', 'type' => 'user'],
    ['email' => 'oyishe.4007@gmail.com', 'password' => 'Pass4007', 'type' => 'user'],
    ['email' => 'sukanta.4008@gmail.com', 'password' => 'Pass4008', 'type' => 'user'],
    ['email' => 'tasnia.4009@gmail.com', 'password' => 'Pass4009', 'type' => 'user'],
    ['email' => 'sakib.4010@gmail.com', 'password' => 'Pass4010', 'type' => 'user'],
    ['email' => 'maksudur.4011@gmail.com', 'password' => 'Pass4011', 'type' => 'user'],
    ['email' => 'mozammel.4012@gmail.com', 'password' => 'Pass4012', 'type' => 'user'],
    ['email' => 'nibrajul.4013@gmail.com', 'password' => 'Pass4013', 'type' => 'user'],
    ['email' => 'arbin.4014@gmail.com', 'password' => 'Pass4014', 'type' => 'user'],
    ['email' => 'jahid.4015@gmail.com', 'password' => 'Pass4015', 'type' => 'user'],
];

foreach ($users as $user) {
    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT); // Always store this securely
    $short_token = bin2hex(random_bytes(4)); // 8-character token for non-security use

    echo "Email: " . $user['email'] . "<br>";
    echo "Hashed Password: " . $hashed_password . "<br>";
    echo "Short Token: " . $short_token . "<br><br>"; // Use only for identification/display
}
?>
