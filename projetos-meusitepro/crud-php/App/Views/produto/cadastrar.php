
<main class="main-cadastrar">

    <?php if($Sessao::retornaErro()){  ?>
        <div class="">
            <a href="#" class="">&times;</a>
            <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                <?php echo $mensagem; ?> <br>
            <?php } ?>    
        </div>
    <?php  } ?>  
        
    <div class="box-form-cadastrar-editar">
        <h1>Cadastro de Produtos</h1> 

        <form action="<?php echo APP_HOST;  ?>/produto/salvar" method="POST" id="form-cadastrar" >

            <section class="form-section">
                <label for="nome">Nome:</label> <br>
                <input type="text" name="nome" placeholder="Nome do produto" required value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" > 
            </section>
            <section class="form-section">
                <label for="preco">Preço:</label> <br>
                <input type="text" name="preco" placeholder="100" required value="<?php echo $Sessao::retornaValorFormulario('preco');?>" >   <br>
            </section>
            <section class="form-section">
                <label for="quantidade">Quantidade:</label> <br>
                <input type="number" name="quantidade" placeholder="0" required value="<?php echo $Sessao::retornaValorFormulario('quantidade'); ?>" > <br>
            </section>
            <section class="form-section">
                <label for="descricao">Descrição:</label> <br>
                <textarea name="descricao" placeholder="Descrição do produto" required> <?php echo $Sessao::retornaValorFormulario('descricao'); ?> </textarea> <br>
            </section>

            <button type="submit"> Salvar </button>
        </form>
    </div>

</main>
