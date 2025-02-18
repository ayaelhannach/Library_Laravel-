<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Register</title>
</head>
<body>
    <div class="auth-container">
        <div class="auth-image">
            <img src="{{ asset('images/sign.png') }}" alt="Register Image">
        </div>
        <div class="auth-form">
            
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-group">
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>

                <button type="submit">Register</button>

                <a href="{{ route('login') }}" class="forgot-password">Already registered?</a>
            </form>
        </div>
    </div>
</body>
</html>