<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear producto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>

        </br>

        <div class="container">
        <h1>Crear producto</h1>
        <form action='' method='post'>
            <div class="form-group">
                
                <div class="container">
                    <label>Nombre: <input type="text" name="name" class="form-control"/></label></br></br>
                    <label>Precio: <input type="text" name="price" class="form-control"/></label></br></br>
                    <label>Descuento: <input type="text" name="discount" class="form-control"/></label></br></br>
            
                    <label>Stock: <input type="text" name="stock" class="form-control"/>
                   
                    <select name="unit" class="form-control">
                        <option value="Unidades">Unidades</option>
                        <option value="Kg">Kg</option>
                    </select>
                    
                   </label>
                </div>

            </div>
            </br>
            <input type="submit" name="action" value="Crear" class="btn btn-primary btn-sm"/>
            <a href="/bootcamp/carrito/public/product/index" role="button" class="btn btn-secondary btn-sm">Cancelar</a>
        </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>