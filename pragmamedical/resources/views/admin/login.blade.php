<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pragma Medical Admin Login</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/pages/admin-login.css">
</head>

<body>
    <div class="login__container">
        <div class="login__container-form">
            <form action="{{ route('admin.login.post') }}" method="POST" class="form__container" autocomplete="off">
                @csrf

                <div class="form__desc">
                    <p>Xoş gəldiniz!</p>
                    <span>Pragma Medical admin paneli</span>
                </div>

                <div class="form__input__container">
                    <p class="form__input__desc">Email:</p>
                    <input placeholder="e-mail" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form__input__container">
                    <p class="form__input__desc">Şifrə:</p>
                    <input placeholder="Password" type="password" name="password" required>
                </div>

                @if ($errors->any())
                    <div class="msg">
                        Şifrə və ya email yanlışdır.
                    </div>
                @endif

                <div class="form__input__button">
                    <button type="submit">Daxil olmaq</button>
                </div>
            </form>
        </div>

        <div class="login__logo">
            <a href="/az">
                <img src="/images/logo.png" alt="Pragma Medical">
            </a>
        </div>

        <div class="login__container-image">
            <img src="https://a-group.az/storage/uploaded_files/WZ0D/login.jpg" alt="">
        </div>
    </div>
</body>

</html>