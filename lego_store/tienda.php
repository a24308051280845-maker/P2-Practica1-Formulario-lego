<?php
session_start();

// Si no hay sesión iniciada, redirige al registro
if (!isset($_SESSION['usuario_nombre'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEGO Store - Catálogo</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; }
        header { background: #e3000b; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .welcome { font-size: 18px; font-weight: bold; }
        .logout-btn { background: #ffcf00; color: #333; text-decoration: none; padding: 8px 15px; border-radius: 4px; font-weight: bold; }
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; border-radius: 8px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-top: 4px solid #006cb7; }
        .card img { max-width: 100%; height: 160px; object-fit: contain; }
        .card h3 { margin: 10px 0; color: #333; }
        .price { font-size: 18px; font-weight: bold; color: #e3000b; margin: 10px 0; }
        .buy-btn { background: #006cb7; color: white; border: none; padding: 10px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .buy-btn:hover { background: #004f87; }
    </style>
</head>
<body>

    <header>
        <div>🧩 <strong>LEGO Store</strong></div>
        <div class="welcome">
            ¡Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>! 
            <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
        </div>
    </header>

    <div class="container">
        <h2>Catálogo de Productos Lego</h2>
        
        <div class="grid">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1585366119957-e9730b6d0f60?w=400" alt="Lego Star Wars">
                <h3>X-Wing Starfighter</h3>
                <p class="price">$49.99</p>
                <button class="buy-btn">Añadir al Carrito</button>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1560169897-fc0cdbdfa4d5?w=400" alt="Lego City">
                <h3>Estación de Policía</h3>
                <p class="price">$89.99</p>
                <button class="buy-btn">Añadir al Carrito</button>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1611605698335-8b1569810432?w=400" alt="Lego Technic">
                <h3>Auto Carrera GT</h3>
                <p class="price">$119.99</p>
                <button class="buy-btn">Añadir al Carrito</button>
            </div>
        </div>
    </div>

</body>
</html>