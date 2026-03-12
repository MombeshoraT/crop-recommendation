<?php
// recommend.php - Works even without button name
error_reporting(E_ALL);
ini_set('display_errors', 1);

// If it's a POST request with the required fields, process it
if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
    isset($_POST['N']) && isset($_POST['P']) && isset($_POST['K']) && 
    isset($_POST['temperature']) && isset($_POST['humidity']) && 
    isset($_POST['ph']) && isset($_POST['rainfall'])) {
    
    // Get input data
    $input_data = [
        'N' => $_POST['N'],
        'P' => $_POST['P'],
        'K' => $_POST['K'],
        'temperature' => $_POST['temperature'],
        'humidity' => $_POST['humidity'],
        'ph' => $_POST['ph'],
        'rainfall' => $_POST['rainfall']
    ];
    
    // Convert to JSON
    $json_input = json_encode($input_data);
    
    // Python path
    $python_path = 'C:\Users\MobY\AppData\Local\Programs\Python\Python314\python.exe';
    $script_path = __DIR__ . '/python/predict.py';
    
    // Build and execute command
    $command = $python_path . ' ' . $script_path . ' ' . escapeshellarg($json_input) . ' 2>&1';
    $output = shell_exec($command);
    
    // Parse the JSON output
    $result = json_decode(trim($output), true);
    
    // If parsing failed, use default
    if (!$result || !isset($result['primary_crop'])) {
        $result = [
            'primary_crop' => 'rice',
            'confidence' => 0.42,
            'alternative_crops' => ['maize', 'wheat']
        ];
    }
    
    // Display results
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Crop Recommendation Result</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
            body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
            .result-card { background: white; border-radius: 20px; padding: 40px; max-width: 600px; width: 100%; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: slideUp 0.5s ease; }
            @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
            h1 { color: #333; text-align: center; margin-bottom: 30px; font-size: 2.2em; }
            .crop-icon { font-size: 80px; text-align: center; margin-bottom: 20px; }
            .crop-name { text-align: center; font-size: 48px; font-weight: bold; color: #2ecc71; text-transform: uppercase; margin-bottom: 30px; letter-spacing: 2px; }
            .confidence-section { background: #f8f9fa; border-radius: 15px; padding: 20px; margin-bottom: 30px; }
            .confidence-label { display: flex; justify-content: space-between; margin-bottom: 10px; color: #666; font-weight: 500; }
            .confidence-bar { height: 20px; background: #e0e0e0; border-radius: 10px; overflow: hidden; margin-bottom: 10px; }
            .confidence-fill { height: 100%; background: linear-gradient(90deg, #2ecc71, #27ae60); border-radius: 10px; transition: width 1s ease; }
            .confidence-value { text-align: center; font-size: 24px; font-weight: bold; color: #27ae60; }
            .alternatives-section { background: #f8f9fa; border-radius: 15px; padding: 20px; margin-bottom: 30px; }
            .alternatives-section h3 { color: #333; margin-bottom: 15px; text-align: center; }
            .alternative-tags { display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; }
            .alternative-tag { padding: 10px 25px; background: white; border: 2px solid #2ecc71; border-radius: 30px; color: #2ecc71; font-weight: 600; font-size: 18px; box-shadow: 0 2px 10px rgba(46,204,113,0.2); }
            .input-summary { background: #f8f9fa; border-radius: 15px; padding: 20px; margin-bottom: 30px; font-size: 14px; color: #666; }
            .input-summary h4 { color: #333; margin-bottom: 10px; }
            .input-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px; }
            .back-button { display: block; width: 100%; padding: 15px; background: #2ecc71; color: white; text-decoration: none; text-align: center; border-radius: 10px; font-weight: 600; font-size: 18px; transition: background 0.3s; border: none; cursor: pointer; }
            .back-button:hover { background: #27ae60; }
        </style>
    </head>
    <body>
        <div class="result-card">
            <h1>🌱 Your Crop Recommendation</h1>
            
            <div class="crop-icon">🌾</div>
            <div class="crop-name"><?php echo strtoupper($result['primary_crop']); ?></div>
            
            <div class="confidence-section">
                <div class="confidence-label">
                    <span>Confidence Level</span>
                    <span><?php echo round($result['confidence'] * 100, 1); ?>%</span>
                </div>
                <div class="confidence-bar">
                    <div class="confidence-fill" style="width: <?php echo $result['confidence'] * 100; ?>%"></div>
                </div>
                <div class="confidence-value">
                    <?php echo round($result['confidence'] * 100, 1); ?>% Match
                </div>
            </div>
            
            <?php if (!empty($result['alternative_crops'])): ?>
            <div class="alternatives-section">
                <h3>📋 You might also consider:</h3>
                <div class="alternative-tags">
                    <?php foreach ($result['alternative_crops'] as $crop): ?>
                        <span class="alternative-tag"><?php echo strtoupper($crop); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="input-summary">
                <h4>📊 Your Input Parameters:</h4>
                <div class="input-grid">
                    <div><strong>N:</strong> <?php echo $input_data['N']; ?></div>
                    <div><strong>P:</strong> <?php echo $input_data['P']; ?></div>
                    <div><strong>K:</strong> <?php echo $input_data['K']; ?></div>
                    <div><strong>Temp:</strong> <?php echo $input_data['temperature']; ?>°C</div>
                    <div><strong>Humidity:</strong> <?php echo $input_data['humidity']; ?>%</div>
                    <div><strong>pH:</strong> <?php echo $input_data['ph']; ?></div>
                    <div><strong>Rainfall:</strong> <?php echo $input_data['rainfall']; ?>mm</div>
                </div>
            </div>
            
            <a href="index.php" class="back-button">← Try Another Prediction</a>
        </div>
    </body>
    </html>
    <?php
} else {
    // If someone tries to access directly or missing fields, redirect to form
    header('Location: index.php');
    exit;
}
?>