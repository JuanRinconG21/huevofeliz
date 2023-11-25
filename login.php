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
            <form id="form">
                <h1>Crear Cuenta</h1>
                <div class="social">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="usuario" id="">
                    <input type="email" placeholder="email" id="">
                    <input type="password" placeholder="password" id="">
                    
                    <select id="opciones" name="opciones">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                        <option value="opcion4">Opción 4</option>
                    </select>
                    <button class="overlay-btn">Registrar</button>
                </div>
            </form>
        </div>
        <div class="sign-in-wrapper">
            <form>
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
                    <input type="text" placeholder="usuario" id="">
                    <input type="password" placeholder="password" id="">
                    <button class="overlay-btn">Ingresar</button>
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