<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Регистрация</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">





    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom styles for this template -->
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 430px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
    </style>
</head>
<body class="text-center">



<main class="form-signin w-100 m-auto">
    <div class="modal" id="exampleModalCenter" style="background-color: gray">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Успех</h5>
                </div>
                <div class="modal-body">
                    Пользователь был успешно создан
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#exampleModalCenter').hide()">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <form id="form">
        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="border border-danger" id="errorField" style="display: none">
            <p class="text-center">Ошибка по следующим причинам:</p>
                <ul class="text-start">
                </ul>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="firstName" placeholder="Ваша Фамилия">
            <label for="firstName">First Name</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="lastName" placeholder="Ваше Имя">
            <label for="lastName">Last Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Пароль">
            <label for="password">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="confirmPassword" placeholder="Повторите пароль">
            <label for="confirmPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" id="btn" type="submit">Sign in</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $('#form').submit(function() {
            // Get all the forms elements and their values in one step
            event.preventDefault();
            let data = {
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                password_confirmation: $('#confirmPassword').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : 'http://127.0.0.1:8000/submit',
                type : 'POST',
                data : data,
                dataType:'json',
                success : function() {
                    $('#exampleModalCenter').show()
                },
                error : function(request)
                {
                    let errors = eval("(" + request.responseText + ")")
                    let errorField = $('#errorField ul')

                    errorField.parent().show();
                    errorField.empty()
                    for (const [key, value] of Object.entries(errors.errors)) {
                        errorField.append(`<li>${value}</li>`)
                    }

                }
            });
        });
    </script>

</main>





</body></html>
