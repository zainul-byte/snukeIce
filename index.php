<?php

require_once 'SnukeIce.php';

// Initialize variables
$milkSolids = '';
$milkFat = '';
$error = '';
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate input
    if (isset($_POST["milkSolids"]) && isset($_POST["milkFat"])) {
        $milkSolids = intval($_POST["milkSolids"]);
        $milkFat = intval($_POST["milkFat"]);

        if ($milkSolids < 0 || $milkSolids > 100 || $milkFat < 0 || $milkFat > 100) {
            $error = "Input values must be integers between 0 and 100.";
        } else {
            // Create SnukeIce object
            $snukeIce = new SnukeIce($milkSolids, $milkFat);

            // Get category
            $result = $snukeIce->getCategory();

            switch ($result) {
                case 'Ice cream':
                    $output = 1;
                    break;
                case 'Ice milk':
                    $output = 2;
                    break;
                case 'Lacto ice':
                    $output = 3;
                    break;
                case 'Flavored ice':
                    $output = 4;
                    break;
                default:
                    $output = -1; // Invalid category
            }
        }
    } else {
        $error = "Both fields are required.";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Snuke Ice Category Finder</title>
    </head>

    <body>
        <h1>Snuke Ice Category Finder</h1>
        <hr>
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="milkSolids">Enter percentage of milk solids:</label>
                <input type="number" id="milkSolids" name="milkSolids" value="<?php echo $milkSolids; ?>" min="0" max="100" required>
                <br><br>
                <label for="milkFat">Enter percentage of milk fat:</label>
                <input type="number" id="milkFat" name="milkFat" value="<?php echo $milkFat; ?>" min="0" max="100" required>
                <br><br>
                <button type="submit">Calculate</button>
            </form>

            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!empty($output)) {
                        echo "<p>Integer output: $output</p>";
                    }
                    if (!empty($result)) {
                        echo "<p>Snuke Ice category: $result</p>";
                    }
                    if (!empty($error)) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                }
            ?>
        </div>
    </body>
</html>
