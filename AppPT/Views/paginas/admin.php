<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" href="/public_html/public/css/admin5.css" type="text/css">
        <title>Administrador</title>
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

                <div class="div-h1-btn-projetos"> 
                    <h1 class="titulo-principal">Administrador</h1>
                
                    <section class="btn-projetos">

                        <button id="incluir">Incluir</button>
                        <button id="alterar">Alterar</button>
                        <a id="usuarios" href="<?php echo APP_HOST; ?>/usuarios/principalUsuarios"> Usuários</button>
                        <a id="logout" href="<?php echo APP_HOST;?>/login/logout">Logout </a>
                       
                    </section>

                </div>
                
                <div class="organiza-incluir-excluir-projetos">

                    <section class="incluir-projetos">

                        <form action="<?php echo APP_HOST; ?>/projetos/salvar" method="POST" class="form-projetos" enctype="multipart/form-data">
    
                            <h3>Incluir projetos</h3>
    
                            <label>Tipo de projeto:</label> 
                            <input id="profissional" type="radio" value="profissional" name="tipo">
                            <label>Profissional</label> 
                            <input id="pessoal" type="radio" value="pessoal" name="tipo" checked>
                            <label>Pessoal</label>
                            <br>
       
                            <label for="nome-projeto"> Nome do projeto: </label> <br>
                            <input type="text" id="nome-projeto" name="nome" placeholder="Nome do projeto" required>
                            <br>
    
                            <label for="tecnologias">Tecnologias usadas:</label> <br>
                            <input type="text" id="tecnologias" name="tecnologia" placeholder="Tecnologias usadas" required>
                            <br>
    
                            <label for="img-upload">Upload da foto do projeto: </label> <br>
                            <input id="img-upload" type="file" name="imagem" accept="image /* " required>
                            <br>
    
                            <label for="link-projeto"> Link do projeto: </label> <br>
                            <input type="text" id="link-projeto" name="link" placeholder="Link do projeto" required>
                            <br>

                            <label for="descricao">Descrição:</label> <br>
                            <textarea id="descricao" name="descricao" maxlength="1000" placeholder="Descrição" required></textarea>
                            <br>
    
                            <?php
                            if($convidado == true)
                            {
                            ?>
                                <p>Permissão para incluir projeto está negada!</p>
                            <?php
                            }else
                            {
                            ?>
                                <button type="submit">Incluir</button>
                            <?php
                            }
                            ?>
                            
                        </form>
    
                    </section>
    
                    <section class="alterar-projetos">
    
                            <h3 class="titulo-projetos">Alterar projetos</h3>
                            
                            <?php
                            if(!count($viewVar))
                            {
                            ?>  <div class="projetos-info">
                                    <p>Não existem projetos!</p>
                                </div>
                            <?php
                            }
                            else
                            {
                                foreach($viewVar['projetosAdmin'] as $projetos)
                                {
                            ?>
                                <div class="projetos-info">
                                    <p> Projeto: <?php echo $projetos->getNome();?>. É do tipo: <?php echo $projetos->getTipo();?>. </p>
                                    <a class="link-editar" href="<?php echo APP_HOST; ?>/projetos/edicao/<?php echo $projetos->getId(); ?>"> Editar </a>
                                    <a class="link-excluir" href="<?php echo APP_HOST; ?>/projetos/exclusao/<?php echo $projetos->getId(); ?>"> Excluir </a>
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
                    foreach($viewVar['contatos'] as $contato)
                    { 
                ?>
                        <article class="contatos-info">

                            <p>Nome: <?php echo $contato->getNome(); ?> </p>
                            <p>Email: <?php echo $contato->getEmail();?> </p>
                            <p>Data: <?php echo $contato->getDataContato()->format('d/m/Y') ?> às <?php echo $contato->getDataContato()->format('H:i:s') ?> </p>
                            <a class="link-visualizar" 
                                href="<?php echo APP_HOST; ?>/contato/visualizar/<?php echo $contato->getId();?>">
                                Visualizar
                            </a>
                            <a class="link-excluir" 
                                href="<?php echo APP_HOST; ?>/contato/exclusao/<?php echo $contato->getId(); ?>"> 
                                Excluir 
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



