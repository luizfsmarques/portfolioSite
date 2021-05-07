<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="/public_html/public/css/curriculo.css" >
        
        <title>Curriculo</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php

            // Se existir sessão, ela é apagada!
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/curriculo");
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

            <h1 class="titulo-principal">Currículo</h1>

                <main class="conteudo-principal">
                
                    <header class="cabecalho-main">
                        <h2> Luiz Fernando Serra Marques </h2>
                        <p>Rua Travessa Pinheiro - Travessão de Campos - CEP 28.175-000</p>
                        <p>Campos dos Goytacazes - RJ</p>
                        <p>Idade: 26 anos - Estado Civil: Solteiro</p>
                    </header>
        
                    <article class="article-main">
                        <h3>  Objetivo  </h3>
                        <ul>
                            <li>
                               <p> 
                                    Adquirir novos conhecimentos e aprimorar os que possuo, visando atuar com qualidade e
                                    pleno esforço nos serviços de minha responsabilidade.
                                </p>
                            </li>
                        </ul>
                    </article>
        
                    <article class="article-main">
                        <h3>Formação Acadêmica </h3>
                        <ul>
                            <li>
                                <p>Graduação em Análise e Desenvolvimento de Sistemas</p> 
                                <p>Universidade Candido Mendes - UCAM</p>
                                <p>Em andamento</p> 
                            </li>
        
                            <li>                                
                                <p>Técnico em Informática</p>
                                <p>Instituto Federal Fluminense - IFF</p>
                                <p>Em andamento</p>
                            </li>
                        </ul>      
                    </article>
        
                    <article class="article-main">
                        <h3 >Experiência Profissional</h3>
                        <ul>
                            <li>
                                <p>2014-2015 - Status Consultoria e Gestão de Projeto - Estágio</p>
                            </li>
                        </ul>
                    </article>
        
                    <article class="article-main">
                        <h3>Qualificações Complementares </h3>
                        <ul>
                            <li>
                                <p>Curso de Inglês completo – Wise Up</p> 
                            </li>
                            <li>
                                <p>Conhecimentos em Desenvolvimento public_html – HTML 5, CSS 3, JavaScript, PHP e Node.js</p>  
                            </li>
                            <li>
                                <p>Graduação em Engenharia Civil – 7º Período</p> 
                                <p>Universidade Candido Mendes – UCAM </p>
                                <p>Incompleto</p>
                            </li>
                            <li>
                                <p>Técnico em Automação Industrial</p> 
                                <p>Instituto Federal Fluminense - IFF</p>
                                <p>Conclusão em 2018</p>
                            </li>
                            <li>
                                <p>Técnico em Edificações</p> 
                                <p>Instituto Federal do Pará - IFPA </p>
                                <p>Conclusão em 2012</p>
                            </li>
                                
                        </ul>
                    </article>   
                
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

        <script src="/public_html/public/js/mostraMenu.js"> </script>

    </body>
</html>