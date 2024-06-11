<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header, .footer {
            text-align: center;
            padding: 20px 0;
        }
        .header {
            border-bottom: 1px solid #eee;
        }
        .header h2 {
            margin: 0;
            color: #007BFF;
        }
        .navigation {
            margin: 10px 0;
        }
        .navigation a {
            color: #007BFF;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }
        .navigation a:hover {
            text-decoration: underline;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            margin: 10px 0;
        }
        .footer {
            border-top: 1px solid #eee;
        }
        .footer p {
            margin: 0;
            font-size: 12px;
            color: #999;
        }
        img {
            width: 100%;
            max-width: 250px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.imgur.com/HwlNwuR.png" alt="img logo">
            <h2>Formulario de Contacto</h2>
            <p><strong>Categoría:</strong> <span>{{ $categoria }}</span></p>
        </div>
        <div class="content">
            <p><strong>Enviado por:</strong> {{ $nombre }}</p>
            <p><strong>Email de contacto:</strong> {{ $email }}</p>
            <p><strong>Contenido del mensaje:</strong></p>
            <p>{{ $contenido }}</p>
        </div>
        <div class="footer">
            <p>Hacemos del mundo un lugar mejor creando productos únicos y sostenibles hechos a mano con amor y dedicación.</p>
            <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
