<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenBot - Authentication</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #dbb434;
            --background: #1a1a1a;
            --card-bg: rgba(255, 255, 255, 0.05);
            --text-primary: #ffffff;
            --text-secondary: #b3b3b3;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-container {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            margin: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header h1 {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 2.5rem 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        .auth-toggle {
            text-align: center;
            margin-top: 2rem;
        }

        .auth-toggle a {
            color: var(--primary-color);
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .auth-toggle a:hover {
            opacity: 0.8;
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: none;
        }

        @media (max-width: 480px) {
            .auth-container {
                padding: 2rem;
                margin: 1rem;
            }
        }

        .auth-buttons button {
            margin-left: 1rem;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: transform 0.3s;
        }
    </style>
</head>
<body>
 
 
 

    <div class="auth-container" id="signup-container">
        <div class="auth-header">
            <h1>Create Account</h1>
            <p>Join the GreenBot community</p>
        </div>
        
        <form id="signup-form">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <div class="input-wrapper">
                    <input type="text" class="form-input" placeholder="John Doe" required>
                    <i class="fas fa-user input-icon"></i>
                </div>
                <div class="error-message" id="name-error"></div>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <div class="input-wrapper">
                    <input type="email" class="form-input" placeholder="john@example.com" required>
                    <i class="fas fa-envelope input-icon"></i>
                </div>
                <div class="error-message" id="email-error"></div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-wrapper">
                    <input type="password" class="form-input" placeholder="••••••••" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
                <div class="error-message" id="password-error"></div>
            </div>

            <button type="submit" class="btn"><a href="main.html" >Sign Up</a></button>
        </form>

        <div class="auth-toggle">
            <p>Already have an account? <a href="info.html">Log in</a></p>
        </div>
    </div>

   
    <script>
        
        function showLogin() {
            document.getElementById('signup-container').style.display = 'none';
            document.getElementById('login-container').style.display = 'block';
        }

        function showSignup() {
            document.getElementById('login-container').style.display = 'none';
            document.getElementById('signup-container').style.display = 'block';
        }

        document.getElementById('signup-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = this.querySelector('input[type="password"]').value;
            const confirmPassword = this.querySelectorAll('input[type="password"]')[1]?.value;
            
            if (password !== confirmPassword) {
                showError('password-error', 'Passwords do not match');
                return;
            }
            
          
            localStorage.setItem('user', JSON.stringify({
                email: this.querySelector('input[type="email"]').value
            }));
            
            alert('Account created successfully!');
            window.location.href = 'dashboard.html';
        });

        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const user = JSON.parse(localStorage.getItem('user'));
            
            if (!user) {
                showError('login-email-error', 'No account found');
                return;
            }
            
         
            alert('Login successful!');
            window.location.href = 'dashboard.html';
        });

        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }

        
        if(window.location.search.includes('login')) {
            showLogin();
        }
    </script>
</body>
</html>