<script>
    function total(){
        var table = document.getElementById('cartTable');
        let total = 0
        for(let i = 1; i<table.rows.length; i++){
            total+=Number(table.rows[i].cells[2].innerText) * Number(table.rows[i].cells[4].children[0].value)
        }
        const totalInput = document.getElementById('total')
        totalInput.value=total
    }
</script>

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

        <div class='container'>
            <table id="cartTable" class="table table-striped">
                <h2>Carrito de compras</h2>
                <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio ($)</th>
                    <th scope="col">Descuento (%)</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Unidad</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                
                <?php foreach ($_SESSION['cart']->productList as $row): array_map('htmlentities',(array) $row); ?>
                <tr scope="row">
                <td><?php echo implode('</td><td>', (array) array_slice($row, 0, 4)); ?></td>
                <form id="form2" action="/bootcamp/carrito/public/cart/confirm" method="post">
                <div class="form-group">  
                    <td>
                        <?php if($row["unit"] == 'Kg'): ?>
                            <input id="qty" type="number" step=".01" class="form-control" value=<?php echo $row["qty"]; ?> name="qty" min="1" max=<?php echo $row["stock"]?> placeholder="Cant. a agregar" onchange="total()" onkeydown="return (event.keyCode!=13);" required/>  
                        <?php elseif($row["unit"] == 'Unidades'): ?>
                            <input id="qty" type="number" class="form-control" value=<?php echo $row["qty"]; ?> name="qty" min="1" max=<?php echo $row["stock"]?> placeholder="Cant. a agregar" onchange="total()" onkeydown="return (event.keyCode!=13);" required/>  
                        <?php endif; ?>
                    </td>
                </div>
                </form>
                <td>
                    <?php echo $row["unit"]; ?>
                </td>
                <td>
                    <a role="button" href="/bootcamp/carrito/public/cart/deleteFromCart/<?php echo $row["id"]?>" class="btn btn-danger" aria-label="Left Align">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        Eliminar
                    </a>
                </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            </br>

            <h5>
            <?php 
            // echo "Total a pagar: $" . $_SESSION['cart']->total; 
            ?>
            <label>Total a pagar: $
                <input id="total" type="text" name="total" readonly style="border:0px;">
            </label>
            </h5>
            <script>total();</script>

            </br>
            
            <a role="button" href="/bootcamp/carrito/public/cart/deleteAll" class="btn btn-danger btn-sm" aria-label="Left Align">Vaciar carrito</a>
            <input id="submitqty" type="submit" name="action" form="form2" value="Confirmar compra" role="button" class="btn btn-primary btn-sm" aria-label="Left Align"/>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 

    </body>

</html>



<?php 

// function getTotal(): float {
//     $total = 0;
//     foreach ($_SESSION['cart']->productList as $row){
//         $total += $row["price"] * $row["qty"];
//     }

//     return $total;

// }
?>