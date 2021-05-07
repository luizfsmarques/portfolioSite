<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/usuarios/principalUsuarios.css" type="text/css">
        <title>Administrator - Users</title>
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
                if(($_SESSION['privilegio']=="convidado"))
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
            
            <aside class="aside-voltar">
                <a id="voltar-btn" href="<?php echo APP_HOST; ?>/admin">Admin page</a>
            </aside>
                
                <main class="cadastrar-usuario">
                    
                    <form action="<?php echo APP_HOST; ?>/users/save" method="POST">
                        <h2>Add a new user </h2>
                        
                        <label for="usuario">User: </label> <br>
                        <input class="input-text" id="usuario" type="text" name="usuario" required placeholder="Type the user"> <br>

                        <label for="senha">Password: </label> <br>
                        <input class="input-text" id="senha" type="text" name="senha" required placeholder="Type the password"> <br>

                        <label class="label-privilegio" for="privilegio">Privilege: </label> <br>
                        <div class="div-privilegio">
                            <input id="privilegio" type="radio" name="privilegio" value="administrador"> 
                            <label id="label-admin">Administrator</label>
                            <input id="privilegio" type="radio" name="privilegio" value="convidado" checked>
                            <label>Guest</label><br>
                        </div>
                        <div class="div-email">
                            <label class="label-email" for="email">E-mail: </label> <br>
                            <input class="input-text" id="email" type="text" name="email" required placeholder="email@gmail.com"> <br>
                        </div>
                        <?php
                            if($guest == true)
                            {
                            ?>
                                <p>Permission to add the user is denied!</p>
                            <?php
                            }else
                            {
                            ?>
                                <button type="submit">Save</button>
                            <?php
                            }
                            ?>
                        
                    </form>
   
                </main>

                <section class="lista-usuario">   

                    <h2>Users list</h2>
 
                        <?php
                        foreach($viewVar['users'] as $user )
                        {
                        ?>  
                            <article>
                                <p>Username: <?php echo $user->getUsuario(); ?></p>
                                <p>Password: <?php echo $user->getSenha(); ?></p>
                                <p>Privilege: <?php echo $user->getPrivilegio(); ?></p>
                                <p>E-mail: <?php echo $user->getEmail(); ?></p>
                                <a class="editar-usuario" href="<?php echo APP_HOST; ?>/users/edition/<?php echo $user->getId(); ?>">Update</a>
                                <a class="excluir-usuario" href="<?php echo APP_HOST; ?>/users/exclusion/<?php echo $user->getId(); ?>">Delete</a>
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

