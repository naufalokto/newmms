<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <a href="/" class="chevron-back">
        <img src="/images/chevron.png" alt="Back" />
    </a>
    <div class="login-container">
        <div class="login-form-section">
            <h2>Login to Your Account</h2>
            <p>Enter your username and password to access your account.</p>
            <form class="login-form">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Type your username here" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Type your password here" required>
                </div>
                <button type="submit" class="login-btn">Log In</button>
            </form>
            <div class="login-link">
                Don't have an account? <a href="/register">Create one here</a>
            </div>
        </div>
        <div class="login-image-section">
            <!-- persiapan untuk gambar -->
        </div>
    </div>
</body>
</html> 