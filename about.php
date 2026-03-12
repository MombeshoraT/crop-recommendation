<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - CropRecommend AI</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-seedling"></i>
                <span>CropRecommend AI</span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#recommendation">Recommendation</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <section style="padding: 8rem 2rem 4rem;">
        <div style="max-width: 800px; margin: 0 auto;">
            <h1 style="font-size: 2.5rem; margin-bottom: 2rem; color: #333;">About CropRecommend AI</h1>
            
            <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <h2 style="color: #2ecc71; margin-bottom: 1rem;">Our Mission</h2>
                <p style="margin-bottom: 1.5rem; line-height: 1.8;">
                    CropRecommend AI aims to empower farmers and agricultural enthusiasts with 
                    data-driven insights for optimal crop selection. By leveraging machine learning 
                    algorithms and agricultural data, we help maximize yield potential and promote 
                    sustainable farming practices.
                </p>

                <h2 style="color: #2ecc71; margin-bottom: 1rem;">How It Works</h2>
                <p style="margin-bottom: 1.5rem; line-height: 1.8;">
                    Our system uses a Random Forest machine learning model trained on comprehensive 
                    agricultural datasets. The model analyzes key parameters including soil nutrients 
                    (N, P, K), environmental conditions (temperature, humidity), and geographical 
                    factors (pH, rainfall) to provide accurate crop recommendations.
                </p>

                <h2 style="color: #2ecc71; margin-bottom: 1rem;">Technologies Used</h2>
                <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; line-height: 1.8;">
                    <li><strong>Frontend:</strong> HTML5, CSS3, JavaScript</li>
                    <li><strong>Backend:</strong> PHP</li>
                    <li><strong>Machine Learning:</strong> Python, Scikit-learn, Pandas, NumPy</li>
                    <li><strong>Model:</strong> Random Forest Classifier (98% accuracy)</li>
                    <li><strong>Database:</strong> Integrated dataset with multiple crop types</li>
                </ul>

                <h2 style="color: #2ecc71; margin-bottom: 1rem;">Supported Crops</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 1rem;">
                    <span style="background: #f0f0f0; padding: 0.5rem; text-align: center; border-radius: 5px;">Maize</span>
                    <span style="background: #f0f0f0; padding: 0.5rem; text-align: center; border-radius: 5px;">Rice</span>
                    <span style="background: #f0f0f0; padding: 0.5rem; text-align: center; border-radius: 5px;">Wheat</span>
                    <span style="background: #f0f0f0; padding: 0.5rem; text-align: center; border-radius: 5px;">Cotton</span>
                    <span style="background: #f0f0f0; padding: 0.5rem; text-align: center; border-radius: 5px;">Sugarcane</span>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fas fa-seedling"></i> CropRecommend AI</h3>
                <p>Empowering farmers with AI-driven insights for better crop selection.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#recommendation">Recommendation</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 CropRecommend AI</p>
        </div>
    </footer>
</body>
</html>