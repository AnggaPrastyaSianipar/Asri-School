<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login/Register</h2>
            <div id="login-form">
                <form id="login" method="post" onsubmit="return processForm('login', event)">
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                    <p class="message">Not registered? <a href="#" onclick="switchForm('register', event)">Create an account</a></p>
                </form>
            </div>
            <div id="register-form" style="display: none;">
                <form id="register" method="post" onsubmit="return processForm('register', event)">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <select name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit">Register</button>
                    <p class="message">Already registered? <a href="#" onclick="switchForm('login', event)">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="css/script.js"></script>
</body>
</html>