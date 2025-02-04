<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Order Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="css/profile.css">
  
    <style>
      body {
        background-color: #f8f9fa;
        font-family: 'Heebo', sans-serif;
        background-image: url("img/background.png");
      }
  
      /* Shared container styling */
      .container-box {
        max-width: 800px; /* Uniform width for all sections */
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
      }
  
      /* Title Section */
      .title-section input {
        width: 100%;
        background-color: white;
        border: 2px solid #E95F5D;
        border-radius: 8px;
        text-align: center;
        color: black;
        font-weight: bold;
      }
  
      /* Tabs Styling */
      .tabs {
        display: flex;
        justify-content: space-around;
        border-bottom: 2px solid #E95F5D;
        padding-bottom: 10px;
      }
  
      .tab {
        flex: 1;
        text-align: center;
        padding: 10px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        color: #555;
        border-radius: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
      }
  
      .tab.active {
        background-color: #FFEBEB;
        color: #E95F5D;
        border: 2px solid #E95F5D;
      }
  
      .tab:hover {
        background-color: #FDEEEE;
        color: #E95F5D;
      }
  
      /* Order Card */
      .order-card {
        border: 2px solid #E95F5D;
        border-radius: 10px;
        padding: 20px;
      }
  
      .estimated-arrival {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 15px;
      }
  
      .address-line {
        display: flex;
        justify-content: space-between;
        font-size: 1rem;
        font-weight: 500;
        color: #333;
        margin-bottom: 20px;
      }
  
      .product-details {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
      }
  
      .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #E95F5D;
      }
  
      .product-info {
        display: flex;
        flex-direction: column;
        gap: 5px;
      }
  
      .product-info p {
        margin: 0;
        font-size: 1rem;
      }
  
      .order-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
  
      .total-label {
        font-weight: 700;
        font-size: 1.2rem;
        color: #555;
      }
  
      .details-btn {
        background-color: #E95F5D;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
  
      .details-btn:hover {
        background-color: #d14e4e;
      }
    </style>
  </head>
<body>
  <!-- Back Button -->
  <div class="d-flex justify-content-between align-items-center mb-3" style="margin-left: 280px; margin-top: 50px;">
    <button class="back-btn" onclick="window.location.href='Seller_index.php'">
      <i class="fas fa-arrow-left"></i> Back
    </button>
  </div>

  <!-- Title Section -->
  <div class="container-box" style=" padding: 0;">
    <div style="border: 2px solid #E95F5D; border-radius: 7px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
      <input class="form-control" type="text" value="       Order Status" 
        aria-label="Disabled input example" disabled readonly 
        style="background-color: white; color: black; text-align: center; border: none;">
    </div>
  </div>


    <!-- Tabs Section -->
  <div class="container-box" style="background-color: #FFD09B;">
    <div class="tabs">
      <div class="tab" onclick="window.location.href='Seller_order_status.php'" style="color: black;">On Shipping</div>
      <div class="tab active" >Cancelled</div>
      <div class="tab" onclick="window.location.href='Seller_order_status_complete.php'" style="color: black;">Complete</div>
    </div>
  </div>


    <!-- Order Card -->
  <div class="container-box order-card">
    <div class="estimated-arrival">
      <strong>Cancel Order:</strong> 11/27/24, 7:30 AM
    </div>
    <div class="address-line">
      <span>Buyer: Cancel</span>
      <span>&rarr;</span>
      <h6 style="color: red;"><strong>Status:</strong> Cancelled</h6>
    </div>
    <div class="product-details">
      <img class="product-image" src="img/kinilaw.jpg" alt="Kinilaw">
      <div class="product-info">
        <p class="product-name"><strong>Kinilaw</strong></p>
        <p class="product-qty">Qty: 5</p>
        <p class="product-price">Php 35.00</p>
      </div>
    </div>
    <div class="order-footer">
      <span class="total-label">Total: Php 175.00</span>
      
    </div>
  </div>

  <div class="container-box order-card">
    <div class="estimated-arrival">
      <strong>Cancel Order:</strong> 11/27/24, 6:00 AM
    </div>
    <div class="address-line">
      <span>Seller: Product Removed</span>
      <span>&rarr;</span>
      <h6 style="color: red;"><strong>Status:</strong> Cancelled</h6>
    </div>
    <div class="product-details">
      <img class="product-image" src="img/pancit canton.jpg" alt="Kinilaw">
      <div class="product-info">
        <p class="product-name"><strong>Pancit Canton</strong></p>
        <p class="product-qty">Qty: 3</p>
        <p class="product-price">Php 8.00</p>
      </div>
    </div>
    <div class="order-footer">
      <span class="total-label">Total: Php 24.00</span>
      
    </div>
  </div>

  <div class="container-box order-card">
    <div class="estimated-arrival">
      <strong>Cancel Order:</strong> 11/26/24, 10:00 PM
    </div>
    <div class="address-line">
      <span>Seller: Product Removed</span>
      <span>&rarr;</span>
      <h6 style="color: red;"><strong>Status:</strong> Cancelled</h6>
    </div>
    <div class="product-details">
      <img class="product-image" src="img/corned beef.png" alt="Kinilaw">
      <div class="product-info">
        <p class="product-name"><strong>Corned Beef</strong></p>
        <p class="product-qty">Qty: 2</p>
        <p class="product-price">Php 20.00</p>
      </div>
    </div>
    <div class="order-footer">
      <span class="total-label">Total: Php 40.00</span>
      
    </div>
  </div>

  

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
