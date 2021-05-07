<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/projetospes3.css" type="text/css">
        <title>Personal projects</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php

            // Checking login
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/projetos");
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

            <h1 class="titulo-principal">Personal projects</h1>

                <main class="conteudo-principal">
                    
                    <?php

                        if(!count($viewVar))
                        {
                            echo "No projects.";
                        }else
                        {   
                            foreach($viewVar['projetos'] as $projects)
                            {
                    ?>          <?php
                                if($projects->getTipo() == "pessoal")
                                {
                                ?>
                                    <section class="card">
                                        <div class="imagem-box">
                                            <img class="imagem" src="/public_html/public/img/projetos/<?php echo $projects->getImagem(); ?>">
                                        </div>
                                        <div class="informacao-box">
                                            <p class="nome-projeto">Name: <?php echo $projects->getNome();?> </p>
                                            <p class="tecnologia">Technologies: <?php echo $projects->getTecnologia(); ?> </p>
                                            <p class="descricao">Description: <?php echo $projects->getDescricao();?> </p>
                                        </div>
                                        <div class="link-box">
                                            <a href="<?php echo $projects->getLink(); ?>" class="link">See more</a>
                                        </div>   
                                    </section>    
                                <?php
                                }
                                ?>
                    <?php   } ?>

                <?php   } ?>
                    
                   
                 
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