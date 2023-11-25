<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day/Night Mode Toggle</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Default background color */
            color: #333; /* Default text color */
            transition: background-color 0.3s, color 0.3s;
        }

        .toggle-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }

        .toggle-btn:hover {
            background-color: #0056b3;
        }

        .toggle-slider {
            width: 40px;
            height: 20px;
            background-color: #fff;
            border-radius: 50px;
            margin-left: 10px;
            position: relative;
            transition: transform 0.3s;
        }

        .toggle-slider:before {
            content: '';
            width: 18px;
            height: 18px;
            background-color: #007bff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translate(2px, -50%);
            transition: transform 0.3s;
        }

        body.night-mode {
            background-color: #333;
            color: #fff;
        }

        body.night-mode .toggle-slider {
            transform: translateX(20px);
        }

        body.night-mode .toggle-slider:before {
            transform: translate(20px, -50%);
        }
    </style>
</head>
<body>
    <button class="toggle-btn" onclick="toggleMode()">
        Day
        <div class="toggle-slider"></div>
        Night
    </button>

    <script>
        function toggleMode() {
            const body = document.body;
            body.classList.toggle('night-mode');
        }
    </script>
</body>
</html>
