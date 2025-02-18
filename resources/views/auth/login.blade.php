<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>
    <div class="auth-container">
        <div class="auth-image">
            <img src="{{ asset('images/sign.png') }}" alt="Login Image">
        </div>
        <div class="auth-form">
            
            <h2>Connexion</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>

                <button type="submit">Se connecter</button>

                <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié ?</a>
            </form>
        </div>
    </div>
</body>
</html>