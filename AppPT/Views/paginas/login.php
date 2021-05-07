<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/login1.css" type="text/css">
        <title>Login</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php

            // Se existir sessão, ela é apagada!
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/login");
            }
        ?>

    </head>
    <body>
        
        
        <div class="topo">
            
            <figure class="container-img">
                <a class="link-img-topo" href=" <?php echo APP_HOST; ?>/index" >
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

            <main class="conteudo-principal">
                    
                <h1 class="titulo-principal">Login</h1>

                <form action="<?php echo APP_HOST;?>/login/entrar" method="POST">
                    <label for="usuario"> Usuário</label> <br>
                    <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
                    <br>

                    <label for="senha">Senha</label> <br>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    <br>

                    <button type="submit">Entrar</button>
                </form>
                   
                 
            </main>
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


    </body>
</html>