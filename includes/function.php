<?php

use PHPMailer\PHPMailer\PHPMailer;

function debug($data)
{
    echo "<pre>";
    print_r($data, false);
    echo "</pre>";
}




function loadData($data)
{
    foreach ($_POST as $key => $value) {
        if (array_key_exists($key, $data)) {
            $data[$key]["value"] = trim($value);
        }
    }

    return $data;
}

function validate($data)
{

    $errors = '';

    foreach ($data as $key => $val) {
        if ($data[$key]["required"] && empty($data[$key]["value"])) {
            $errors .= "<li>This fill required {$data[$key]['field_name']}</li>";
        }
    }
    if(!check_num_user($data['check_num']['value'])){
        $errors .= "<li>Are you stupid?</li>";
    } 
    return $errors;
}


function set_num_for_bot() {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    
    $_SESSION["resault"] =  $num1 + $num2;
    
    return "How much is {$num1} + {$num2}";
    
}

function check_num_user($userResult) {
    return $_SESSION["resault"] == $userResult;
}



function send_mail($fiels, $mail_setting) {
    $mailer = new PHPMailer(true);
    try{
    $mailer->SMTPDebug = 0;
    $mailer->isSMTP();
    $mailer->Host = $mail_setting['host'];
    $mailer->SMTPAuth = $mail_setting['smtp_auth'];
    $mailer->Username = $mail_setting["username"];
    $mailer->Password = $mail_setting['password'];
    $mailer->SMTPSecure = $mail_setting['smtp_secure'];
    $mailer->Port =  $mail_setting['port'];

    $mailer->setFrom($mail_setting['from_email'], $mail_setting['from_name']);
    $mailer->addAddress($mail_setting['to_email']);

    $mailer->isHTML(true);
    $mailer->CharSet = "UTF-8";
    $mailer->Subject = "Form site";

    $flag = true;
    $message = '';

    foreach($fiels as $key => $val) {
        if(isset($val['mailable']) && $val['mailable'] == 0){
            continue;
        } 
        $message .= "<li>" . $val['field_name'] . " === " . $val['value'] . "</li>";   
    }   

    $mailer->Body = "<ul>". $message ."</ul>";
    if(!$mailer->send()){
        return false;
    }

    return true;
    } catch (Exception $e) {
        return false;
    }

}