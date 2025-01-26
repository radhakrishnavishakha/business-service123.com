<?php
// index.php

// Basic PHP placeholder content
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Homepage - Worker Portal</title>
    <style>
        /* CSS Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: #4B0082; /* Purple */
            padding: 20px;
        }

        header {
            background-color: #4B0082; /* Purple */
            padding: 15px;
        }

        nav ul {
            list-style: none;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }

        .intro h1 {
            color: #4B0082; /* Purple */
        }

        button {
            background-color: #4B0082; /* Purple */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #6A0DAD; /* Lighter Purple */
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px;
            background-color: #4B0082; /* Purple */
            color: white;
        }

        .content {
            margin-top: 20px;
        }
    </style>
    <script>
        // JavaScript function for button interaction
        function displayAlert() {
            alert('Button clicked! Welcome to the Worker Portal.');
        }
    </script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='find_worker.php'>Find Worker</a></li>
                <li><a href='create_profile.php'>Create Profile</a></li>
                <li><a href='report.php'>Report</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class='intro'>
            <h1>Welcome to the Worker Portal</h1>
            <p>Your platform to find workers, create profiles, and report issues.</p>
        </section>

        <section class='content'>
            <button onclick='displayAlert()'>Click me!</button>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Worker Portal. All rights reserved.</p>
    </footer>
</body>
</html>";
?>
 