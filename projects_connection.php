<?php
include("connection.php");

try {
    // If the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $projectName =  htmlspecialchars($_POST['project_name']);
        $farmPresident =  htmlspecialchars($_POST['farm_president']);
        $status =  htmlspecialchars($_POST['current_status']);
        $category =  htmlspecialchars($_POST['category']);
        $barangay =  htmlspecialchars($_POST['barangay']);
        $land =  htmlspecialchars($_POST['land']);
        $cropType =  htmlspecialchars($_POST['crop_type']);
        $cropQuantity =  htmlspecialchars($_POST['crop_quantity']);
        $cropMetric =  htmlspecialchars($_POST['crop_metric']);
        $fertilizerType =  htmlspecialchars($_POST['fertilizer_type']);
        $fertilizerQuantity =  htmlspecialchars($_POST['fertilizer_quantity']);
        $fertilizerMetric =  htmlspecialchars($_POST['fertilizer_metric']);
        $equipment =  htmlspecialchars($_POST['equipment']);
        $startDate =  htmlspecialchars($_POST['date_start']);
        $endDate =  htmlspecialchars($_POST['date_end']);
        
        // Validate dates
        if (strtotime($startDate) > strtotime($endDate)) {
            die("Error: Start date must be before end date.");
        }

        // Insert project data
        $insert_data_projectstb = $pdo->prepare("INSERT INTO projects (project_name, farm_president, current_status, category, barangay, land, crop_type, crop_quantity, crop_metric, fertilizer_type, fertilizer_quantity, fertilizer_metric, equipment, date_start, date_end ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($insert_data_projectstb->execute([$projectName, $farmPresident, $status, $category, $barangay, $land, $cropType, $cropQuantity, $cropMetric, $fertilizerType, $fertilizerQuantity, $fertilizerMetric, $equipment, $startDate, $endDate])) {
            echo "Project submitted successfully!";
            // Optionally redirect or show success message here
        } else {
            echo "Error submitting project.";
        }
    }
} catch (PDOException $error) {
    echo "Error: " . htmlspecialchars($error->getMessage());
}

$pdo = null; // Close the database connection
?>
