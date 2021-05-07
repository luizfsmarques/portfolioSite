<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/erros/errors.css" type="text/css">
        <title>Error - 404</title>
        <link rel="icon" href="/public_html/public/img/icon.png">
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
                    <li><a href="<?php echo APP_HOST; ?>/projects/listing_professionla_projects">Professional projects</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo APP_HOST; ?>/projects/listing_personal_projects"> Personal projects </a></li>
                </ul>
            </nav>

        </aside>

        <main class="conteudo-principal">

            <p> <?php echo $varMessage; ?> </p>
            <a href="<?php APP_HOST ?>/public_html/mysite/index">Home page</a>

        </main>

        <footer class="footer-todo">

            <div class="p-footer">
                <p>Created by Luiz Marques.</p> 
            </div>
            <div class="links-footer">
                <a href="https://github.com/luizfsmarques" target="blank">
                    <img src="http://localhost:8080/public_html/public/img/github.png" alt="Link para site github">
                    
                </a>
                <a href="https://www.linkedin.com/in/luiz-fernando-serra-marques-50b21417b/" target="blank">
                    <img src="http://localhost:8080/public_html/public/img/linkedin.png" alt="Link para site linkedin">
                   
                </a>
            </div>     

        </footer>

         <script src="/public_html/public/js/mostraMenu.js"></script>
         <script src="/public_html/public/js/alteracaoProjetos.js"></script>

    </body>
</html>
