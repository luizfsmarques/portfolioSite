<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_hmtl/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_hmtl/public/css/usuarios/edicaoUsuarios.css" type="text/css">
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
                    <img class="img-topo" src="/public_hmtl/public/img/ouroLogoMenor.png" alt="Logo do site">
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

            <main class="conteudo-principal">

                <section class="casdatro-usuario">

                    <form action="<?php echo APP_HOST; ?>/usuarios/atualizar" method="POST">
                        <h3>Editar o usuário</h3>
                        
                        <input id="id" type="hidden" name="id" value="<?php echo $viewVar['usuariosEdicao']->getId(); ?>" >

                        <label for="usuario">Usuário: </label> <br>
                        <input class="input-alongar" id="usuario" type="text" name="usuario" required value="<?php echo $viewVar['usuariosEdicao']->getUsuario(); ?>"> <br>

                        <label for="senha">Senha: </label> <br>
                        <input class="input-alongar" id="senha" type="text" name="senha" required placeholder="Digite a nova senha"> <br>
                            
                        <label for="privilegio">Privilégio: </label>
                        <div class="div-radio">
                            <label>Administrador</label> <br>
                            <input  type="radio" name="privilegio" value="administrador"> 
                            <label>Convidado</label> <br>
                            <input  type="radio" name="privilegio" value="convidado" checked>  
                        </div>
                    
                        <label id="email" for="email">Email: </label> <br>
                        <input class="input-alongar"  type="text" name="email" required value="<?php echo $viewVar['usuariosEdicao']->getEmail(); ?>"> <br>
                                              
                            <?php
                                if($convidado == true)
                                {
                                ?>  
                                    <div>
                                        <p>Permissão para atualizar usuário está negada!</p>
                                    </div>
                                <?php
                                }else
                                {
                                ?>  <div>
                                        <button type="submit">Salvar</button>
                                    </div>
                                <?php
                                }
                                ?>

                                <a id="voltar-btn" href="<?php echo APP_HOST; ?>/usuarios/principalUsuarios">Voltar</a>        
                                  
                    </form>

                    
   
                </section>

            </main>

        <footer class="footer-todo">

            <div class="p-footer">
                <p>Created by Luiz Marques.</p> 
            </div>
            <div class="links-footer">
                <a href="https://github.com/luizfsmarques" target="blank">
                    <img src="http://localhost:8080/public_hmtl/public/img/github.png" alt="Link para site github">                  
                </a>
                <a href="https://www.linkedin.com/in/luiz-fernando-serra-marques-50b21417b/" target="blank">
                    <img src="http://localhost:8080/public_hmtl/public/img/linkedin.png" alt="Link para site linkedin">
                   
                </a>
            </div>    

        </footer>

         <script src="/public_hmtl/public/js/mostraMenu.js"></script>
         <script src="/public_hmtl/public/js/alteracaoProjetos.js"></script>

    </body>
</html>

