<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@300;400;600&amp;display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('landing/assets/css/login.css')  }}" />
    <title>Login</title>
</head>
<body>
<div class="action-form">
    <div class="action-form_main">
        <h2>Melden Sie sich bei Ihrem Konto an</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email"> Benutzeremail </label>
            <input  type="email" name="email"  placeholder="Benutzeremail" />
            <label for="password"> Passwort </label>
            <input   name="password" type="password" placeholder="Passwort" />
            <button type="submit">Login</button>
        </form>
        <div style="font-size: 12px; color: #757575">OR</div>
        <a href="{{ route('register')  }}">Benutzerkonto erstellen</a>
    </div>
</div>
</body>
</html>
