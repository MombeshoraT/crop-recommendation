<?php
// recommend_debug.php - Debug version
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔍 Debug Mode - Crop Recommendation System</h1>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['predict'])) {
    
    echo "<h2>Step 1: Form Data Received</h2>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Collect and validate input
    $input_data = [
        'N' => floatval($_POST['N'] ?? 75),
        'P' => floatval($_POST['P'] ?? 45),
        'K' => floatval($_POST['K'] ?? 40),
        'temperature' => floatval($_POST['temperature'] ?? 25),
        'humidity' => floatval($_POST['humidity'] ?? 70),
        'ph' => floatval($_POST['ph'] ?? 6.5),
        'rainfall' => floatval($_POST['rainfall'] ?? 200)
    ];
    
    echo "<h2>Step 2: Processed Input Data</h2>";
    echo "<pre>";
    print_r($input_data);
    echo "</pre>";
    
    // Call Python script
    $json_input = json_encode($input_data);
    $python_script = __DIR__ . '/python/predict.py';
    
    echo "<h2>Step 3: Python Script Path</h2>";
    echo "Script path: " . $python_script . "<br>";
    echo "File exists? " . (file_exists($python_script) ? "✅ YES" : "❌ NO") . "<br>";
    
    // Check if model files exist
    $model_path = __DIR__ . '/models/crop_model.pkl';
    $scaler_path = __DIR__ . '/models/scaler.pkl';
    
    echo "<h2>Step 4: Model Files</h2>";
    echo "Model exists? " . (file_exists($model_path) ? "✅ YES" : "❌ NO") . "<br>";
    echo "Scaler exists? " . (file_exists($scaler_path) ? "✅ YES" : "❌ NO") . "<br>";
    
    // Try different Python commands
    echo "<h2>Step 5: Testing Python Commands</h2>";
    
    $commands = [
        'python',
        'python3',
        'C:\Users\MobY\AppData\Local\Programs\Python\Python314\python.exe',
        'py'
    ];
    
    foreach ($commands as $py_cmd) {
        $test_cmd = $py_cmd . ' --version 2>&1';
        $test_output = shell_exec($test_cmd);
        echo "Testing: $py_cmd<br>";
        echo "Result: " . ($test_output ? "✅ Working - " . trim($test_output) : "❌ Not working") . "<br>";
    }
    
    // Try to run the actual prediction
    echo "<h2>Step 6: Running Prediction</h2>";
    
    // Find working Python command (use the first one that worked)
    $working_python = 'python';
    foreach ($commands as $py_cmd) {
        $test_cmd = $py_cmd . ' --version 2>&1';
        if (shell_exec($test_cmd)) {
            $working_python = $py_cmd;
            break;
        }
    }
    
    echo "Using Python command: $working_python<br>";
    
    $command = $working_python . ' ' . $python_script . ' ' . escapeshellarg($json_input) . ' 2>&1';
    echo "Full command: $command<br><br>";
    
    echo "Executing...<br>";
    $output = shell_exec($command);
    
    echo "<h2>Step 7: Raw Output</h2>";
    echo "<pre style='background:#f0f0f0; padding:10px; border:1px solid #ccc;'>";
    echo htmlspecialchars($output ? $output : "NO OUTPUT");
    echo "</pre>";
    
    // Parse the output
    echo "<h2>Step 8: Parsed Result</h2>";
    if ($output) {
        $lines = explode("\n", trim($output));
        $last_line = end($lines);
        $result = json_decode($last_line, true);
        
        if ($result) {
            echo "✅ Successfully parsed JSON:<br>";
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        } else {
            echo "❌ Could not parse JSON. Last line was:<br>";
            echo "<strong>" . htmlspecialchars($last_line) . "</strong>";
        }
    }
    
} else {
    echo "<p style='color:red'>❌ No POST data received. Make sure you're submitting the form.</p>";
    echo '<p><a href="index.php">← Go back to form</a></p>';
}
?>