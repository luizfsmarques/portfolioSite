<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <link rel="icon" href="/public_html/public/img/icon.png">
        <title>Programador WEB</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/indexStyle.css" type="text/css">

        <?php

            // Se existir sessão, ela é apagada!
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/index");
            }
        ?>
    
    </head>
    <body>
        
        <div class="topo">
 
            <figure class="container-img" >
                <img class="img-topo" src="/public_html/public/img/ouroLogoMenor.png" alt="Logo do site">
            </figure>

            <div class="div-idiomas">

                <div class="bandeiras-idiomas">
                    <figure class="brasil">
                        <a href="<?php echo APP_HOST;?>">
                            <img src="/public_html/public/img/bandeiraBrasil.png">
                        </a>
                    </figure>
                    <figure class="usa">
                        <a href="http://localhost:8080/public_html/mysite">
                            <img src="/public_html/public/img/bandeiraUSA.png">
                        </a>
                    </figure>

        </div>
                
            </div>
            
            <aside class="btn-login">
                <a href="<?php echo APP_HOST; ?>/login"> Login </a>
            </aside>
        </div>

        <main class="container-index-links">
            <nav class="index-links">
                <ul>
                    <li> <a href="<?php echo APP_HOST; ?>/curriculo"> Currículo </a> </li>
                </ul>
                 <ul>
                     <li><a href="<?php echo APP_HOST; ?>/contato"> Contato </a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo APP_HOST; ?>/projetos/listagem_projetos_profissionais">Projetos profissionais</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo APP_HOST; ?>/projetos/listagem_projetos_pessoais"> Projetos pessoais </a></li>
                </ul>
            </nav>
        </main>

        <footer>
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

        <script src="/public_html/public/js/mostraFormIdiomas.js"> </script>
    </body>
    
</html>