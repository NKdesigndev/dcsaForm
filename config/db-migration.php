<?php error_reporting( E_ALL ); ?>

<?php
require_once    (__dir__ . '/db-connection.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create migration table if it doesn't exist
$mysqli->query("
    CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// // Get list of applied migrations
$appliedMigrations = [];
$result = $mysqli->query("SELECT name FROM migrations");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $appliedMigrations[] = $row['name'];
    }
    $result->free();
}

$folder = __DIR__ . '/../database/migrations/';

// Get all files and directories in the folder
$files = scandir($folder);

// Remove "." and ".." from the array
$files = array_diff($files, ['.', '..']);

// Extract filenames from file paths
$fileNames = [];
foreach ($files as $file) {
    $fileNames[] = basename($file);
}
// Define migration scripts
foreach ($fileNames as $key => $value) {
    $migrations[$value] = file_get_contents($folder . $value);
}

// echo "<pre>";
// var_dump($migrations); die;

// Run pending migrations
foreach ($migrations as $migrationName => $migrationSQL) {
    if (!in_array($migrationName, $appliedMigrations)) {
        if ($mysqli->begin_transaction()) {
            try {
                $mysqli->query($migrationSQL);
                $mysqli->query("INSERT INTO migrations (name) VALUES ('$migrationName')");
                $mysqli->commit();
                echo "Migration '$migrationName' applied successfully." . "<br>";
            } catch (Exception $e) {
                $mysqli->rollback();
                echo "Failed to apply migration '$migrationName': " . $e->getMessage() . "<br>";
                file_put_contents('error.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
                // die();
            }
        } else {
            echo "Failed to start transaction." . PHP_EOL;
        }
    }
}


// Close connection
$mysqli->close();
?>