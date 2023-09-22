<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<main>
    <div class="login-container">
    <form action="login_process.php" method="post" id="login-form">
        <h2>Login</h2>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        
        <?php
            // Display error message if invalid username or password
            if (isset($_GET['error'])) {
                echo '<p class="error-message">' . $_GET['error'] . '</p>';
            }
        ?>
                
        <button type="submit">Login</button>
        
    </form>
    </div>
</main>

</body>
</html>