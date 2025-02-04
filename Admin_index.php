<?php
// Include the database connection file
require_once 'database/db_connection.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index_login.php");
    exit();
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Verify the database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

try {
    // Fetch user details (example query)
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $first_name = htmlspecialchars($user['first_name']); // Use data securely
    } else {
        // User not found
        session_destroy(); // Clear session
        header("Location: index_login.php"); // Redirect to login
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); // Display the error message for debugging
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FoodSaver - Rescue, Savor, and Share</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <!-- <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>FoodSaver</h1> -->
                    <img src="img/logo-fs.png" alt="FoodSaver Logo" class="logo">
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="Admin_index.php" class="nav-item nav-link active">Home</a>
                        <a href="Admin_analytics.php" class="nav-item nav-link">Analytics</a>
                    </div>
                    <div class="profile-container">
                        <i class="bi bi-person-circle profile-icon" onclick="window.location.href='Admin_profile.php'" style="cursor: pointer; font-size: 1.5rem;"></i>
                        <a href="Admin_profile.php" class="text-dark profile-link" style="font-size: 16px; text-decoration: none; margin-left: 10px;">
                            <?php echo htmlspecialchars($first_name); ?>
                        </a>
                        <!-- Display error message if it exists -->
                        <?php if (!empty($error)) { echo "<p>Error: $error</p>"; } ?>

                        <!-- Logout Icon -->
                        <i class="bi bi-box-arrow-right" 
                        onclick="window.location.href='logout.php'" 
                        style="cursor: pointer; font-size: 1.5rem; margin-left: 20px;">
                        </i>
                    </div>
                    
                </div>
            </nav>

            

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <!-- Left Column: Text and Search Bar -->
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 animated slideInLeft" style="color: #E95F5D;">Rescue, Savor, and Share</h1>
                            <p class="animated slideInLeft mb-4 pb-2" style="color: #E95F5D;">Cuts waste and will delight your plate!</p>
                            <h3>Welcome Admin! <?php echo $first_name; ?></h3>
                            <!-- Search Bar -->
                            <div class="d-flex">
                                <div class="form-outline flex-grow-1">
                                    <input id="search-input" type="search" class="form-control" placeholder="What's yours?">
                                </div>
                                <button id="search-button" type="button" class="btn btn-custom1 ms-2">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            
            
                            <!-- Buy Now Button -->
                            <!-- <a href="" class="btn btn-custom py-sm-3 px-sm-5 me-3 animated slideInLeft">Buy Now</a> -->
                        </div>
            
                        <!-- Right Column: Image -->
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="Hero Image">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Navbar & Hero End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>