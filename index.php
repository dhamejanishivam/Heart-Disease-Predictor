
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Disease Predictor</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="heart"></div>
    
    <section id="hero">
        <div class="hero-content">
            <h2>Welcome to the Heart Disease Predictor</h2>
            <p>Get a quick and accurate prediction of your heart disease risk with our easy-to-use tool.</p>
        </div>
    </section>
    
    <section id="form-section">
        <div class="container">
            <h2 id='formheading'>Enter Your Details</h2>
            <form action="home.php" method="post">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Enter your Name" required>
                </div>
                <div class="form-group">
                    <input type="text" id="number" name="phone" placeholder="Enter your 10-Digits Mobile Number" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                </div>
                <button type="submit" id='btn' class="main-button">Start Prediction</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Heart Disease Predictor. All rights reserved.</p>
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </footer>

    <script src="assets/js/index.js"></script>
</body>
</html>

