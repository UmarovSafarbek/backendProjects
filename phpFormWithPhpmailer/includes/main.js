// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {

                    // My work
                    var loader = document.querySelector('.loader');
                    loader.style.display = 'block';
                    var ansDiv = document.querySelector("#respon")
                    //getting data forms
                    const inputs = document.forms[0].elements;
                    let i = 0;
                    let post = '';
                    while (i != inputs.length) {
                        post += inputs[i].getAttribute('name') + "=" + inputs[i].value + "&";
                        i++
                    }

                    const request = new XMLHttpRequest();

                    request.open("POST", "index.php");

                    request.onload = () => {
                        if (request.status == 200 && request.readyState == 4) {
                            loader.style.display = 'none';
                            var res = JSON.parse(request.response);

                            if (res.answer == "error") {
                                ansDiv.innerHTML = `<span style='color: red'>${res.error}</span>`;
                            } else if (res.answer = 'ok') {
                                ansDiv.innerHTML = res.error = "Thank you";
                                document.forms[0].classList.remove('was-validated')
                                i = 0;
                                while (i != inputs.length) {
                                    inputs[i].value = '';

                                    if (inputs[i].id == "agree") {
                                        inputs[i].checked = false;
                                        inputs[i].value = 'on';

                                    }
                                    i++;

                                }


                                document.querySelector("#num_check").innerHTML = res.capch;

                            }

                        } else {

                        }
                    }
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                    request.send(post)

                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


