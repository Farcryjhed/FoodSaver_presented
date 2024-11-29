<?php
require_once 'database/db_connection.php';
session_start(); // Start the session here

// Initialize error variable
$error = ''; // Make sure $error is initialized

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate login credentials
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redirect based on role
            $role = $user['role_id'];
            if ($role === 1) { // Seller role ID
                header("Location: Seller_index.php");
                exit();
            } elseif ($role === 2) { // Buyer role ID
                header("Location: Buyer_index.php");
                exit();
            } elseif ($role === 3) { // Admin role ID
                header("Location: Admin_index.php");
                exit();
            } else {
                $error = "Invalid role."; // This should be handled appropriately
            }
        } else {
            $error = "Invalid password."; // Set error if password is incorrect
        }
    } else {
        $error = "No account found with this email."; // Set error if email does not exist
    }
}
?>


<!-- You can output the error message on the page as well -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodSaver - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 shadow-lg rounded-4 overflow-hidden" style="max-width: 900px;">

            <!-- Left Column with Image -->
            <div class="col-md-5 p-0 d-none d-md-block">
                <div class="h-100 bg-image" style="background-image: url('img/bcd.png'); background-size: cover; background-position: center;">
                </div>
            </div>

            <!-- Right Column with Form -->
            <div class="col-md-7 p-4 bg-white border-red border-3">
                <div class="text-center mb-4">
                    <img src="img/logo.png" alt="FoodSaver Logo" class="mb-3" style="width: 100px;">
                    <h2 class="fw-bold">Welcome Back!</h2>
                </div>

                <!-- Display Error Message -->
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger w-100 text-center">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="POST" action="index_login.php" class="d-flex flex-column align-items-center" style="width: 75%; margin: auto;">
                    <!-- Email Input -->
                    <div class="mb-3 w-100">
                        <input type="email"
                            class="form-control border-danger"
                            id="email" name="email"
                            placeholder="Email" required>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4 w-100 position-relative">
                            <input type="password"
                                class="form-control border-danger"
                                id="password" name="password"
                                placeholder="Password" required>
                            <span class="position-absolute" id="togglePassword" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                👁️
                            </span>
                        </div>

                        <script>
                            // Add toggle functionality
                            document.getElementById('togglePassword').addEventListener('click', function () {
                                const passwordInput = document.getElementById('password');
                                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordInput.setAttribute('type', type);
                                // Toggle the eye icon (optional: replace this with actual icon if needed)
                                this.textContent = type === 'password' ? '👁️' : '🙈';
                            });
                        </script>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mb-5 w-25 rounded-pill">Login</button>

                    <!-- Forgot Password Link -->
                    <div class="mb-4">
                        <a href="#" class="text-decoration-underline text-gray">Forgot password?</a>
                    </div>

                    <!-- Sign Up Link -->
                    <div class="text-center">
                        <span>Don't have an account?
                            <a href="index_signup.php" class="text-decoration-none fw-bold">Sign Up</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>