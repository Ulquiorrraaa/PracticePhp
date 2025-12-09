<?php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // Retrieve the single string from the form
    $car_name = $_POST['cars'] ?? ''; // Use a safer variable name and null coalescing

    // Check if the input is not empty before displaying
    if (!empty($car_name)) {
        echo "<h3>Submitted Car:</h3>";
        // Simply display the single car name
        echo htmlspecialchars($car_name);
    } else {
        echo "Please enter a car name.";
    }
}
// The rest of your form code follows...
?>

<form method="POST" action="">
    <label>Enter Car</label><br>
    <input type="text" name="cars">
    <br><br>
    <button type="submit">Submit Cars</button>

    <h2><?php echo htmlspecialchars($_POST['cars'] ?? ''); ?></h2>
</form>