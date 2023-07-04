<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiCuento</title>
</head>
<body>
    <div class="ancho">
    <div class="contenedor-todo">
        <!--El titulo-->
        <header class="encabezado">
            <h1 id="title">StoryBooks<br></h1>
            <p id="description">If you want a storybook, this is your place</p>
        </header>
        <?php
        function mostrarDesplegable() {
            echo '
            <div class="contenedor-formulario">
            <label for="opciones" >Selecciona una opción:</label>
            <select name="opciones">
                <option value="book1">Book 1</option>
                <option value="book2">Book 2</option>
            </select>
            <button type="submit">Submit</button>
            </div>
            ';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar si se ha enviado un valor desde el formulario
            if (isset($_POST['opciones'])) {
            $seleccionado = $_POST['opciones'];

            if ($seleccionado === "book1") {

                $prueba = "First";

                // Continue to display dropdown:
                echo '<form method="POST">';
                mostrarDesplegable();
                echo '</form>';
                // Show form 1 - Book 1
                echo '
                <form method="POST" action="process.php" class="contenedor-formulario" id="survey-form">
                    <!-- Campo nombre-->
                    <h1>'.$prueba.'</h1>
                    <div class="componentesFormulario"> 
                        <label for="nombre" id="nombre">Name</label>
                        <input type="text" name="nombre" id="nombre" title="" placeholder="Your name" class="parteFormulario" required>
                    </div>
                    <!-- Campo Email-->
                    <div class="componentesFormulario">
                        <label for="amigo" id="amigo">Friend name</label>
                        <input type="text" name="amigo" id="amigo" placeholder="Friend name" class="parteFormulario" required>
                    </div>
                    <!-- Campo edad-->
                    <div class="componentesFormulario">
                        <label for="colegio" id="colegio">School</label>
                        <input type="text" name="colegio" id="colegio" title="colegio" placeholder="School" class="parteFormulario">
                    </div>
                    <!--Campo boton-->
                    <div class="componentesFormulario">
                        <button type="submit" id="submit" class="input-boton" title="bt" name="accion" value="funcion1">
                            Change
                        </button>
                    </div>
                </form>
                ';
            } elseif ($seleccionado === "book2") {
                $prueba2 = "Second";
                // Mostrar el formulario 2
                echo '<form method="POST">';
                mostrarDesplegable();
                echo '</form>';

                //Form
                echo '<form method="POST" action="process.php" class="contenedor-formulario" id="survey-form" >
                <!-- input amigo2-->
                <h1>'.$prueba2.'</h1>
                <div class="componentesFormulario"> 
                    <label for="amigo2" id="amigo2">Name</label>
                    <input type="text" name="amigo2" id="amigo2" title="" placeholder="Name" class="parteFormulario" required>
                </div>
                <!-- input gato-->
                <div class="componentesFormulario">
                    <label for="gato" id="gato">Cat</label>
                    <input type="text" name="gato" id="gato" placeholder="Cat name" class="parteFormulario" required>
                </div>
                <!--input boton-->
                <div class="componentesFormulario">
                    <button type="submit" id="submit" class="input-boton" title="bt"  name="accion" value="funcion2">
                        Change
                    </button>
                </div>
                    </form>
                ';
            } 
            // else {
            //     // No se ha seleccionado ninguna opción
            //     echo '<p>No se ha seleccionado ninguna opción.</p>';
            // }
            }
        } else {
            // Mostrar el desplegable por defecto
            echo '
            <form method="POST">
                ';
                mostrarDesplegable();
            echo '
            </form>
            ';
        }
        ?>
        <!--Inicio formulario-->
    

    </div>
    </div>
</body>
</html>