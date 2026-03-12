<?php
echo "<h2>Simple Python Test</h2>";

// Test 1: Can PHP execute anything?
echo "<h3>Test 1: PHP System Info</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "shell_exec enabled? " . (function_exists('shell_exec') ? "✅ Yes" : "❌ No") . "<br>";

// Test 2: Can we run a simple command?
echo "<h3>Test 2: Running DIR command</h3>";
$dir_output = shell_exec('dir 2>&1');
echo "<pre>" . htmlspecialchars(substr($dir_output, 0, 500)) . "...</pre>";

// Test 3: Can we find Python?
echo "<h3>Test 3: Finding Python</h3>";
$python_paths = [
    'python',
    'python3',
    'C:\Users\MobY\AppData\Local\Programs\Python\Python314\python.exe',
    'C:\Python314\python.exe',
    'C:\Python38\python.exe'
];

foreach ($python_paths as $path) {
    $test = $path . ' --version 2>&1';
    $result = shell_exec($test);
    if ($result) {
        echo "✅ $path - " . trim($result) . "<br>";
    } else {
        echo "❌ $path - Not found<br>";
    }
}

// Test 4: Simple Python script
echo "<h3>Test 4: Running simple Python script</h3>";
$simple_py = 'print("{\"test\": \"Hello from Python\"}")';
$command = 'python -c ' . escapeshellarg($simple_py) . ' 2>&1';
$output = shell_exec($command);
echo "Command: $command<br>";
echo "Output: <pre>" . htmlspecialchars($output) . "</pre>";
?>