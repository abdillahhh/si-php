<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Andika:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/bps.png') ?>">
    <title>Login</title>

    <style>
        body {
            font-family: 'Andika', sans-serif;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            background-color: #e3ecfa;
        }

        .containers {
            /* padding: 60px 0 60px 0; */
        }

        .login {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            justify-items: center;
        }

        .button {
            background-color: #3C4B64;
            padding: 10px;
            border: none;
            color: white;
        }

        .button:hover {
            background-color: #1A2B48;
            color: white;
        }

        .button:focus {
            background-color: #3C4B64;
            color: white;
        }

        .title {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .test {
            max-width: 1000px;
            overflow: hidden;
        }

        .test2 {
            background-color: #3C4B64;
            padding: 0;
        }

        .test2 img {
            opacity: 80%;
            border-radius: 0;
        }

        .test2 img:hover {
            opacity: 100%;
            transition: 0.5s;
        }

        .logo {
            position: absolute;
            width: 100px;
            top: 50%;
            right: 50%;
        }

        .password {
            position: relative;
        }

        .eye {
            position: absolute;
            top: 30%;
            right: 10px;
            cursor: pointer;
        }

        .eye:hover {
            color: gray;
        }

        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        .uneditable-input:focus {
            border-color: #3C4B64;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px #3C4B64;
            outline: 0 none;
        }
    </style>
</head>

<body class="position-relative">
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row login relative">
            <div class="col-md-10 card p-0 border-0 test">
                <div class="row containers">
                    <div class="col-md-6 p-5">
                        <div class="title mb-4">
                            <h4 class="mb-4 fw-bold fs-2">Login Apps</h4>
                        </div>
                        <div class="card-body">
                            <div id="liveAlertPlaceholder"></div>
                            <form action="<?= base_url('/login') ?>" method="post">
                                <div class="form-group">
                                    <label for="login" class="fw-semibold mb-2">Username</label>
                                    <input type="text" class="form-control shadow-none" name="username" placeholder="Username">
                                </div>


                                <div class="form-group mb-4">
                                    <label for="password" class="fw-semibold mt-3 mb-2">Password</label>
                                    <div class="password">
                                        <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="Password">
                                        <ion-icon name="eye" class="eye" id="togglePassword"></ion-icon>
                                    </div>
                                </div>

                                <button type="submit" id="liveAlertBtn" class="w-100 btn button mt-3 fw-semibold">Login</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 test2">
                        <img src="<?= base_url('images/1.png') ?>" class="card-img" style="object-fit: cover;" height="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.remove("");
        });

        // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function(e) {
        //     e.preventDefault();
        // });
    </script>
</body>

</html>