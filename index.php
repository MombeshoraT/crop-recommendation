<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moreblessing's Crop Guide | Smart Farming Assistant</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Human-touch customizations */
        .personal-message {
            background: #f9f3e9;
            border-left: 4px solid #d4a373;
            padding: 1.5rem;
            border-radius: 0 10px 10px 0;
            margin: 2rem auto;
            max-width: 800px;
            font-family: 'Merriweather', serif;
            font-style: italic;
            color: #5e4b3c;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .personal-message i {
            color: #d4a373;
            margin-right: 10px;
        }
        .signature {
            font-family: 'Merriweather', serif;
            font-style: italic;
            font-weight: 300;
            color: #a07d5c;
        }
        .story-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #f0e7db;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-seedling" style="color: #d4a373;"></i>
                <span>Moreblessing's <span style="font-weight:300;">Crop Guide</span></span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="#recommendation">Recommendation</a></li>
                <li><a href="about.php">My Story</a></li>
                <li><a href="contact.php">Contact Me</a></li>
                <li><a href="https://github.com/MombeshoraT/crop-recommendation" target="_blank"><i class="fab fa-github"></i></a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section with Personal Touch -->
    <section class="hero" style="background: linear-gradient(135deg, #cb997e 0%, #a07d5c 100%);">
        <div class="hero-content">
            <h1 style="font-family: 'Merriweather', serif;">Hello, I'm Moreblessing 👋</h1>
            <p style="font-size: 1.3rem; max-width: 700px; margin: 0 auto 2rem;">
                I built this tool to help farmers like you make better decisions about what to plant. 
                It's not just code—it's something I care about deeply.
            </p>
            <a href="#recommendation" class="cta-button" style="background: white; color: #a07d5c; border: 2px solid white;">
                <i class="fas fa-arrow-right"></i> Let's find your crop
            </a>
        </div>
    </section>

    <!-- Personal Message -->
    <div class="personal-message">
        <i class="fas fa-quote-left"></i> 
        Growing up in Zimbabwe, I watched my family struggle with knowing what to plant each season. 
        Too much rain one year, too little the next. This tool is my way of using technology to solve 
        a very human problem. I hope it helps you.
        <div class="signature" style="margin-top: 1rem;">— Moreblessing Mombeshora</div>
    </div>

    <!-- Features Section - Made more personal -->
    <section class="features">
        <h2 style="font-family: 'Merriweather', serif;">Why I built this</h2>
        <div class="features-grid">
            <div class="feature-card" style="border-top: 3px solid #cb997e;">
                <i class="fas fa-heart" style="color: #cb997e;"></i>
                <h3>Built with care</h3>
                <p>Not just an algorithm—trained on real agricultural data from Zimbabwe and beyond.</p>
            </div>
            <div class="feature-card" style="border-top: 3px solid #a07d5c;">
                <i class="fas fa-users" style="color: #a07d5c;"></i>
                <h3>For small-scale farmers</h3>
                <p>Designed with the needs of family farms and smallholders in mind.</p>
            </div>
            <div class="feature-card" style="border-top: 3px solid #d4a373;">
                <i class="fas fa-leaf" style="color: #d4a373;"></i>
                <h3>Practical & simple</h3>
                <p>No complicated jargon—just clear, useful recommendations.</p>
            </div>
            <div class="feature-card" style="border-top: 3px solid #b5835a;">
                <i class="fas fa-laptop" style="color: #b5835a;"></i>
                <h3>Made by a local</h3>
                <p>Built by a Zimbabwean developer who understands local farming challenges.</p>
            </div>
        </div>
    </section>

    <!-- Recommendation Form Section -->
    <section id="recommendation" class="recommendation-section" style="background: #faf7f2;">
        <h2 style="font-family: 'Merriweather', serif;">Tell me about your soil</h2>
        <p class="section-subtitle">I'll do my best to recommend the right crop for you</p>
        
        <div class="form-container" style="background: white; border: 1px solid #e8d9cc;">
            <form id="cropForm" method="POST" action="recommend.php">
                <div class="form-row">
                    <div class="form-group">
                        <label for="N"><i class="fas fa-flask" style="color: #a07d5c;"></i> Nitrogen (N) <span class="unit">mg/kg</span></label>
                        <input type="number" step="0.1" name="N" id="N" required placeholder="e.g., 75" min="0" max="200" style="border-color: #e8d9cc;">
                    </div>
                    
                    <div class="form-group">
                        <label for="P"><i class="fas fa-flask" style="color: #a07d5c;"></i> Phosphorus (P) <span class="unit">mg/kg</span></label>
                        <input type="number" step="0.1" name="P" id="P" required placeholder="e.g., 45" min="0" max="200" style="border-color: #e8d9cc;">
                    </div>
                    
                    <div class="form-group">
                        <label for="K"><i class="fas fa-flask" style="color: #a07d5c;"></i> Potassium (K) <span class="unit">mg/kg</span></label>
                        <input type="number" step="0.1" name="K" id="K" required placeholder="e.g., 40" min="0" max="200" style="border-color: #e8d9cc;">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="temperature"><i class="fas fa-thermometer-half" style="color: #a07d5c;"></i> Temperature <span class="unit">°C</span></label>
                        <input type="number" step="0.1" name="temperature" id="temperature" required placeholder="e.g., 25" min="-10" max="50" style="border-color: #e8d9cc;">
                    </div>
                    
                    <div class="form-group">
                        <label for="humidity"><i class="fas fa-tint" style="color: #a07d5c;"></i> Humidity <span class="unit">%</span></label>
                        <input type="number" step="0.1" name="humidity" id="humidity" required placeholder="e.g., 70" min="0" max="100" style="border-color: #e8d9cc;">
                    </div>
                    
                    <div class="form-group">
                        <label for="ph"><i class="fas fa-vial" style="color: #a07d5c;"></i> pH Level</label>
                        <input type="number" step="0.1" name="ph" id="ph" required placeholder="e.g., 6.5" min="0" max="14" style="border-color: #e8d9cc;">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="rainfall"><i class="fas fa-cloud-rain" style="color: #a07d5c;"></i> Rainfall <span class="unit">mm/year</span></label>
                        <input type="number" step="0.1" name="rainfall" id="rainfall" required placeholder="e.g., 200" min="0" max="5000" style="border-color: #e8d9cc;">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="predict" class="predict-btn" style="background: #a07d5c; color: white; border: none; padding: 1rem 3rem;">
                        <i class="fas fa-seedling"></i> Get Recommendation
                    </button>
                    <button type="reset" class="reset-btn" style="border: 1px solid #e8d9cc; background: white; color: #a07d5c;">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer with Personal Touch -->
    <footer style="background: #4a3b2f; color: #f0e7db;">
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fas fa-seedling" style="color: #d4a373;"></i> Moreblessing's Crop Guide</h3>
                <p>Built with ❤️ in Zimbabwe. Helping farmers make better decisions, one field at a time.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php" style="color: #f0e7db;">Home</a></li>
                    <li><a href="#recommendation" style="color: #f0e7db;">Recommendation</a></li>
                    <li><a href="about.php" style="color: #f0e7db;">My Story</a></li>
                    <li><a href="contact.php" style="color: #f0e7db;">Contact Me</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect</h3>
                <div class="social-links">
                    <a href="https://github.com/MombeshoraT" style="color: #f0e7db;"><i class="fab fa-github"></i></a>
                    <a href="#" style="color: #f0e7db;"><i class="fab fa-linkedin"></i></a>
                    <a href="#" style="color: #f0e7db;"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="border-top-color: #5e4b3c;">
            <p>© 2026 Moreblessing Mombeshora — Here to help, not just to code.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>