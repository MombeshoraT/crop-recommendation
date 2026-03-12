<?php
// recommend.php - Handles crop prediction and displays results

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['predict'])) {
    
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
    
    // Call Python script
    $json_input = json_encode($input_data);
    $python_script = __DIR__ . '/python/predict.py';
    $command = 'python ' . $python_script . ' ' . escapeshellarg($json_input) . ' 2>&1';
    
    $output = shell_exec($command);
    
    // Parse the output (take only the last line which should be JSON)
    $lines = explode("\n", trim($output));
    $last_line = end($lines);
    $result = json_decode($last_line, true);
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recommendation Results - CropRecommend AI</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo">
                    <i class="fas fa-seedling"></i>
                    <span>CropRecommend AI</span>
                </div>
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#recommendation">Recommendation</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>

        <!-- Results Section -->
        <section class="recommendation-section" style="padding-top: 8rem;">
            <h2>Your Crop Recommendation</h2>
            
            <div class="form-container">
                <?php if ($result && isset($result['primary_crop'])): ?>
                    <div class="result-card">
                        <div class="result-header">
                            <i class="fas fa-check-circle"></i>
                            <h3>Recommended Crop:</h3>
                            <div class="crop-name"><?php echo strtoupper($result['primary_crop']); ?></div>
                        </div>
                        
                        <div class="confidence-meter">
                            <h4>Confidence Level</h4>
                            <div class="confidence-bar">
                                <div class="confidence-fill" style="width: <?php echo $result['confidence'] * 100; ?>%"></div>
                            </div>
                            <p><?php echo round($result['confidence'] * 100, 2); ?>% confidence</p>
                        </div>
                        
                        <?php if (!empty($result['alternative_crops'])): ?>
                            <div class="alternatives">
                                <h4>Alternative Suggestions</h4>
                                <div class="alternative-tags">
                                    <?php foreach ($result['alternative_crops'] as $crop): ?>
                                        <span class="alternative-tag"><?php echo ucfirst($crop); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div style="margin-top: 2rem; text-align: left; background: #f0f0f0; padding: 1rem; border-radius: 5px;">
                            <h4>Input Parameters:</h4>
                            <ul style="list-style: none; padding: 0;">
                                <li><strong>Nitrogen (N):</strong> <?php echo $input_data['N']; ?> mg/kg</li>
                                <li><strong>Phosphorus (P):</strong> <?php echo $input_data['P']; ?> mg/kg</li>
                                <li><strong>Potassium (K):</strong> <?php echo $input_data['K']; ?> mg/kg</li>
                                <li><strong>Temperature:</strong> <?php echo $input_data['temperature']; ?>°C</li>
                                <li><strong>Humidity:</strong> <?php echo $input_data['humidity']; ?>%</li>
                                <li><strong>pH Level:</strong> <?php echo $input_data['ph']; ?></li>
                                <li><strong>Rainfall:</strong> <?php echo $input_data['rainfall']; ?> mm</li>
                            </ul>
                        </div>
                        
                        <div style="margin-top: 2rem; text-align: center;">
                            <a href="index.php#recommendation" class="cta-button" style="background: #2ecc71; color: white;">
                                <i class="fas fa-redo"></i> Try Again
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="error-message" style="text-align: center; color: #e74c3c;">
                        <i class="fas fa-exclamation-triangle" style="font-size: 3rem;"></i>
                        <h3>Oops! Something went wrong</h3>
                        <p>Unable to get recommendation. Please try again.</p>
                        <a href="index.php#recommendation" class="cta-button" style="background: #2ecc71; color: white; margin-top: 1rem;">
                            <i class="fas fa-redo"></i> Try Again
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h3><i class="fas fa-seedling"></i> CropRecommend AI</h3>
                    <p>Empowering farmers with AI-driven insights for better crop selection and improved yields.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#recommendation">Recommendation</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Connect</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 CropRecommend AI. Built with <i class="fas fa-heart"></i> for smart agriculture</p>
            </div>
        </footer>
    </body>
    </html>
    <?php
} else {
    // If someone tries to access directly, redirect to index
    header('Location: index.php');
    exit;
}
?>