<?php
require('assets\other\fpdf.php'); // Include the FPDF library

// Read the content from the output file
$output_file = 'C:\xampp\htdocs\project_main\model\result.txt';
$output = "Error in predicting the disease. Please try again.";

if (file_exists($output_file)) {
    $output = file_get_contents($output_file); // Read the file content
} else {
    echo $output;
    exit;
}

$disease_percent = substr($output, 0, 4); // Extract percentage
$disease_likely = substr($output, 5); // Extract likelihood description

// Determine the paragraph text based on the percentage
if ((float)$disease_percent >= 75) {
    $recommendation = "The results indicate a high risk of heart disease. It is highly recommended to consult a healthcare provider immediately for further evaluation and possible medical intervention.";
} elseif ((float)$disease_percent >= 50) {
    $recommendation = "The results indicate a moderate risk of heart disease. We suggest consulting a healthcare provider to discuss preventive measures and potential lifestyle changes.";
} elseif ((float)$disease_percent >= 25) {
    $recommendation = "The results indicate a low to moderate risk of heart disease. A consultation with a healthcare provider is advisable to assess your risk and discuss preventive strategies.";
} else {
    $recommendation = "The results indicate a low risk of heart disease. However, it is always a good idea to maintain a healthy lifestyle and have regular check-ups with a healthcare provider.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Disease Prediction Results</title>
    <link rel="stylesheet" href="assets/css/result.css">
</head>
<body>

<div class="result-container">
    <h1 class="result-title">Heart Disease Prediction</h1>
    <p class="result-value"><?php echo htmlspecialchars($disease_percent); ?></p>

    <p class="description">
        Based on the data provided, <?php echo $recommendation; ?>
    </p>

    <!-- Retry or go back button -->
    <a href="index.php" class="retry-button">Try Again</a>

    <!-- Download Data button -->
    <a href="php/download.php" class="retry-button">Download Results File</a>
</div>

</body>
</html>
