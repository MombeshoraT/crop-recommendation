<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CropRecommend AI - Smart Farming Assistant</title>
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="#recommendation">Recommendation</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="https://github.com/MombeshoraT/crop-recommendation" target="_blank"><i class="fab fa-github"></i></a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Smart Crop Recommendation System</h1>
            <p>Harness the power of AI to maximize your agricultural yield. Get personalized crop recommendations based on your soil and environmental conditions.</p>
            <a href="#recommendation" class="cta-button">Get Started <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2>Why Choose Our System?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-microchip"></i>
                <h3>AI-Powered</h3>
                <p>Machine learning model trained on agricultural data for accurate predictions</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-tachometer-alt"></i>
                <h3>98% Accuracy</h3>
                <p>High precision recommendations using Random Forest algorithm</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-leaf"></i>
                <h3>Multiple Crops</h3>
                <p>Support for various crops including maize, rice, wheat, cotton, and sugarcane</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line"></i>
                <h3>Real-time Analysis</h3>
                <p>Instant recommendations based on your input parameters</p>
            </div>
        </div>
    </section>

    <!-- Recommendation Form Section -->
    <section id="recommendation" class="recommendation-section">
        <h2>Get Your Crop Recommendation</h2>
        <p class="section-subtitle">Enter your soil and environmental parameters below</p>
        
        <div class="form-container">
            <form id="cropForm" method="POST" action="recommend.php">
                <div class="form-row">
                    <div class="form-group">
                        <label for="N"><i class="fas fa-flask"></i> Nitrogen (N) <span class="unit">mg/kg</span></label>
                        <input type="number" step="0.1" name="N" id="N" required placeholder="e.g., 75" min="0" max="200">
                        <div class="range-indicator">Low <span></span> High</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="P"><i class="fas fa-flask"></i> Phosphorus (P) <span class="unit">mg/kg</span></label>
                        <input type="number" step="0.1" name="P" id="P" required placeholder="e.g., 45" min="0" max="200">
                    </div>
                    
                    <div class="form-group">
                        <label for="K"><i class="fas fa-flask"></i> Potassium (K) <span class="unit">mg/kg</span></label>
                        <input type="number" step="0.1" name="K" id="K" required placeholder="e.g., 40" min="0" max="200">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="temperature"><i class="fas fa-thermometer-half"></i> Temperature <span class="unit">°C</span></label>
                        <input type="number" step="0.1" name="temperature" id="temperature" required placeholder="e.g., 25" min="-10" max="50">
                    </div>
                    
                    <div class="form-group">
                        <label for="humidity"><i class="fas fa-tint"></i> Humidity <span class="unit">%</span></label>
                        <input type="number" step="0.1" name="humidity" id="humidity" required placeholder="e.g., 70" min="0" max="100">
                    </div>
                    
                    <div class="form-group">
                        <label for="ph"><i class="fas fa-vial"></i> pH Level</label>
                        <input type="number" step="0.1" name="ph" id="ph" required placeholder="e.g., 6.5" min="0" max="14">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="rainfall"><i class="fas fa-cloud-rain"></i> Rainfall <span class="unit">mm/year</span></label>
                        <input type="number" step="0.1" name="rainfall" id="rainfall" required placeholder="e.g., 200" min="0" max="5000">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="predict" class="predict-btn">
                        <i class="fas fa-magic"></i> Get Recommendation
                    </button>
                    <button type="reset" class="reset-btn">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Results Container -->
        <div id="results-container" style="display: none;">
            <!-- Results will be displayed here from recommend.php -->
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
                    <li><a href="#recommendation">Recommendation</a></li>
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

    <script src="script.js"></script>
</body>
</html>