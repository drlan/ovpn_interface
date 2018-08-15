<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form action="php/login.php" method="post" class="login-form" name="login">
                    <input type="text" name="username" placeholder="username" required>
                    <input type="password" name="password" placeholder="password" required>
                    <button>login</button>
                </form>
            </div>
        </div>
    </body>
</html>