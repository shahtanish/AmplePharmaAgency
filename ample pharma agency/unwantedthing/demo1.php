<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .form-step {
            display: none;
        }

        .step {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .step.active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h3>  PRODUCTS </h3>
</div>
<hr>

<div class="container col-md-4">
    <div class="step-indicator" id="stepIndicator">
        <div class="step active" onclick="goToStep(1)"><span style="margin-left:15px;">1</span></div>
        <div class="step" onclick="goToStep(2)"><span style="margin-left:15px;">2</span></div>
        <div class="step" onclick="goToStep(3)"><span style="margin-left:15px;">3</span></div>
    </div>
</div>

<div class="container c1" id="step1">
    <!-- Your step 1 content here -->
    <div class="card" id="card1" onclick="toggleSelection('card1')">
        <div class="card-body">
            <img src="image/images.jpeg" alt="Paracetamol 20mg">
            <br>
            <br>
            <h5>Paracetamol 20mg</h5>
        </div>
    </div>
    <!-- Add other cards as needed -->
</div>

<div class="container c1" id="step2" style="display: none;">
    <!-- Your step 2 content here -->
    <label for="name">Name:</label>
    <input type="text" id="name" placeholder="Your name">

    <label for="email">Email:</label>
    <input type="email" id="email" placeholder="Your email">

    <button onclick="goToStep(3)">Next</button>
</div>

<div class="button">
    <button class="btn btn-primary" onclick="nextStep(2)">Next</button>
</div>

<script src="js/script.js"></script>
<script>
    function nextStep(step) {
        // Hide all steps
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'none';

        // Show the next step based on the parameter
        if (step === 2) {
            document.getElementById('step2').style.display = 'block';
        }

        // Update the step indicator
        var stepIndicator = document.getElementById('stepIndicator').children;
        for (var i = 0; i < stepIndicator.length; i++) {
            stepIndicator[i].classList.remove('active');
        }
        stepIndicator[step - 1].classList.add('active');
    }

    function goToStep(step) {
        // Implement logic to navigate between steps
        // You can use a similar approach as in the nextStep function
    }
</script>

<!-- bootstrapjs -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
