<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/sucesso/sucessoInterno.css" type="text/css">
        <title>Sucesso</title>
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

            // Verificando os privilégios do usuário
            $convidado = false;
            
            if( (isset($_SESSION['user'])==true) && (isset($_SESSION['password'])==true) )
            {
                if(($_SESSION['privilegio']=="convidado"))
                {
                    $convidado = true;
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
                
                <div class="organiza-incluir-excluir-projetos">

                    <section class="incluir-projetos">

                        <form action="<?php echo APP_HOST; ?>/contato/excluir/" method="POST" class="form-projetos" enctype="multipart/form-data">
                            
                            <div>
                                <p> Seu formulário foi enviado com sucesso!!!</p>
                            </div>

                            <a id="voltar-btn" href="<?php echo APP_HOST; ?>/admin">Voltar</a>
    
                        </form>
    
                    </section>

                </div>           
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
