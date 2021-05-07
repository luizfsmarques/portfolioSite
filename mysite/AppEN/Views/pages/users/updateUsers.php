<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/usuarios/edicaoUsuarios.css" type="text/css">
        <title>Administrador - Usuários</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php
            // Checking login
            
            if( (!isset($_SESSION['user'])==true ) && (!isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                unset($_SESSION['privilegio']);
                header("Location:" . APP_HOST . "/index");
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
                <a href="<?php echo APP_HOST; ?>/users/mainUsers"> 
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
                    <li> <a href="<?php echo APP_HOST; ?>/indexEn"> Home page </a> </li>
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

                <section class="casdatro-usuario">

                    <form action="<?php echo APP_HOST; ?>/users/update" method="POST">
                        <h3>Update user</h3>
                        
                        <input id="id" type="hidden" name="id" value="<?php echo $viewVar['usersUpdate']->getId(); ?>" >

                        <label for="usuario">Username: </label> <br>
                        <input class="input-alongar" id="usuario" type="text" name="usuario" required value="<?php echo $viewVar['usersUpdate']->getUsuario(); ?>"> <br>

                        <label for="senha">Password: </label> <br>
                        <input class="input-alongar" id="senha" type="text" name="senha" required placeholder="Type a new password"> <br>
                            
                        <label for="privilegio">Privilege: </label>
                        <div class="div-radio">
                            <label>Administrator</label> <br>
                            <input  type="radio" name="privilegio" value="administrador"> 
                            <label>Guest</label> <br>
                            <input  type="radio" name="privilegio" value="convidado" checked>  
                        </div>
                    
                        <label id="email" for="email">E-mail: </label> <br>
                        <input class="input-alongar"  type="text" name="email" required value="<?php echo $viewVar['usersUpdate']->getEmail(); ?>"> <br>
                                              
                            <?php
                                if($guest == true)
                                {
                                ?>  
                                    <div>
                                        <p>Permissão para atualizar usuário está negada!</p>
                                    </div>
                                <?php
                                }else
                                {
                                ?>  <div>
                                        <button type="submit">Update</button>
                                    </div>
                                <?php
                                }
                                ?>

                                <a id="voltar-btn" href="<?php echo APP_HOST; ?>/users/mainUsers">Users page</a>        
                                  
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

