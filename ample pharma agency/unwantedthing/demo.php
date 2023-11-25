<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Order Successful</title>
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.container {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #4CAF50;
}

img {
    width: 80px;
    margin: 20px 0;
}

button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #45a049;
}

.img1{

    display:inline-flex;
    
}

.img1 img{
height:50px;
width:50px;
padding-top:5px;
}

</style>
<body>
    <div class="container">
<div class="img1">

        <h1>Order Successful</h1>
        </div>
<div class="img1">
        
        <img src="image/success.png" alt="Success Icon">
        </div>

        <p>Your order has been placed successfully.</p>
        <button onclick="redirectToHome()"> Download invoice </button>
    </div>
    <script>
        function redirectToHome() {
    // You can redirect to your home page or any other page after a successful order
    window.location.href = 'home.html';
}

    </script>
</body>
</html>
