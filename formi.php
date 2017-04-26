<?php require 'validForm.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Formulario</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="formi.css"  />
    </head>
    <body>
        <h2>Formulario de Registro</h2>
        <form action="formi.php" method="POST">

            <table>
                <tr>
                    <td>
                        <label for="nombre">Nombre <span class="req">(requerido)</span></label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" />
                        <span><?php echo $errorNom; ?></span></td>
                </tr>
                <tr>
                    <td>
                        <label for="apellidos">Apellidos <span class="req">(requerido)</span></label>
                        <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" />
                        <span><?php echo $errorApellidos; ?></span></td>
                </tr>
                <tr>
                    <td>
                        <label for="nick">Nickname <span class="req">(requerido)</span></label>
                        <input type="text" name="nick" id="nick" value="<?php echo $nick ?>" />
                        <span><?php echo $errorNick; ?></span></td>
                </tr>
                <tr>
                    <td>
                        <label for="data">Data naixament <span class="req">(requerido)</span></label>
                        <input type="text" name="data" id="data" value="<?php echo $date ?>" placeholder="dd/mm/yyyy" />
                        <span><?php echo $errorDate; ?></span></td>
                </tr>
                <tr>
                    <td>
                        <span>Gènere: </span>
                        <label for="H"><span>H</span></label>
                        <input type="radio" name="genero" id="H" value="home" <?php echo $checkH; ?> />
                        <label for="D"><span>D</span></label>
                        <input type="radio" name="genero" id="D" value="dona" <?php echo $checkD; ?> />
                        <span><?php echo $errorGenero; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password <span class="req">(requerido)</span></label>
                        <input type="password" name="password" id="password" value="<?php echo $password ?>" />
                        <span><?php echo $errorPassword; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="submit" type="submit" value="Enviar!!" />
                    </td>
                </tr>
            </table>
        </form>