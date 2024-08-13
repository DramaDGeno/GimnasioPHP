<?php
session_start();
if(@!$_SESSION['email']){
    header("location:login.html");
}
$nombre = $_SESSION['nombre'];
$rol=$_SESSION['rol'];
$id_usuario=$_SESSION['id_usuario'];
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

                            <!-- Banner -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                        <style type="text/css">
                    table {
                        border: 1px solid black;
                        border-collapse: collapse;
                        width: 100%;
                    }
                    td, th {
                        border: 1px solid black;
                        padding: 0.5rem;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
                
                <table>
                    <tr>
                        <th>ID DOCUMENTO</th>
                        <th>USUARIO</th>
                        <th>NOMBRE DEL DOCUMENTO</th>
                        <th>URL</th>
                        <th>COMENTARIOS</th>
                        <th>STATUS</th>
                        <?php if ($rol == 'administrador') { ?>
                        <th>Eliminar</th>
                        <?php } ?>
                    </tr>
                    <?php
                    $mysqli = new mysqli("localhost", "u862678554_fiorela", "Fiorela2005*", "u862678554_gimnasio");

                    if ($mysqli->connect_errno) {
                        echo "Error al conectar con la base de datos: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                        exit;
                    }

                    // SQL query based on user role
                    if ($rol == 'administrador') {
                        $sql = "SELECT documentos.id_doc, usuarios.nombre, documentos.nombre_doc, documentos.url_doc, documentos.comentarios, documentos.status
                                FROM documentos
                                JOIN usuarios ON documentos.id_usuario = usuarios.id_usuario";
                    } else {
                        $sql = "SELECT documentos.id_doc, usuarios.nombre, documentos.nombre_doc, documentos.url_doc, documentos.comentarios, documentos.status
                                FROM documentos
                                JOIN usuarios ON documentos.id_usuario = usuarios.id_usuario
                                WHERE documentos.id_usuario = ?";
                    }

                    if ($stmt = $mysqli->prepare($sql)) {
                        if ($rol !== 'administrador') {
                            $stmt->bind_param("i", $id_usuario);
                        }

                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($datos = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($datos['id_doc']); ?></td>
                        <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($datos['nombre_doc']); ?></td>
                        <td><?php echo htmlspecialchars($datos['url_doc']); ?></a></td>
                        <td><?php echo htmlspecialchars($datos['comentarios']); ?></td>
                        <td><?php echo htmlspecialchars($datos['status']); ?></td>
                        <?php if ($rol == 'administrador') { ?>
                        <td><a href="elimina.php?id_doc=<?php echo $datos['id_doc']; ?>">Eliminar</a></td>
                        <?php } ?>
                    </tr>
                    <?php
                        }
                        $stmt->close();
                    } else {
                        echo "Error en la consulta SQL: " . $mysqli->error;
                    }

                    $mysqli->close();
                    ?>  
                </table>
                    
                                </section>

                            <!-

                            <!-- Section -->
                                <section>
                                    <header class="major">
                                    </header>
                                    <div class="posts">
                                        <article>
                                            
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