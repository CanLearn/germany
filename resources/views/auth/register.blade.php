
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
        <h2>Neues Konto registrieren</h2>
        <form  method="POST" action="{{ route('register') }}">
            @csrf

            <label for="username"> Ihr Name </label>
            <input name="name"  type="text" placeholder="Ihr Name" />
            <label for="username"> Benutzername </label>
            <input type="email" name="email" placeholder="Benutzername" />
            <label for="username"> Passwort </label>
            <input type="password"  name="password" placeholder="Passwort" />
            <label for="username"> Passwort wiederholen </label>
            <input type="password" placeholder="Passwort wiederholen" name="password_confirmation" required autocomplete="new-password" />
            <button type="submit">Registrieren</button>
        </form>
        <div style="font-size: 12px; color: #757575">OR</div>
        <a href="{{ route('login')  }}">Login</a>
    </div>
</div>
</body>
</html>
