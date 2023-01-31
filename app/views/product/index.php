<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carrito</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    
    <body>
     
        </br>
        <div class="container">

            <table class="table table-striped">
            <h2>Lista de productos disponibles</h2>
                <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio ($)</th>
                    <th scope="col">Descuento (%)</th>
                    <th scope="col">Stock</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
            
                <?php foreach ($data['products'] as $row): array_map('htmlentities', (array) $row); ?>
                <tr scope="row">
                <td><?php echo implode('</td><td>', (array) $row); ?></td>
                 
                <form id="form1" action="/bootcamp/carrito/public/cart/addToCart/<?php echo $row->id?>" method="post">
                    <div class="form-group">  
                    <td>
                        <?php if($row->unit == 'Kg'): ?>
                            <input id="qty" type="number" step=".01" class="form-control" name="qty" min="1" max=<?php echo $row->stock?> placeholder="Cant. a agregar" required/>  
                        <?php elseif($row->unit == 'Unidades'): ?>
                            <input id="qty" type="number" class="form-control" name="qty" min="1" max=<?php echo $row->stock?> placeholder="Cant. a agregar" required/>  
                        <?php endif; ?>
                    </td>
                    <td>
                  
                    <?php if($row->stock <= 0): ?>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                        </svg>
                        <input id="submitqty" type="submit" value="Sin stock" role="button" class="btn btn-primary disabled" aria-label="Left Align"/>
    
                    <?php else: ?>
            
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                        </svg>
                        
                        <input id="submitqty" type="submit" name="action" value="Agregar" role="button" class="btn btn-primary" aria-label="Left Align"/>
                        
                    <?php endif; ?>
                  
                    </td>
                    </div>
                </form>
                
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
 
    </body>
</html>



