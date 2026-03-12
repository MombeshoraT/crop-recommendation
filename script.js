// script.js - Interactive features for CropRecommend AI

document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add active class to nav links based on scroll position
    window.addEventListener('scroll', function() {
        let sections = document.querySelectorAll('section');
        let navLinks = document.querySelectorAll('.nav-menu a');
        
        sections.forEach(section => {
            let top = section.offsetTop - 100;
            let bottom = top + section.offsetHeight;
            let scroll = window.scrollY;
            
            if (scroll >= top && scroll < bottom) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').substring(1) === section.id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });

    // Form validation
    const cropForm = document.getElementById('cropForm');
    if (cropForm) {
        cropForm.addEventListener('submit', function(e) {
            let isValid = true;
            const inputs = this.querySelectorAll('input[required]');
            
            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.style.borderColor = '#e74c3c';
                    
                    // Add error message
                    let errorMsg = input.parentNode.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('small');
                        errorMsg.className = 'error-message';
                        errorMsg.style.color = '#e74c3c';
                        errorMsg.style.fontSize = '0.8rem';
                        errorMsg.style.marginTop = '0.25rem';
                        errorMsg.style.display = 'block';
                        errorMsg.textContent = 'This field is required';
                        input.parentNode.appendChild(errorMsg);
                    }
                } else {
                    input.style.borderColor = '#e0e0e0';
                    const errorMsg = input.parentNode.querySelector('.error-message');
                    if (errorMsg) {
                        errorMsg.remove();
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields');
            }
        });
    }

    // Input range indicators
    const rangeInputs = document.querySelectorAll('input[type="number"]');
    rangeInputs.forEach(input => {
        input.addEventListener('input', function() {
            const min = this.min ? parseFloat(this.min) : 0;
            const max = this.max ? parseFloat(this.max) : 100;
            const val = parseFloat(this.value) || 0;
            
            // Update range indicator if it exists
            const indicator = this.parentNode.querySelector('.range-indicator span');
            if (indicator) {
                const percent = ((val - min) / (max - min)) * 100;
                indicator.style.width = percent + '%';
                indicator.style.background = percent > 70 ? '#2ecc71' : (percent > 30 ? '#f39c12' : '#e74c3c');
            }
        });
    });

    // Animate feature cards on scroll
    const featureCards = document.querySelectorAll('.feature-card');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    featureCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });

    // Add loading spinner to form submission
    if (cropForm) {
        cropForm.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                submitBtn.disabled = true;
            }
        });
    }

    // Tooltips for input fields
    const inputs = document.querySelectorAll('.form-group input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentNode.classList.remove('focused');
        });
    });

    // Random example data button
    const exampleBtn = document.createElement('button');
    exampleBtn.type = 'button';
    exampleBtn.className = 'reset-btn';
    exampleBtn.innerHTML = '<i class="fas fa-dice"></i> Load Example';
    exampleBtn.style.marginLeft = '1rem';
    
    const formActions = document.querySelector('.form-actions');
    if (formActions) {
        formActions.appendChild(exampleBtn);
        
        exampleBtn.addEventListener('click', function() {
            // Load example data
            document.getElementById('N').value = '75';
            document.getElementById('P').value = '45';
            document.getElementById('K').value = '40';
            document.getElementById('temperature').value = '25';
            document.getElementById('humidity').value = '70';
            document.getElementById('ph').value = '6.5';
            document.getElementById('rainfall').value = '200';
            
            // Trigger input events to update indicators
            document.querySelectorAll('input').forEach(input => {
                input.dispatchEvent(new Event('input'));
            });
        });
    }
});