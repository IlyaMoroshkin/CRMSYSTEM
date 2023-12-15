<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CRM AUTH</title>
    <link rel="stylesheet" href="style/auth.css">
</head>
<body>
    <img class="logo" src="img/logo_auth.svg" alt="logo">
    <form action="login.php" method="post">
        <div class="auth">
                <div class="input-group">
                    <label for="login">Логин</label>
                    <input type="text" id="login" name="login">
                </div>
                <div class="input-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password">
                </div>
        </div>
        <div class="authButtons">
            <button class="forgot-password-button" id="forgotPassword">Забыли пароль?</button>
            <button type="submit">Войти</button>
        </div>
    </form>
    <script src="scripts/ForgotPassword.js"></script>
</body>
</html>
