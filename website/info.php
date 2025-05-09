<!DOCTYPE html>
<html>
<head>
    <title>Arduino Data Display</title>
    <style>
        :root {
            --primary-color: #ccac2e;
            --secondary-color: #0e6610;
            --background: #1a1a1a;
            --card-bg: rgba(255, 255, 255, 0.05);
            --text-primary: #ffffff;
            --text-secondary: #b3b3b3;
        }
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
    
        body {
            background: var(--background);
            color: var(--text-primary);
            min-height: 100vh;
            padding: 2rem;
        }
    
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
        }
    
        .header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
    
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    
        .sensor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
    
        .sensor-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    
        .sensor-card:hover {
            transform: translateY(-5px);
        }
    
        .sensor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.1),
                transparent
            );
            transition: 0.5s;
        }
    
        .sensor-card:hover::before {
            left: 100%;
        }
    
        .sensor-value {
            font-size: 3rem;
            font-weight: 600;
            margin: 1rem 0;
            position: relative;
            display: inline-block;
        }
    
        .sensor-value::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
        }
    
        .sensor-unit {
            font-size: 1.2rem;
            color: var(--text-secondary);
            margin-left: 0.5rem;
        }
    
        .sensor-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            color: var(--text-secondary);
        }
    
        .sensor-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.8;
        }
    
        .last-updated {
            text-align: center;
            margin-top: 3rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
            animation: pulse 2s infinite;
        }
    
        @keyframes pulse {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }
    
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
    
            .sensor-value {
                font-size: 2.5rem;
            }
        }

        .auth-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    padding: 0.5rem;
}

.login .btn {
    background: linear-gradient(45deg, #FFD700 0%, #2ecc71 100%);
    color: #ffffff;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.login .btn:hover {
    background: linear-gradient(45deg, #2ecc71 0%, #FFD700 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

.login .btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        120deg,
        transparent,
        rgba(255, 255, 255, 0.3),
        transparent
    );
    transition: 0.5s;
}

.login .btn:hover::before {
    left: 100%;
}

/* Optional: Add a subtle border animation */
.login .btn::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 8px;
    padding: 2px;
    background: linear-gradient(45deg, #FFD700, #2ecc71);
    -webkit-mask: 
        linear-gradient(#fff 0 0) content-box, 
        linear-gradient(#fff 0 0);
    mask: 
        linear-gradient(#fff 0 0) content-box, 
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.login .btn:hover::after {
    opacity: 1;
}

.advice-list li {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  position: relative;
  padding-left: 25px;
}

.advice-list li::before {
  content: "✔";
  position: absolute;
  left: 0;
  color: #28a745;
}
    </style>
    
    <!-- Add this in your HTML head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <div class="auth-buttons">
        <div class="login">
            <a href="main.html" class="btn btn-fill label-medium">Home</a>
        </div>

    </div>
    <!-- Updated HTML structure -->
    <div class="dashboard">
        <div class="header">
            <h1>Paneli i të dhënave</h1>
            <p>Sistemi i monitorimit mjedisor në kohë reale</p>
        </div>
    
        <div class="sensor-grid">
            <div class="sensor-card">
                <i class="sensor-icon fas fa-thermometer-half"></i>
                <h2>Temperatura</h2>
                <div class="sensor-value">
                    <?= htmlspecialchars($data['temperature']) ?>
                    <span class="sensor-unit">°C</span>
                </div>
                <div class="sensor-meta">
                    <span>Parametrat optimal</span>
                    <span>18-25°C</span>
                </div>
            </div>
    
            <div class="sensor-card">
                <i class="sensor-icon fas fa-tint"></i>
                <h2>Lagështia</h2>
                <div class="sensor-value">
                    <?= htmlspecialchars($data['moisture']) ?>
                    <span class="sensor-unit">%</span>
                </div>
                <div class="sensor-meta">
                    <span>Parametrat optimal</span>
                    <span>40-70%</span>
                </div>
            </div>
        </div>
    
        <div class="last-updated">
            <i class="fas fa-sync"></i> Përditësimi i fundit: <?= htmlspecialchars($data['timestamp']) ?>
        </div>
    </div>
    

</head>
<body>
    <div class="sensor-container">
        <h1>Të dhënat nga sensorët</h1>
        <div> <br>
            <h2>Temperatura</h2>
            <div class="value" id="temperature"><?= htmlspecialchars($data['temperature']) ?> 27°C</div>
        </div> <br>
        <div>
            <h2>Lagështia</h2>
            <div class="value" id="moisture"><?= htmlspecialchars($data['moisture']) ?> 12%</div>
        </div><br>
        <div><h2>Toka është mjaft e thatë, veçanërisht në shtresën sipërfaqësore. </h2></div><br><br>
        <p>Këshillat: </p>
        <ul class="advice-list">
            <li>Shto ujë në mënyrë të kontrolluar (ujitje e thellë):
                Ujit pak nga pak por në thellësi, që uji të depërtojë në rrënjë. Kjo ndihmon tokën 
                të ruajë lagështinë dhe të mos thahet shpejt. Syno që lagështia të ngjitet në 20–30%, në 
                varësi të bimëve që po rriten.</li>
            <li>Shto kompost ose pleh organik:
                Kjo ndihmon në mbajtjen e ujit në tokë dhe përmirëson strukturën e saj. Komposti vepron si një "sfungjer" dhe rrit përmbajtjen e lëndëve ushqyese.
    </li>
            <li>Mulching (mbulimi me bar të thatë, kashtë, etj.):
                Mbulimi i sipërfaqes së tokës me materiale organike ndihmon në ruajtjen e lagështisë dhe uljen e temperaturës së sipërfaqes.
    </li>
            
          </ul>
    </div>

      <!-- Update the JavaScript to add smooth transitions -->
    <script>
        setInterval(() => {
            fetch('data.php')
                .then(response => response.json())
                .then(data => {
                    // Add animation class
                    document.querySelectorAll('.sensor-value').forEach(el => {
                        el.style.opacity = '0';
                        setTimeout(() => {
                            el.style.opacity = '1';
                        }, 300);
                    });
    
                    // Update values
                    document.getElementById('temperature').innerHTML = 
                        `${data.temperature}<span class="sensor-unit">°C</span>`;
                    document.getElementById('moisture').innerHTML = 
                        `${data.moisture}<span class="sensor-unit">%</span>`;
                    document.querySelector('.last-updated').innerHTML = 
                        `<i class="fas fa-sync"></i> Last updated: ${data.timestamp}`;
                });
        }, 10000);
    </script>
</body>
</html>