<?php
// Retrieve data sent from the index.php form
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Disease Predictor</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
    <div class="container">
        <h1>Heart Disease Predictor</h1>
        <form id="prediction-form" method="POST" action="php/predict.php">

            <!-- Hidden fields to pass user data -->
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">

            <!-- Hidden fields for latitude and longitude -->
            <input type="hidden" name="latitude" id="hidden-latitude">
            <input type="hidden" name="longitude" id="hidden-longitude">

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required min="1" max="120">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="chest_pain">Chest Pain Type:</label>
                <select id="chest_pain" name="chest_pain" required>
                    <option value="">Select Type</option>
                    <option value="0">Typical Angina (Related to heart)</option>
                    <option value="1">Atypical Angina (Not related to heart)</option>
                    <option value="2">Non-anginal Pain (Pain not associated with the heart)</option>
                    <option value="3">Asymptomatic (No chest pain) </option>
                </select>
            </div>

            <div class="form-group">
                <label for="blood_pressure">Resting BP (mmHg):</label>
                <input type="number" id="blood_pressure" name="blood_pressure" required min="50" max="250">
            </div>

            <div class="form-group">
                <label for="cholesterol">Cholesterol (mg/dL):</label>
                <input type="number" id="cholesterol" name="cholesterol" >
            </div>

            <div class="form-group">
                <label for="fasting_blood_sugar">Fasting Blood Sugar > 120 mg/dL:</label>
                <select id="fasting_blood_sugar" name="fasting_blood_sugar" required>
                    <option value="">Select</option>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <div class="form-group">
                <label for="resting_ecg">Resting ECG:</label>
                <select id="resting_ecg" name="resting_ecg" required>
                    <option value="">Select Result</option>
                    <option value="0">Normal</option>
                    <option value="1">ST-T Wave Abnormality</option>
                    <option value="2">Left Ventricular Hypertrophy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="max_heart_rate">Max Heart Rate Achieved:</label>
                <input type="number" id="max_heart_rate" name="max_heart_rate" required min="50" max="250">
            </div>

            <div class="form-group">
                <label for="exercise_angina">Exercise Induced Angina:</label>
                <select id="exercise_angina" name="exercise_angina" required>
                    <option value="">Select</option>
                    <option value="0">No chest pain during excercise</option>
                    <option value="1">Feeling chest pain during excercise</option>
                </select>
            </div>

            <div class="form-group">
                <label for="oldpeak">Oldpeak (ST Depression):</label>
                <input type="number" id="oldpeak" name="oldpeak" step="0.1" required>
            </div>

            <div class="form-group">
                <label for="slope">Slope of Peak Exercise ST Segment:</label>
                <select id="slope" name="slope" required>
                    <option value="">Select Slope</option>
                    <option value="0">Upsloping</option>
                    <option value="1">Flat</option>
                    <option value="2">Downsloping</option>
                </select>
            </div>

            <div class="form-group">
                <label for="major_vessels">Number of Major Vessels (0-4):(visible by x-ray after injecting a dye)</label>
                <input type="number" id="major_vessels" name="major_vessels" required min="0" max="4">
            </div>
            
            <div class="form-group">
                <label for="thal">Thalassemia: (Refers to a blood disorder called Thalassemia) </label>
                <select id="thal" name="thal" required>
                    <option value="">Select Thalassemia</option>
                    <option value="1">Normal</option>
                    <option value="2">Fixed Defect</option>
                    <option value="3">Reversible Defect</option>
                    <!-- MISSING -->
                </select>
            </div>
            
            <button type="submit">Predict Disease</button>
        </form>
    </div>
    <script src="assets/js/home.js"></script>
</body>
</html>
