<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/admin5.css" type="text/css">
        <title>Administrator</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php
            // Checking login
            
            if( (!isset($_SESSION['user'])==true ) && (!isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                unset($_SESSION['privilegio']);
                header("Location:" . APP_HOST . "/indexEn");
                
            }

            //Checking user's privilege 
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
                    <li> <a href="<?php echo APP_HOST; ?>/index"> Home Page </a> </li>
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

            <main class="conteudo-principal">

                <div class="div-h1-btn-projetos"> 
                    <h1 class="titulo-principal">Administrator</h1>
                
                    <section class="btn-projetos">

                        <button id="incluir">Add</button>
                        <button id="alterar">Changes</button>
                        <a id="usuarios" href="<?php echo APP_HOST; ?>/users/mainUsers"> Users</button>
                        <a id="logout" href="<?php echo APP_HOST;?>/login/logout">Logout </a>
                       
                    </section>

                </div>
                
                <div class="organiza-incluir-excluir-projetos">

                    <section class="incluir-projetos">

                        <form action="<?php echo APP_HOST; ?>/projects/save" method="POST" class="form-projetos" enctype="multipart/form-data">
    
                            <h3>Add projects</h3>
    
                            <label>Project's type:</label> 
                            <input id="profissional" type="radio" value="profissional" name="tipo">
                            <label>Professional</label> 
                            <input id="pessoal" type="radio" value="pessoal" name="tipo" checked>
                            <label>Personal</label>
                            <br>
       
                            <label for="nome-projeto"> Project's name: </label> <br>
                            <input type="text" id="nome-projeto" name="nome" placeholder="Project's name" required>
                            <br>
    
                            <label for="tecnologias">Technologies:</label> <br>
                            <input type="text" id="tecnologias" name="tecnologia" placeholder="Technologies" required>
                            <br>
    
                            <label for="img-upload">Upload project's image: </label> <br>
                            <input id="img-upload" type="file" name="imagem" accept="image /* " required>
                            <br>

                            <label for="link-projeto"> Project's link: </label> <br>
                            <input type="text" id="link-projeto" name="link" placeholder="Project's link" required>
                            <br>

                            <label for="descricao">Description:</label> <br>
                            <textarea id="descricao" name="descricao" maxlength="1000" placeholder="Description" required></textarea>
                            <br>
                            
                            <?php
                            if($guest == true)
                            {
                            ?>
                                <p>Permissão para incluir projeto está negada!</p>
                            <?php
                            }else
                            {
                            ?>
                                <button type="submit">Add</button>
                            <?php
                            }
                            ?>
                            
                        </form>
    
                    </section>
    
                    <section class="alterar-projetos">
    
                            <h3 class="titulo-projetos">Changes projects </h3>
                            
                            <?php
                            if(!count($viewVar))
                            {
                            ?>  <div class="projetos-info">
                                    <p>No projects.</p>
                                </div>
                            <?php
                            }
                            else
                            {
                                foreach($viewVar['projectsAdmin'] as $projects)
                                {
                            ?>
                                <div class="projetos-info">
                                    <p> Project: <?php echo $projects->getNome();?>. Its type: <?php echo $projects->getTipo();?>. </p>
                                    <a class="link-editar" href="<?php echo APP_HOST; ?>/projects/edition/<?php echo $projects->getId(); ?>"> Update </a>
                                    <a class="link-excluir" href="<?php echo APP_HOST; ?>/projects/exclusion/<?php echo $projects->getId(); ?>"> Delete </a>
                                </div>
                            <?php
                                }
                            ?> 
                            <?php
                            }
                            ?> 
    
                    </section>

                </div>
                      
            </main>

            <section class="msg-contato">

                <h2>Mensagem do contato </h2> 
                
                <?php
                    foreach($viewVar['contacts'] as $contact)
                    { 
                ?>
                        <article class="contatos-info">

                            <p>Name: <?php echo $contact->getNome(); ?> </p>
                            <p>Email: <?php echo $contact->getEmail();?> </p>
                            <p>Date: <?php echo $contact->getDataContato()->format('m/d/Y') ?> at <?php echo $contact->getDataContato()->format('H:i:s') ?> </p>
                            <a class="link-visualizar" 
                                href="<?php echo APP_HOST; ?>/contact/toView/<?php echo $contact->getId();?>">
                                See more
                            </a>
                            <a class="link-excluir" 
                                href="<?php echo APP_HOST; ?>/contact/exclusion/<?php echo $contact->getId(); ?>"> 
                                Delete 
                            </a>
                        </article>
                <?php
                    }
                ?>

            </section>

        </div>

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

         <script src="/public_html/public/js/mostraMenu.js"></script>
         <script src="/public_html/public/js/alteracaoProjetos.js"></script>

    </body>
</html>



