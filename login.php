<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huevo Feliz E-Commerce - Log-in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="sign-up-wrapper">
            <form id="form" action="./controller/registro.php" method="POST">
                <h1>Crear Cuenta</h1>
                <div class="social">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="nombre completo" id="" name="nombre">
                    <input type="text" placeholder="telefono" id="" name="telefono">
                    <input type="email" placeholder="email" id="" name="email">
                    <input type="text" placeholder="direccion" id="" name="direccion">
                    <input type="password" placeholder="contraseña" id="" name="password">
                    
                    <select id="opciones" name="rol" placeholder="elige el rol">
                        <option value="1">1-Cliente</option>
                        <option value="2">2-Cliente Empresarial</option>
                    </select>
                    <button class="overlay-btn" type="submit">Registrar</button>
                </div>
            </form>
        </div>
        <div class="sign-in-wrapper">
            <form action="./controller/login.php" method="POST">
                <img src="./assets/images/oie_transparent.png" class="mi-imagen">
                <div class="social">
                    <div>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    </div>
                    <div>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    </div>
                    <div>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="email"  name="email">
                    <input type="password" placeholder="password" name="password">
                    <button type="submit" class="overlay-btn">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="overlay">
            <div class="overlay-left">
                <h1>Bienvenido A Huevo Feliz</h1>
                <p>Para ingresar al e-commerce debes Loguerte</p>
                <button id="signup" class="overlay-btn">Ingresar</button>
            </div>
            <div class="overlay-right">
                <h1>Hola Estimado Cliente</h1>
                <p>Ingresa tus datos personales para poder adquirir nuestros productos</p>
                <button id="signin" class="overlay-btn">Registrar</button>
            </div>
        </div>

    </div>
    <script src="./assets/js/login.js"></script>
</body>
</html>