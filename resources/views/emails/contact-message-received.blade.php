<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de: <strong>{{$msg['name']}}</strong></p>
    <p>Correo: <strong>{{$msg['email']}}</strong></p>
    <p>Contenido: <strong>{{$msg['message']}}</strong> </p>
</body>
</html>