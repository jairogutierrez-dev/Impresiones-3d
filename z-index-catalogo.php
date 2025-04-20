<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/pageStyles/z-index-catalogo-estilos.css">
    <title>Document</title>
</head>

<body>
    <?php
    // incluimos el menu donde vamos a mosstrar las categorias
    include_once('layout/menu.php');
    ?>

    <main>
        <?php
        //llamamos a la API que nos hemos creado nosotros, y transformamos el json en un objeto con json_decode
        $response = json_decode(file_get_contents('/api-productos.php?categoria=animal'), true);
        //comprobamos que la solicitud ha sido correcta
        if ($response['statuscode'] == 200) {
            foreach ($response['items'] as $item) {
                include('layout/items.php');
            }

            // var_dump($response);
        } else {
            //mostrar error
        }


        ?>

    </main>

    <script src="js/main.js"></script>
</body>

</html>