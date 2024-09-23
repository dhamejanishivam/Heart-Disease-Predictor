<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    class Main {

        function execute() {
            // Retrieve all form data
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            

            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            

            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $chest_pain_type = $_POST['chest_pain'];
            $resting_blood_pressure = $_POST['blood_pressure'];
            $cholesterol = $_POST['cholesterol'];
            $fasting_blood_sugar = $_POST['fasting_blood_sugar'];
            $restecg = $_POST['resting_ecg'];
            $max_heart_rate = $_POST['max_heart_rate'];
            $exercise_induced_angina = $_POST['exercise_angina'];
            $oldpeak = $_POST['oldpeak'];
            $slope = $_POST['slope'];
            $num_major_vessels = $_POST['major_vessels'];
            $thal = $_POST['thal'];

            // Create a comma-separated string of symptoms
            $symptoms = "$age,$gender,$chest_pain_type,$resting_blood_pressure,$cholesterol,$fasting_blood_sugar,$restecg,$max_heart_rate,$exercise_induced_angina,$oldpeak,$slope,$num_major_vessels,$thal";
            
            echo "AAABB";
            echo $symptoms;
            echo "AAABB";

            chdir('C:/xampp/htdocs/project_main/model');
            $symptoms_escaped = escapeshellarg($symptoms);
            $command = "C:/Python312/python.exe C:/xampp/htdocs/project_main/model/main.py $symptoms_escaped";
            $output = shell_exec($command); 

            // Save data to the database
            $this->save_data($name, $phone, $email, $age, $gender, $chest_pain_type, $resting_blood_pressure, $cholesterol, $fasting_blood_sugar, $restecg, $max_heart_rate, $exercise_induced_angina, $oldpeak, $slope, $num_major_vessels, $thal, $output,$latitude,$longitude);

            // Code for sending the mail to the user
            $email_escaped = escapeshellarg($email);
            $newcommand = "C:/Python312/python.exe C:/xampp/htdocs/project_main/model/send_otp.py $email_escaped";
            shell_exec($newcommand);
        }

        function redirect() {
            header('Location: http://localhost:8080/project_main/results.php');
            exit; // Stop further script execution after redirect
        }

        function save_data($name, $phone, $email, $age, $gender, $chest_pain_type, $resting_blood_pressure, $cholesterol, $fasting_blood_sugar, $restecg, $max_heart_rate, $exercise_induced_angina, $oldpeak, $slope, $num_major_vessels, $thal, $prediction,$latitude,$longitude) {
            $conn = mysqli_connect("localhost", "root", "", "projectdb");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
            // Corrected SQL query with proper column names (no single quotes)
            $qry = "INSERT INTO userdata (name, mobilenumber, email, age, gender, chest_pain, blood_pressure, cholesterol, fasting_blood_sugar, resting_ecg, max_heart_rate, exercise_angina, oldpeak, slope, major_vessels, thal, prediction,latitude,longitude) 
            VALUES ('$name', '$phone', '$email', '$age', '$gender', '$chest_pain_type', '$resting_blood_pressure', '$cholesterol', '$fasting_blood_sugar', '$restecg', '$max_heart_rate', '$exercise_induced_angina', '$oldpeak', '$slope', '$num_major_vessels', '$thal', '$prediction','$latitude','$longitude')";
        
            if (mysqli_query($conn, $qry)) {
                echo '';
            } else {
                echo "Error: " . mysqli_error($conn); // This line now shows the exact SQL error if any
            }
        
            mysqli_close($conn);
        }
        
        
    }

    $obj = new Main();
    $obj->execute();
    $obj->redirect();
}
?>
