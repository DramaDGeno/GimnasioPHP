<?php
session_start();
if(@!$_SESSION['email']){
    header("location:login.html");
}
$id_usuario=$_SESSION['id_usuario'];

$nombre = $_SESSION['nombre'];
  $rol=$_SESSION['rol'];
?>

<!DOCTYPE HTML>
<!--
    Editorial by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>GIMNASIO</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                    <div id="main">

                        <div class="inner">

                            <!-- Header -->
                                <header id="header">
                                        <h2 style="color: black"><?php echo 'Bienvenid@', $nombre, 'a', 'GYMaster'?></h2>
                                    <ul class="icons">
                                        <button><a type="button" href="desconectar.php">Cerrar sesión</a></button>
                                        
                                    </ul>
                                </header>

    <title>consulta</title>

</head>


<style type="text/css">
    table{
        border: 1px solid black;
    }
    td,th{
        border: 1px solid black;
        padding: 0.5rem;
    }
</style>
<table>
 <th>ID USUARIO </th>
<th>NOMBRE</th>   
<th>APELLIDOS</th>
<th>CORREO</th>
<th>CONTRASEÑA</th>
<th>EDAD</th>
<th>ROL</th>
<th>MODIFICAR </th>

                        <?php if ($rol == 'administrador') { ?>
                        <th>ELIMINAR</th>
                        <?php } ?>
                        
                    </tr>
 <form action="" method="POST">
    <?php
    $mysqli=new mysqli("localhost","u862678554_fiorela","Fiorela2005??","u862678554_gimnasio");
    if($mysqli->connect_errno) 
{
    echo "algo salio mal al conectar con la base de datos:(".mysqli->connect_errno.")".$mysqli->connect_error;
}
//$id_usuario = $_POST['id_usuario'];


     if ($rol == 'administrador') {
                        $sql = $mysqli->query("SELECT * FROM usuarios");
                    } else {
                        $sql = $mysqli->query("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
                    }

                    while ($datos = mysqli_fetch_array($sql)) {
                


?>
 </form>
<tr>
    <td><?php echo $datos[0]; ?></td>
    <td><?php echo $datos[1]; ?></td>
    <td><?php echo $datos[2]; ?></td>
    <td><?php echo $datos[3]; ?></td>
    <td><?php echo $datos[4]; ?></td>
    <td><?php echo $datos[5]; ?></td>
    <td><?php echo $datos[6]; ?></td><td><a href="tabla.php?id_usuario=<?php echo $datos['id_usuario']; ?>">modificar</a></td>
                       
     <?php if ($rol == 'administrador') { ?>
                        <td><a href="elimin.php?id_usuario=<?php echo $datos['id_usuario']; ?>">Eliminar</a></td>
                         
                    </tr>
                    <?php
                       
                      } 
                     
 }
                   
                    ?>  





</table>

                                </section>

                            <!-- Section -->
                                

                            <!-- Section -->
                                <section>
                                    
                                    <div class="posts">
                                        <article>
                                            
                                            <ul class="actions">
                                            
                                            </ul>
                                        </article>
                                        <article>
                                        
                                            
                                            <ul class="actions">
                                                
                                            </ul>
                                        </article>
                                        <article>
                                            
                                            <ul class="actions">
                                                
                                            </ul>
                                        </article>
                                        <article>
                                            
                                            <ul class="actions">
                                                
                                            </ul>
                                        </article>
                                        <article>
                                            
                                            <ul class="actions">

                                            </ul>
                                        </article>
                                        <article>
                                            
                                            <ul class="actions">
                                                
                                            </ul>
                                        </article>
                                    </div>
                                </section>

                        </div>
                    </div>

                <!-- Sidebar -->
                    <div id="sidebar">
                        <div class="inner">

                            <!-- Search -->
                                

                            <!-- Menu -->
                                <nav id="menu">
                                    <header class="major">
                                        
                                    </header>
                            <h2 style="color: black; font-style: italic;">Menú</h2>

                                    </header>
                                    <ul>

                                        <li>
                                            <span class="opener">Usuarios</span>
                                            <ul>
                                                    <?php
                                                if($rol=='administrador'){
                                                    ?>
                                                
                                                <li><a href="index2.php">Alta</a></li> 
                                                <?php
                                                }
                                                ?>

                                                <li><a href="consultar.php">Consulta</a></li>
                                                
                                            </ul>
                                        </li>

                                        <li>
                                            <span class="opener">Documentos</span>
                                            <ul>
                                                <li><a href="index3.php">Alta</a></li>

                                                <li><a href="index4.php">Documentos</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </nav>

                            <!-- Section -->
                                <section>
                                    <header class="major">
                                        <h2>Ante interdum</h2>
                                    </header>
                                    <div class="mini-posts">
                                        <article>
                                            <a href="#" class="image"><img src="fit.jpeg" alt="" /></a>
                                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                                        </article>
                                        <article>
                                            <a href="#" class="image"><img src="fitness.jpeg" alt="" /></a>
                                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                                        </article>
                                        <article>
                                            <a href="#" class="image"><img src="g.jpeg" alt="" /></a>
                                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                                        </article>
                                    </div>
                                    <ul class="actions">
                                        
                                    </ul>
                                </section>

                            <!-- Section -->
                                <section>
                                    <header class="major">
                                        <h2>Get in touch</h2>
                                    </header>
                                    <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                                    <ul class="contact">
                                        <li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
                                        <li class="icon solid fa-phone">(000) 000-0000</li>
                                        <li class="icon solid fa-home">1234 Somewhere Road #8254<br />
                                        Nashville, TN 00000-0000</li>
                                    </ul>
                                </section>

                            <!-- Footer -->
                                <footer id="footer">
                                    <p class="copyright">&copy; Untitled. All rights reserved. GYMaster: <a href="">gimnasio</a>. Design: <a href="">GYMaster</a>.</p>
                                </footer>

                        </div>
                    </div>

            </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
</body>
</html>

