<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEGO Store - Catálogo Completo</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --lego-red: #e3000b;
            --lego-yellow: #ffcf00;
            --lego-blue: #006cb7;
            --lego-green: #008542;
            --lego-black: #111111;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }

        body {
            background-color: #e5e7eb;
            color: #1f2937;
            background-image: radial-gradient(#d1d5db 15%, transparent 16%);
            background-size: 20px 20px;
        }

        /* Header */
        header {
            background-color: var(--lego-red);
            color: white;
            padding: 12px 24px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
            font-family: 'Fredoka', sans-serif;
            font-size: 24px;
            font-weight: 700;
        }

        .logo-box {
            background-color: var(--lego-yellow);
            color: var(--lego-red);
            padding: 4px 10px;
            border-radius: 6px;
            border: 2px solid white;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .cart-btn {
            background: var(--lego-yellow);
            color: var(--lego-black);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            border: none;
        }

        .btn-auth {
            background-color: var(--lego-black);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Hero Banner */
        .hero {
            background: linear-gradient(135deg, var(--lego-red), #b00008);
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 4px solid var(--lego-yellow);
        }

        .hero h1 { font-family: 'Fredoka', sans-serif; font-size: 32px; margin-bottom: 8px; }

        /* Main Container */
        .main-layout {
            max-width: 1200px;
            margin: 24px auto;
            padding: 0 16px;
        }

        /* Controls: Filter & Search */
        .controls-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .nav-categories {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .cat-btn {
            background: white;
            border: 2px solid #d1d5db;
            color: #374151;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .cat-btn:hover, .cat-btn.active {
            background: var(--lego-red);
            color: white;
            border-color: var(--lego-red);
        }

        .search-input {
            padding: 9px 16px;
            border-radius: 20px;
            border: 2px solid #d1d5db;
            width: 250px;
            font-size: 14px;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--lego-blue);
        }

        /* Grid De Productos */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: 2px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
        }

        .product-img {
            width: 100%;
            height: 190px;
            object-fit: contain;
            padding: 15px;
            background: #ffffff;
        }

        .product-info {
            padding: 16px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            background: #ffffff;
            border-top: 1px solid #f3f4f6;
        }

        .product-category {
            font-size: 11px;
            font-weight: 800;
            color: var(--lego-blue);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 700;
            margin: 6px 0;
            color: #111;
        }

        .product-pieces {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .product-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--lego-red);
            margin-top: auto;
            padding-top: 8px;
        }

        .btn-add {
            background: var(--lego-yellow);
            color: var(--lego-black);
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
            transition: background 0.2s;
        }

        .btn-add:hover {
            background: #ebd000;
        }

        /* Modal Overlay & Tabs */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
        }

        .modal-overlay.active { opacity: 1; pointer-events: auto; }

        .modal-box {
            background: white;
            width: 90%;
            max-width: 400px;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
            border-top: 6px solid var(--lego-red);
        }

        .modal-close {
            position: absolute;
            top: 12px; right: 12px;
            background: none; border: none;
            font-size: 20px; cursor: pointer; color: #6b7280;
        }

        .tab-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
        }

        .tab-btn {
            background: none;
            border: none;
            padding: 8px 12px;
            font-family: 'Fredoka', sans-serif;
            font-size: 18px;
            cursor: pointer;
            color: #6b7280;
            border-bottom: 3px solid transparent;
        }

        .tab-btn.active {
            color: var(--lego-red);
            border-bottom-color: var(--lego-red);
        }

        .tab-content { display: none; }
        .tab-content.active { display: block; }

        .form-group { margin-bottom: 14px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; }
        .form-input { width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; }

        .btn-submit {
            background: var(--lego-red);
            color: white; border: none; width: 100%; padding: 12px;
            border-radius: 6px; font-weight: 700; font-size: 15px; cursor: pointer; margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="index.php" class="logo">
                <span class="logo-box">LEGO</span> Store
            </a>

            <div class="user-actions">
                <button class="cart-btn" onclick="alert('Se añadieron artículos al carrito')">
                    <i class="fa-solid fa-cart-shopping"></i> Carrito (<span id="cartCount">0</span>)
                </button>

                <?php if (isset($_SESSION['usuario_nombre'])): ?>
                    <span style="font-weight: 600;">👤 Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span>
                    <a href="logout.php" class="btn-auth"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                <?php else: ?>
                    <button class="btn-secondary" onclick="openModal('loginTab')"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión</button>
                    <button class="btn-auth" onclick="openModal('registerTab')"><i class="fa-solid fa-user-plus"></i> Registrarse</button>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Banner Hero -->
    <div class="hero">
        <h1>¡Construye tus Sueños con Lego! 🧱</h1>
        <p>Explora todos nuestros sets exclusivos conectados con MySQL y XAMPP.</p>
    </div>

    <!-- Main Section -->
    <div class="main-layout">
        
        <!-- Controls Bar -->
        <div class="controls-bar">
            <div class="nav-categories">
                <button class="cat-btn active" onclick="filterCategory('todos', this)">Todos</button>
                <button class="cat-btn" onclick="filterCategory('star wars', this)">Star Wars</button>
                <button class="cat-btn" onclick="filterCategory('city', this)">City</button>
                <button class="cat-btn" onclick="filterCategory('technic', this)">Technic</button>
                <button class="cat-btn" onclick="filterCategory('harry potter', this)">Harry Potter</button>
                <button class="cat-btn" onclick="filterCategory('marvel', this)">Marvel</button>
            </div>

            <input type="text" class="search-input" id="searchInput" onkeyup="searchProducts()" placeholder="🔍 Buscar set de Lego...">
        </div>

        <!-- Catalog Grid con imágenes PNG locales -->
        <div class="products-grid" id="productsGrid">

            <!-- Set 1 -->
            <div class="product-card" data-category="star wars" data-title="star wars x-wing fighter">
                <img src="img/xwing.png" class="product-img" alt="X-Wing">
                <div class="product-info">
                    <span class="product-category">Star Wars</span>
                    <div class="product-title">Star Wars X-Wing Fighter</div>
                    <div class="product-pieces">🧩 474 piezas</div>
                    <div class="product-price">$49.99</div>
                    <button class="btn-add" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </div>

            <!-- Set 2 -->
            <div class="product-card" data-category="city" data-title="estacion de policia city">
                <img src="img/policia.png" class="product-img" alt="Policia">
                <div class="product-info">
                    <span class="product-category">City</span>
                    <div class="product-title">Estación de Policía City</div>
                    <div class="product-pieces">🧩 668 piezas</div>
                    <div class="product-price">$69.99</div>
                    <button class="btn-add" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </div>

            <!-- Set 3 -->
            <div class="product-card" data-category="technic" data-title="technic supercar mclaren">
                <img src="img/mclaren.png" class="product-img" alt="McLaren">
                <div class="product-info">
                    <span class="product-category">Technic</span>
                    <div class="product-title">Technic Supercar McLaren</div>
                    <div class="product-pieces">🧩 1,432 piezas</div>
                    <div class="product-price">$179.99</div>
                    <button class="btn-add" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </div>

            <!-- Set 4 -->
            <div class="product-card" data-category="harry potter" data-title="castillo de hogwarts">
                <img src="img/hogwarts.png" class="product-img" alt="Hogwarts">
                <div class="product-info">
                    <span class="product-category">Harry Potter</span>
                    <div class="product-title">Castillo de Hogwarts Expreso</div>
                    <div class="product-pieces">🧩 980 piezas</div>
                    <div class="product-price">$129.99</div>
                    <button class="btn-add" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </div>

            <!-- Set 5 -->
            <div class="product-card" data-category="marvel" data-title="batman super heroes">
                <img src="img/batman.png" class="product-img" alt="Batman">
                <div class="product-info">
                    <span class="product-category">Marvel</span>
                    <div class="product-title">Batman Super Heroes</div>
                    <div class="product-pieces">🧩 590 piezas</div>
                    <div class="product-price">$79.99</div>
                    <button class="btn-add" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </div>

            <!-- Set 6 -->
            <div class="product-card" data-category="star wars" data-title="halcon milenario star wars">
                <img src="img/halcon.png" class="product-img" alt="Halcón Milenario">
                <div class="product-info">
                    <span class="product-category">Star Wars</span>
                    <div class="product-title">Halcón Milenario UCS</div>
                    <div class="product-pieces">🧩 1,351 piezas</div>
                    <div class="product-price">$159.99</div>
                    <button class="btn-add" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Autenticación (Login / Registro) -->
    <div class="modal-overlay" id="authModal">
        <div class="modal-box">
            <button class="modal-close" onclick="closeModal()">&times;</button>
            
            <div class="tab-buttons">
                <button class="tab-btn" id="btnTabLogin" onclick="switchTab('loginTab')">Iniciar Sesión</button>
                <button class="tab-btn" id="btnTabRegister" onclick="switchTab('registerTab')">Registrarse</button>
            </div>
            
            <!-- Formulario Iniciar Sesión -->
            <div class="tab-content" id="loginTab">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" name="email" class="form-input" required placeholder="correo@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-input" required placeholder="••••••••">
                    </div>
                    <button type="submit" class="btn-submit">Ingresar</button>
                </form>
            </div>

            <!-- Formulario Registro -->
            <div class="tab-content" id="registerTab">
                <form action="registro.php" method="POST">
                    <div class="form-group">
                        <label>Nombre Completo</label>
                        <input type="text" name="nombre" class="form-input" required placeholder="Ej. Diego Lego">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" name="email" class="form-input" required placeholder="diego@lego.com">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-input" required placeholder="••••••••">
                    </div>
                    <button type="submit" class="btn-submit">Crear Cuenta</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        let cart = 0;

        function addToCart() {
            cart++;
            document.getElementById('cartCount').innerText = cart;
        }

        function openModal(tabName) { 
            document.getElementById('authModal').classList.add('active'); 
            switchTab(tabName);
        }

        function closeModal() { 
            document.getElementById('authModal').classList.remove('active'); 
        }

        function switchTab(tabName) {
            document.getElementById('loginTab').classList.remove('active');
            document.getElementById('registerTab').classList.remove('active');
            document.getElementById('btnTabLogin').classList.remove('active');
            document.getElementById('btnTabRegister').classList.remove('active');

            document.getElementById(tabName).classList.add('active');
            if (tabName === 'loginTab') {
                document.getElementById('btnTabLogin').classList.add('active');
            } else {
                document.getElementById('btnTabRegister').classList.add('active');
            }
        }

        // Filtro por categorías
        function filterCategory(cat, btn) {
            document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            let cards = document.querySelectorAll('.product-card');
            cards.forEach(card => {
                if (cat === 'todos' || card.getAttribute('data-category') === cat) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Búsqueda en tiempo real
        function searchProducts() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                let title = card.getAttribute('data-title');
                if (title.includes(input)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>