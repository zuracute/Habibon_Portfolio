<?php 
include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../admin/assets/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<div class="container">
    <div class="card">
        <a class="login">Admin Log in</a>

        <form method="post">
            <div class="inputBox">
                <input class="user" type="text" name="username" required="required">
                <span class="user">Username</span>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
            </div>

            <button type="submit" class="enter">Enter</button>
        </form>
    </div>
</div>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    try {
        $query = "SELECT * FROM admin WHERE username=:username AND password=:password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $_SESSION['login_success'] = true;
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Invalid username or password!'
                    });
                 </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error: ".$e->getMessage()."'
                });
             </script>";
    }

    $conn = null;

    if(isset($_SESSION['login_success']) && $_SESSION['login_success']) {
        unset($_SESSION['login_success']); 
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Login successful!',
                    showConfirmButton: false,
                    timer: 3000
                }).then(() => {
                    window.location.href = 'dashboard.php';
                });
             </script>";
    }
}
?>
</body>
</html>
