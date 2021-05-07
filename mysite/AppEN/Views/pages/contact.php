<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width= device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/contato.css" type="text/css">
        
        <title>Contact</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php

            // Checking login
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/contact");
            }
        ?>

    </head>
    <body>

        <div class="topo">
            
            <figure class="container-img">
                <a href="<?php echo APP_HOST; ?>/index">
                    <img class="img-topo" src="/public_html/public/img/ouroLogoMenor.png" alt="Logo do site">
                </a>
            </figure>   
    
            <aside class="btn-menu">
                <p> Menu</p>
            </aside>

        </div>

        <aside class= "menu-escondido">

            <nav class="menu-escondido-links">
                <ul>
                    <li> <a href="<?php echo APP_HOST; ?>/index"> Home page </a> </li>
                </ul>
                <ul>
                    <li> <a href="<?php echo APP_HOST; ?>/resume"> Resume </a> </li>
                </ul>
                 <ul>
                     <li><a href="<?php echo APP_HOST; ?>/contact"> Contact </a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo APP_HOST; ?>/projects/listing_professional_projects">Professional projects</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo APP_HOST; ?>/projects/listing_personal_projects"> Personal projects </a></li>
                </ul>
            </nav>

        </aside>

        <div class="div-body">

            <h1 class="titulo-principal">Contact</h1>

                <main class="conteudo-principal">
                    
                    <div class="form-contato">  

                        <form action="<?php echo APP_HOST; ?>/contact/save" method="POST"> 

                            <p>Obs.: Mandatory fields*</p>

                            <label for="assunto"> Subject matter*: </label> <br>
                            <input type="text" id="assunto" name="assunto" placeholder="Talk about the subject matter" required>
                            <br>
                        
                            <label for="nome"> Type your name*:</label> <br>
                            <input type="text" id="nome" name="nome" placeholder="Type your name" required>
                            <br>

                            <label for="telefone">Type your telephone number*:</label> <br>
                            <input type="text" id="telefone" name="telefone" placeholder="(22)998040502" required> 
                            <br>

                            <label for="email">E-mail*:</label> <br>
                            <input type="email" id="email" name="email" placeholder="email@mail.com" required>
                            <br>

                            <label for="mensagem">Type your message*:</label> <br>
                            <textarea id="mensagem" name="mensagem" maxlength="1000" placeholder="Type your message" required></textarea>
                            <br>

                            <button type="submit"> Send </button>

                        </form>

                    </div>
                 
                </main>

            <footer class="footer-todo">

                <div class="p-footer">
                    <p>Created by Luiz Marques.</p> 
                </div>
                <div class="links-footer">
                <a href="https://github.com/luizfsmarques" target="blank">
                    <img src="/public_html/public/img/github.png" alt="Link para site github">
                    
                </a>
                <a href="https://www.linkedin.com/in/luiz-fernando-serra-marques-50b21417b/" target="blank">
                    <img src="/public_html/public/img/linkedin.png" alt="Link para site linkedin">
                   
                </a>
            </div>     

            </footer>

        </div>

         <script src="/public_html/public/js/mostraMenu.js"></script>  

    </body>
</html>