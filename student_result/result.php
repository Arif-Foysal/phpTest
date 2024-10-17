<?php
// Function to calculate result
function calculateResult($marks) {
    $totalMarks = 0;
    $numSubjects = count($marks);
    
    // Mark Range Validation
    foreach ($marks as $subject => $mark) {
        if ($mark < 0 || $mark > 100) {
            echo "Mark range is invalid for $subject.<br>";
            return;
        }
    }

    // Check for fail condition
    foreach ($marks as $subject => $mark) {
        if ($mark < 33) {
            echo "Failed in $subject.<br>";
            return;
        }
    }

    // Calculate total and average marks
    $totalMarks = array_sum($marks);
    $averageMarks = $totalMarks / $numSubjects;

    // Determine grade using switch case
    $grade = '';
    switch (true) {
        case ($averageMarks >= 80 && $averageMarks <= 100):
            $grade = "A+";
            break;
        case ($averageMarks >= 70 && $averageMarks <= 79):
            $grade = "A";
            break;
        case ($averageMarks >= 60 && $averageMarks <= 69):
            $grade = "A-";
            break;
        case ($averageMarks >= 50 && $averageMarks <= 59):
            $grade = "B";
            break;
        case ($averageMarks >= 40 && $averageMarks <= 49):
            $grade = "C";
            break;
        case ($averageMarks >= 33 && $averageMarks <= 39):
            $grade = "D";
            break;
        default:
            $grade = "F";
    }

    // Output the result
    echo "Total Marks: $totalMarks\n";
    echo "Average Marks: " . number_format($averageMarks, 1) . "\n";
    echo "Grade: $grade \n";
}

// Example marks for five subjects
$marks = [
    'Math' => 55,
    'Science' => 70,
    'English' => 40,
    'History' => 45,
    'Geography' => 55 // Invalid mark (causes failure)
];

// Call the function to calculate the result
calculateResult($marks);
?>
