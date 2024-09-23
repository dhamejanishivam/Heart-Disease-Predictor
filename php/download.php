<?php
// Read the content from the output file
$output_file = 'C:/xampp/htdocs/project_main/model/result.txt';
$output = "Error in predicting the disease. Please try again.";



if (file_exists($output_file)) {
    $output = file_get_contents($output_file); // Read the file content
} else {
    echo $output;
    exit;
}

$disease_percent = substr($output, 0, 4);
$disease_likely = substr($output, 5);

// Prepare content for the text file
$text_content = "Heart Disease Prediction Results\n";
$text_content .= "--------------------------------\n";
$text_content .= "Prediction Percentage: $disease_percent\n";
$text_content .= "Likelihood of Heart Disease: $disease_likely\n";
$text_content .= "\nRecommendation: Consult a healthcare provider for further evaluation and to discuss preventive measures.\n";

// Set headers to force download of the text file
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="Heart_Disease_Prediction.txt"');

// Output the content for download
echo $text_content;
?>
