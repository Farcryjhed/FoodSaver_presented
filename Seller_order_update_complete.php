<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Update</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/buyer_order_update.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</head>

<body>
  <div class="order-status" >

    <!-- Back Button -->
    <button class="back-btn" onclick="window.location.href='Seller_order_status_complete.php'">
      <i class="fas fa-arrow-left"></i> Back
    </button>

    <h1>Order Update</h1>
    <p class="order-id"><strong>Order ID:</strong> #12345</p>

    <!-- Delivery Steps -->
    <div class="tracking">
      <div class="step completed" id="step-0">
          <span class="status-dot"></span>
          <p class="status-label">Order Placed</p>
          <p class="status-time" id="time-0">Completed</p>
      </div>
      <div class="step completed" id="step-0">
          <span class="status-dot"></span>
          <p class="status-label">Shipped</p>
          <p class="status-time" id="time-0">Shipped Complete</p>
      </div>
      <div class="step completed" id="step-0">
          <span class="status-dot"></span>
          <p class="status-label">Delivery Received</p>
          <p class="status-time" id="time-0"></p>
      </div>
      <div class="step completed" id="step-0">
          <span class="status-dot"></span>
          <p class="status-label">Delivered Successfully</p>
          <p class="status-time" id="time-0"></p>
      </div>
  </div>

    <!-- Current Location -->
    <div class="current-location">
      <h2>Delivered Location</h2>
      <p>San Andreas</p>
    </div>

    <!-- Time Remaining -->
    <div class="time-remaining">
      <h2>Estimated Time Delivered</h2>
      <p id="remaining-time">30 minutes</p>
    </div>
  </div>

  <script src="js/Buyer_order_update.js"></script>
</body>
</html>
