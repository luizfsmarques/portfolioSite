<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/projetos/edicaoAdmin.css" type="text/css">
        <title>Administrador - Update</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php
            // Verificando se foi feito o login
            
            if( (!isset($_SESSION['user'])==true ) && (!isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                unset($_SESSION['privilegio']);
                header("Location:" . APP_HOST . "/indexEn");
            }

            //Verificando o privilegio do usuário
            $guest = false;

            if( (isset($_SESSION['user'])==true) && (isset($_SESSION['password'])==true) )
            {
                if($_SESSION['privilegio'] == "convidado")
                {
                    $guest = true;
                }
            }
        ?>
    </head>
    <body>
        
        <div class="topo">
            
            <figure class="container-img">
                <a href="<?php echo APP_HOST; ?>/admin">
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

        <div class="div-body">

            <main class="conteudo-principal">

                    <section class="incluir-projetos">

                        <form action="<?php echo APP_HOST; ?>/projects/update" method="POST" class="form-projetos" enctype="multipart/form-data">
    
                            <h3>Update projects</h3>

                            <input id="id" type="hidden" name="id" required value="<?php echo $viewVar['projectsUpdate']->getId(); ?>">
    
                            <label>Project's type:</label> 
                            <input id="profissional" type="radio" value="profissional" name="tipo">
                            <label>Professional</label> 
                            <input id="pessoal" type="radio" value="pessoal" name="tipo" checked>
                            <label>Personal</label>
                            <br>
     
                            <label for="nome-projeto"> Project's name: </label> <br>
                            <input type="text" id="nome-projeto" name="nome"required value="<?php echo $viewVar['projectsUpdate']->getNome(); ?>" >
                            <br>
    
                            <label for="tecnologias">Technologies:</label> <br>
                            <input type="text" id="tecnologias" name="tecnologia" required value="<?php echo $viewVar['projectsUpdate']->getTecnologia(); ?>">
                            <br>
    
                            <label for="img-upload">Upload project's image: </label> <br>
                            <input id="img-upload" type="file" name="imagem" accept="image /* " required>
                            <br>

                            <label for="link-projeto"> Link do projeto: </label> <br>
                            <input type="text" id="link-projeto" name="link" value="<?php echo $viewVar['projectsUpdate']->getLink(); ?>" required>
                            <br>

                            <label for="descricao">Description:</label> <br>
                            <textarea id="descricao" name="descricao" maxlength="1000" required><?php echo $viewVar['projectsUpdate']->getDescricao(); ?></textarea>
                            <br>

                            <?php
                            if($guest == true)
                            {
                            ?>
                                <p>Permission to update project is denied!</p>
                            <?php
                            }else
                            {
                            ?>
                                <button type="submit">Update</button>
                            <?php
                            }
                            ?>
                                             
                            <a id="voltar-btn" href="<?php echo APP_HOST; ?>/admin">Admin page</a>
    
                        </form>
    
                    </section>

                     
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

