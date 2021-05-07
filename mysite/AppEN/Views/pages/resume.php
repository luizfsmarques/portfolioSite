<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <link rel="stylesheet" href="/public_html/public/css/reset.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="/public_html/public/css/curriculo.css" >
        
        <title>Resume</title>
        <link rel="icon" href="/public_html/public/img/icon.png">

        <?php

            // Checking login
            if( (isset($_SESSION['user'])==true ) && (isset($_SESSION['password'])==true))
            {
                unset($_SESSION['user']);
                unset($_SESSION['password']);
                header("Location:" . APP_HOST . "/resume");
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

            <h1 class="titulo-principal">Resume</h1>

                <main class="conteudo-principal">
                
                    <header class="cabecalho-main">
                        <h2> Luiz Fernando Serra Marques </h2>
                        <p>Rua Travessa Pinheiro - Travessão de Campos - CEP 28.175-000</p>
                        <p>Campos dos Goytacazes - RJ - Brazil</p>
                        <p>Age: 26 anos - Marital status: Single</p>
                    </header>
        
                    <article class="article-main">
                        <h3>  Goal  </h3>
                        <ul>
                            <li>
                               <p> 
                                    My goal is learn new skills and knowledges, while i improve what i already learned; 
                                    looking for a first job on programmer's carreer.
                                </p>
                            </li>
                        </ul>
                    </article>
        
                    <article class="article-main">
                        <h3>Education </h3>
                        <ul>
                            <li>
                                <p>Degree in Analisys and Systems Development</p> 
                                <p>Candido Mendes University - UCAM</p>
                                <p>In progress</p> 
                            </li>
        
                            <li>                                
                                <p>Computer Technician Course</p>
                                <p>Instituto Federal Fluminense - IFF</p>
                                <p>In progress</p>
                            </li>
                        </ul>      
                    </article>
        
                    <article class="article-main">
                        <h3 >Experience</h3>
                        <ul>
                            <li>
                                <p>2014-2015 - Status Consultoria e Gestão de Projeto - Intern</p>
                            </li>
                        </ul>
                    </article>
        
                    <article class="article-main">
                        <h3>Complementary qualifications </h3>
                        <ul>
                            <li>
                                <p>English course – Wise Up - Finished</p> 
                            </li>
                            <li>
                                <p>WEB Development technologies – PHP, Laravel, HTML 5, CSS 3, JavaScript, Node.js and Python.</p>  
                            </li>
                            <li>
                                <p>Degree in Civil Engineering – 7º Period</p> 
                                <p>Candido Mendes University - UCAM </p>
                                <p>Unfinished</p>
                            </li>
                            <li>
                                <p>Industrial Automation Technician Course</p> 
                                <p>Instituto Federal Fluminense - IFF</p>
                                <p>Finished in 2018</p>
                            </li>
                            <li>
                                <p>Building Technician Course</p> 
                                <p>Instituto Federal do Pará - IFPA </p>
                                <p>Finished in 2012</p>
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