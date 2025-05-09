<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CropBot - Smart Agricultural Assistant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ccc12e;
            --secondary-color: #2c7d21;
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
            line-height: 1.6;
        }

       
        .navbar {
            position: fixed;
            width: 100%;
            padding: 1rem 5%;
            background: rgba(26, 26, 26, 0.9);
            backdrop-filter: blur(10px);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--text-primary);
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .auth-buttons button {
            margin-left: 1rem;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .login-btn {
            background: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            padding: 20px;
            text-align: center;
            color: white;
        }

        .signup-btn {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: rgb(0, 0, 0);
            padding: 20px;
            text-align: center;
            text-size-adjust: 100px;
        }

        
        .hero {
            padding: 120px 5% 60px;
            text-align: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .hero-content {
            max-width: 1200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .robot-image {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        
        .section {
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--primary-color);
        }

        .components-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .component-card {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
        }

        .component-card i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        
        .reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .review-card {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 15px;
            position: relative;
        }

        .review-card::before {
            content: "“";
            position: absolute;
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.3;
            top: -10px;
            left: 10px;
        }

       
        footer {
            padding: 3rem 5%;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .socials {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .socials a {
            color: var(--text-primary);
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .socials a:hover {
            color: var(--primary-color);
        }

        .unique-detail {
            margin: 3rem auto;
            max-width: 600px;
            text-align: center;
            position: relative;
        }

        .unique-detail::after {
            content: "";
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--primary-color);
        }



        .auth-buttons {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}


.login .btn {
    background-color: transparent;
    color: #ccc42e; 
    border-color: #ccb42e;
}

.login .btn:hover {
    background-color: rgba(204, 183, 46, 0.1);
    transform: translateY(-1px);
}


.sign-up .btn {
    background-color: #ccb22e; 
    color: white;
    box-shadow: 0 2px 4px rgba(203, 179, 46, 0.664);
}

.sign-up .btn:hover {
    background-color: #ae8c27; 
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(204, 178, 46, 0.3);
}


.btn:hover {
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(204, 172, 46, 0.3);
}

.signup-btn {
  background: linear-gradient(to right, #4CAF50, #FFEB3B); 
  color: #000000;
  border: none;
  border-radius: 50px;
  padding: 0.75rem 2rem;
  font-size: 1rem;
  font-family: 'Verdana', sans-serif;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(76, 175, 80, 0.3);
  transition: background 0.3s ease, transform 0.2s ease;
}

.signup-btn:hover {
  transform: scale(1.05);
  background: linear-gradient(to right, #66bb6a, #fff176); 
}


.login-btn {
  background: transparent;
  border: 2px solid #8bc34a;
  border-radius: 12px;
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
  font-family: 'Courier New', monospace;
  color: #8bc34a;
  backdrop-filter: blur(4px);
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.login-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 200%;
  height: 100%;
  background: linear-gradient(90deg, #aeea00, #46e156);
  opacity: 0.1;
  transition: all 0.4s ease;
  z-index: 0;
}

.login-btn:hover::before {
  left: 0;
}

.login-btn a {
  position: relative;
  z-index: 1;
  color: inherit;
  text-decoration: none;
  display: block;
}



    </style>
</head>
<body>
   
    <nav class="navbar">
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#features">Features</a>
            <a href="#reviews">Reviews</a>
        </div>
        <div class="auth-buttons">
            <div class="login">
                <a href="Signup.php" class="btn btn-fill label-medium">Sign Up</a>
            </div>
            <div class="sign-up">
                <a href="Login.php" class="btn btn-fill label-medium">Log in</a>
            </div>
        </div>
    </nav>
    <!--butoni sign up = Sign up
    butoni login = login
    login hap home me acc e perdoruesit dhe butonin roboti 
    butoni roboti hap info 
-->

    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>CropBot</h1>
                <p class="subtitle">E ardhmja e Bujqësisë së zgjuar</p>
                <p>Një robot autonom i krijuar për të monitoruar dhe optimizuar shëndetin e të korrave përmes analizës së tokës në kohë reale dhe njohurive të fuqizuara nga AI.</p>
                <div class="cta-buttons" style="margin-top: 2rem;">
                    <button class="signup-btn" style="margin-right: 1rem;">Get Started</button>
                    <button class="login-btn"><a href="facebook.com">Demo</a></button>
                </div>
            </div>
            <img src="img/blet.jpeg" alt="GreenBot" class="robot-image">
        </div>
    </section>

  
    <section id="features" class="section">
        <h2>Si funksionon?</h2>
        <div class="components-grid">
            <div class="component-card">
                <i class="fas fa-seedling"></i>
                <h3>Analiza e tokës</h3>
                <p>Monitorimi në kohë reale i lagështisë, niveleve të pH dhe përmbajtjes së lëndëve ushqyese</p>
            </div>
            <div class="component-card">
                <i class="fas fa-brain"></i>
                <h3>Përpunimi me AI</h3>
                <p>Algoritmet e mësimit të thellë ofrojnë njohuri të zbatueshme</p>
            </div>
            <div class="component-card">
                <i class="fas fa-solar-panel"></i>
                <h3>I pavarur</h3>
                <p>Funksionon pa nevojën e pranisë së një personi.</p>
            </div>
        </div>
    </section>

    <section id="reviews" class="section">
        <h2>Mendimet e përdoruesve</h2>
        <div class="reviews-grid">
            <div class="review-card">
                <p>"CropBot revolucionarizoi operacionet tona bujqësore. Rendimenti u rrit me 40% në sezonin e parë!"</p>
                <p class="author">- Sara H. - Pronare ferme</p>
            </div>
            <div class="review-card">
                <p>"Teknologjia bujqësore më e besueshme që kemi përdorur ndonjëherë. Rekomandimet e AI janë të drejtpërdrejta."</p>
                <p class="author">- Migel A. - Agronomist</p>
            </div>
        </div>
    </section>

   
    <div class="unique-detail">
        <i class="fas fa-leaf" style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
        <p>Ku punon bleta, rritet jeta!</p>
    </div>

    
    <footer>
        <div class="socials">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <p>&copy; CropBot - 2025</p>
    </footer>
</body>
</html>