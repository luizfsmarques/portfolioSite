
<main class="main-editar">

<?php if($Sessao::retornaErro()){  ?>
    <div class="">
        <a href="#" class="">&times;</a>
        <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
            <?php echo $mensagem; ?> <br>
        <?php } ?>    
    </div>
<?php  } ?>  
    
<div class="box-form-cadastrar-editar">
    <h1>Editar Produtos</h1> 
    
    <form action="<?php echo APP_HOST;  ?>/produto/atualizar" method="POST" id="form-editar" >

        <input type="hidden" class="" name="id" id="id" value="<?php echo $viewVar['produto']->getId(); ?>">
        <section class="form-section">
            <label for="nome">Nome:</label> <br>
            <input type="text" name="nome" placeholder="Nome do produto" required value="<?php echo $viewVar['produto']->getNome(); ?>" > 
        </section>
        <section class="form-section">
            <label for="preco">Preço:</label> <br>
            <input type="text" name="preco" placeholder="100" required value="<?php echo $viewVar['produto']->getPreco();?>" >   <br>
        </section>
        <section class="form-section">
            <label for="quantidade">Quantidade:</label> <br>
            <input type="number" name="quantidade" placeholder="0" required value="<?php echo $viewVar['produto']->getQuantidade(); ?>" > <br>
        </section>
        <section class="form-section">
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" placeholder="Descrição do produto" required> <?php echo $viewVar['produto']->getDescricao(); ?> </textarea> <br>
        </section>

        <div class="botoes-editar">
            <button type="submit"> Salvar </button>
            <a href="<?php echo APP_HOST;?>/produto  ">Voltar</a>
        </div>
    </form>
</div>

</main>
