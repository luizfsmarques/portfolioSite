<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/usuarios/principalUsuarios.css" type="text/css">
        <title>Administrador - Usuários</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php
        
            // Verificando se foi feito o login
            if( (!isset($_SESSION['user'])==true ) && (!isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                unset($_SESSION['privilegio']);
                header("Location:" . APP_HOST . "/index");
            }

            //Verificando o privilegio do usuário
            $convidado = false;

            if( (isset($_SESSION['user'])==true) && (isset($_SESSION['password'])==true) )
            {
                if($_SESSION['privilegio'] == "convidado")
                {
                    $convidado = true;
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
                    <li> <a href="<?php echo APP_HOST; ?>/index"> Página inicial </a> </li>
                </ul>
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

        </aside>

        <div class="div-body">
            
            <aside class="aside-voltar">
                <a id="voltar-btn" href="<?php echo APP_HOST; ?>/admin">Voltar</a>
            </aside>
                
                <main class="cadastrar-usuario">
                    
                    <form action="<?php echo APP_HOST; ?>/usuarios/salvar" method="POST">
                        <h2>Cadastrar um novo usuário </h2>
                        
                        <label for="usuario">Usuário: </label> <br>
                        <input class="input-text" id="usuario" type="text" name="usuario" required placeholder="Digite o usuário"> <br>

                        <label for="senha">Senha: </label> <br>
                        <input class="input-text" id="senha" type="text" name="senha" required placeholder="Digite a senha"> <br>

                        <label class="label-privilegio" for="privilegio">Privilégio: </label> <br>
                        <div class="div-privilegio">
                            <input id="privilegio" type="radio" name="privilegio" value="administrador"> 
                            <label id="label-admin">Administrador</label>
                            <input id="privilegio" type="radio" name="privilegio" value="convidado" checked>
                            <label>Convidado</label><br>
                        </div>
                        <div class="div-email">
                            <label class="label-email" for="email">Email: </label> <br>
                            <input class="input-text" id="email" type="text" name="email" required placeholder="email@gmail.com"> <br>
                        </div>
                        <?php
                            if($convidado == true)
                            {
                            ?>
                                <p>Permissão para adicionar usuário está negada!</p>
                            <?php
                            }else
                            {
                            ?>
                                <button type="submit">Salvar</button>
                            <?php
                            }
                            ?>
                        
                    </form>
   
                </main>

                <section class="lista-usuario">   

                    <h2>Lista de usuários</h2>
 
                        <?php
                        foreach($viewVar['usuarios'] as $usuario )
                        {
                        ?>  
                            <article>
                                <p>Usuário: <?php echo $usuario->getUsuario(); ?></p>
                                <p>Senha: <?php echo $usuario->getSenha(); ?></p>
                                <p>Privilégio: <?php echo $usuario->getPrivilegio(); ?></p>
                                <p>Email: <?php echo $usuario->getEmail(); ?></p>
                                <a class="editar-usuario" href="<?php echo APP_HOST; ?>/usuarios/edicao/<?php echo $usuario->getId(); ?>">Editar</a>
                                <a class="excluir-usuario" href="<?php echo APP_HOST; ?>/usuarios/exclusao/<?php echo $usuario->getId(); ?>">Excluir</a>
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

