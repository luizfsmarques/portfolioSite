<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width= device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/contato.css" type="text/css">
        
        <title>Contato</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php

            // Se existir sessão, ela é apagada!
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/contatoView");
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

            <h1 class="titulo-principal">Contato</h1>

                <main class="conteudo-principal">
                    
                    <div class="form-contato">  

                        <form action="<?php echo APP_HOST; ?>/contato/salvar" method="POST"> 

                            <p>Obs.: Campos obrigatórios*</p>

                            <label for="assunto"> Digite o assunto*: </label> <br>
                            <input type="text" id="assunto" name="assunto" placeholder="Fale o assunto do contato" required>
                            <br>
                        
                            <label for="nome"> Digite seu nome*:</label> <br>
                            <input type="text" id="nome" name="nome" placeholder="Coloque seu nome" required>
                            <br>

                            <label for="telefone">Digite seu telefone*:</label> <br>
                            <input type="text" id="telefone" name="telefone" placeholder="(22)998040502" required> 
                            <br>

                            <label for="email">Digite seu email*:</label> <br>
                            <input type="email" id="email" name="email" placeholder="seuemail@mail.com" required>
                            <br>

                            <label for="mensagem">Digite sua mensagem*:</label> <br>
                            <textarea id="mensagem" name="mensagem" maxlength="1000" placeholder="Sua mensagem" required></textarea>
                            <br>

                            <button type="submit"> Enviar </button>

                        </form>

                    </div>
                 
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