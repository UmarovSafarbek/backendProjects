<?php

session_start();
include __DIR__."/vendor/autoload.php";
include __DIR__ . "/includes/data.php";
include __DIR__ . "/includes/function.php";

if (!empty($_POST)) {
    $fiels = loadData($fiels);
    if ($erros = validate($fiels)) {
        $res = ["answer" => "error", "error"=> $erros];
    } else {
        
        if(!send_mail($fiels, $mail_seting)){
            $res = ["answer" => "error", "error"=> "Form could not be send"];
        } else {
            $res = ["answer" => "ok",  "capch" => set_num_for_bot() ];
        }

    }

   exit(json_encode($res));
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/main.css?1">
    <title>Registretion Form</title>
    <style>

    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <form method="POST" class="needs-validation" novalidate id="form">

                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input  type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please input  fill name.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please input fill email.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Адрес</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                        <div class="invalid-feedback">
                            Please input fill phone.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="comment" id="num_check"> <?php echo set_num_for_bot(); ?></label>
                        <input type="number" name="check_num" id="" required>
                        <div class="invalid-feedback">
                            Please solve tasks.
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input name="agree" type="checkbox" class="form-check-input" id="agree" required>
                        <label class="form-check-label" for="agree">Соглашаюсь с обработкой персональных данных</label>
                        <div class="invalid-feedback">
                            Please check this fill.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <div class="mt-3" id="answer">
                        <div id="respon"></div>
                        <div class="loader">
                            <img src="includes/great.svg" alt="">
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>

 <script src="includes/main.js?val=111"></script>
</body>

</html>