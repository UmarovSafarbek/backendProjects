<?php

$fiels = [
    "name" => [
        "field_name" => "Name",
        "required" => 1
    ],
    "email" => [
        "field_name" => "Email",
        "required" => 1
    ],
    "address" => [
        "field_name" => "Adress",
        "required" => 0
    ],
    "phone" => [
        "field_name" => "Phone",
        "required" =>  1,
    ],
    "comment" => [
        "field_name" => "Comment",
        "required" => 0,
    ],
    "agree" => [
        "field_name" => "Соглашение",
        "required" => 1,
        "mailable" => 0
    ],
    "check_num" => [
        "field_name" => "Capthar",
        "required" => 1,
        "mailable" => 0
    ],
];


$mail_seting = [
    "host" => "smtp.mailtrap.io",
    "smtp_auth" => true,
    "port" => 2525,
    "username" => "abfdf5e366b9c9",
    "password" => "1ba6c367b6a751",
    "smtp_secure" => null,
    "from_email" => "1a9322b615-045cb7@inbox.mailtrap.io",
    "from_name" => "From My site",
    "to_email" => "test@mail.ru"

];

