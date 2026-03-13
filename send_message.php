<?php
// Simple form handler that sends an email (you'll need to configure this)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Anonymous';
    $email = $_POST['email'] ?? 'no-reply@example.com';
    $subject = $_POST['subject'] ?? 'No subject';
    $message = $_POST['message'] ?? '';
    
    // For now, just show a success message
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Message Sent</title>
        <link rel="stylesheet" href="style.css">
        <style>
            .success-container {
                max-width: 600px;
                margin: 100px auto;
                padding: 40px;
                background: white;
                border-radius: 20px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            }
            .success-icon {
                font-size: 80px;
                color: #2ecc71;
                margin-bottom: 20px;
            }
            h1 { color: #4a3b2f; margin-bottom: 20px; }
            p { color: #7b6b5c; margin-bottom: 30px; }
            .back-btn {
                display: inline-block;
                padding: 12px 30px;
                background: #a07d5c;
                color: white;
                text-decoration: none;
                border-radius: 50px;
                transition: background 0.3s;
            }
            .back-btn:hover { background: #4a3b2f; }
        </style>
    </head>
    <body style="background: #faf7f2;">
        <div class="success-container">
            <div class="success-icon">✉️</div>
            <h1>Thank you, <?php echo htmlspecialchars($name); ?>!</h1>
            <p>Your message has been sent. I'll get back to you soon.</p>
            <a href="index.php" class="back-btn">← Back to Home</a>
        </div>
    </body>
    </html>
    <?php
} else {
    header('Location: contact.php');
    exit;
}
?>