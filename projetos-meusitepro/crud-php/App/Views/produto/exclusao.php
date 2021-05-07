<main class="main-excluir">

    <?php if($Sessao::retornaErro()){  ?>
            <div class="">
                <a href="#" class="">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                    <?php echo $mensagem; ?> <br>
                <?php } ?>    
            </div>
    <?php  } ?>  

    <div class="box-form-excluir">
        <h1 class="titulo-form-excluir">Excluir Produto</h1> 

        <form class="form-excluir" action="<?php echo APP_HOST; ?>/produto/excluir" method="POST">
        
            <input type="hidden" class="" name="id" id="id" value="<?php echo $viewVar['produto']->getid();?>">
            <div class="texto-form-excluir">
                Deseja relamente exlcuir o produto: <?php echo $viewVar['produto']->getNome(); ?> ?
            </div>
            <div class="botoes-excluir">
                <button type="submit" class="">Excluir</button> <br>
                <a href="<?php echo APP_HOST;?>/produto  ">Voltar</a>
            </div>
        </form>
    </div>



</main>