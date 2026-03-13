<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Moreblessing | Crop Guide</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #faf7f2;
        }
        .contact-container {
            max-width: 1000px;
            margin: 120px auto 60px;
            padding: 0 20px;
        }
        .contact-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .contact-header h1 {
            font-family: 'Merriweather', serif;
            font-size: 3rem;
            color: #4a3b2f;
            margin-bottom: 1rem;
        }
        .contact-header p {
            font-size: 1.2rem;
            color: #7b6b5c;
            max-width: 600px;
            margin: 0 auto;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 40px;
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #e8d9cc;
        }
        .contact-info {
            background: #f5efe8;
            padding: 40px;
        }
        .contact-info h2 {
            font-family: 'Merriweather', serif;
            color: #4a3b2f;
            margin-bottom: 30px;
            font-size: 2rem;
        }
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 30px;
        }
        .info-item i {
            font-size: 24px;
            color: #a07d5c;
            width: 30px;
            margin-top: 3px;
        }
        .info-item h3 {
            color: #4a3b2f;
            margin-bottom: 5px;
            font-size: 1.2rem;
        }
        .info-item p, .info-item a {
            color: #7b6b5c;
            text-decoration: none;
            line-height: 1.6;
            font-size: 1.1rem;
        }
        .info-item a:hover {
            color: #a07d5c;
            text-decoration: underline;
        }
        .social-contact {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e8d9cc;
        }
        .social-contact h3 {
            color: #4a3b2f;
            margin-bottom: 20px;
        }
        .social-links-contact {
            display: flex;
            gap: 20px;
        }
        .social-links-contact a {
            width: 50px;
            height: 50px;
            background: #e8d9cc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4a3b2f;
            font-size: 24px;
            transition: all 0.3s;
        }
        .social-links-contact a:hover {
            background: #a07d5c;
            color: white;
            transform: translateY(-3px);
        }
        .contact-form {
            padding: 40px;
        }
        .contact-form h2 {
            font-family: 'Merriweather', serif;
            color: #4a3b2f;
            margin-bottom: 30px;
            font-size: 2rem;
        }
        .form-group-contact {
            margin-bottom: 20px;
        }
        .form-group-contact label {
            display: block;
            margin-bottom: 8px;
            color: #4a3b2f;
            font-weight: 500;
        }
        .form-group-contact input,
        .form-group-contact textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e8d9cc;
            border-radius: 10px;
            font-size: 1rem;
            transition: border 0.3s;
            font-family: 'Inter', sans-serif;
        }
        .form-group-contact input:focus,
        .form-group-contact textarea:focus {
            outline: none;
            border-color: #a07d5c;
        }
        .submit-btn-contact {
            background: #a07d5c;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }
        .submit-btn-contact:hover {
            background: #4a3b2f;
            transform: translateY(-2px);
        }
        .personal-note {
            margin-top: 40px;
            padding: 20px;
            background: #f9f3e9;
            border-radius: 15px;
            font-family: 'Merriweather', serif;
            font-style: italic;
            color: #5e4b3c;
            border-left: 4px solid #d4a373;
        }
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
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
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#recommendation">Recommendation</a></li>
                <li><a href="about.php">My Story</a></li>
                <li><a href="contact.php" class="active">Contact Me</a></li>
                <li><a href="https://github.com/MombeshoraT/crop-recommendation" target="_blank"><i class="fab fa-github"></i></a></li>
            </ul>
        </div>
    </nav>

    <div class="contact-container">
        <div class="contact-header">
            <h1>Let's connect</h1>
            <p>I'd love to hear from you — whether you have feedback, questions, or just want to say hello.</p>
        </div>

        <div class="contact-grid">
            <!-- Contact Information -->
            <div class="contact-info">
                <h2>Get in touch</h2>
                
                <div class="info-item">
                    <i class="fas fa-user"></i>
                    <div>
                        <h3>Moreblessing Mombeshora</h3>
                        <p>IT Graduate | Aspiring Software Developer</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Location</h3>
                        <p>Harare, Zimbabwe</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p><a href="mailto:mombeshoramoreblessing07@gmail.com">mombeshoramoreblessing07@gmail.com</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h3>Phone</h3>
                        <p><a href="tel:+263787879412">+263 787 879 412</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fab fa-github"></i>
                    <div>
                        <h3>GitHub</h3>
                        <p><a href="https://github.com/MombeshoraT" target="_blank">github.com/MombeshoraT</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-graduation-cap"></i>
                    <div>
                        <h3>Education</h3>
                        <p>BSc Information Technology<br>Chinhoyi University of Technology<br>Graduating August 2026</p>
                    </div>
                </div>

                <div class="social-contact">
                    <h3>Find me on social</h3>
                    <div class="social-links-contact">
                        <a href="https://github.com/MombeshoraT" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Send a message</h2>
                <form action="send_message.php" method="POST">
                    <div class="form-group-contact">
                        <label for="name">Your name</label>
                        <input type="text" id="name" name="name" required placeholder="e.g., Tatenda">
                    </div>

                    <div class="form-group-contact">
                        <label for="email">Your email</label>
                        <input type="email" id="email" name="email" required placeholder="you@example.com">
                    </div>

                    <div class="form-group-contact">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required placeholder="What's this about?">
                    </div>

                    <div class="form-group-contact">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Tell me what's on your mind..."></textarea>
                    </div>

                    <button type="submit" class="submit-btn-contact">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>

                <div class="personal-note">
                    <i class="fas fa-quote-left" style="color: #d4a373; margin-right: 10px;"></i>
                    I try to respond to everyone within a day or two. Looking forward to hearing from you!
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background: #4a3b2f; color: #f0e7db; margin-top: 60px;">
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fas fa-seedling" style="color: #d4a373;"></i> Moreblessing's Crop Guide</h3>
                <p>Built with ❤️ in Zimbabwe. Helping farmers make better decisions, one field at a time.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php" style="color: #f0e7db;">Home</a></li>
                    <li><a href="index.php#recommendation" style="color: #f0e7db;">Recommendation</a></li>
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
</body>
</html>