<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Conversation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>

    <body>

</br>   

        <h3>Conversation</h3>
        </br>
        <a role="button" href="/bootcamp/carrito/public/conversation/deleteAll" class="btn btn-danger btn-sm" aria-label="Left Align">Eliminar Conversation</a>
        </br>
        <div class="conversation">
            <i><?php if(isset($_SESSION['conversation']) && $_SESSION['conversation']->message != '') {echo $_SESSION['conversation']->message;} else {echo '</br>No hay acciones para mostrar';} ?></i>
            </br>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        
    </body>
</html>