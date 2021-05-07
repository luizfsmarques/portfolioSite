<main class="main-listar">

    <div>
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="">
                <a href="" class="">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>    
    </div>

    <div class="box-tabela-listar">

        <?php   
            if(!count($viewVar['listaProdutos']))
            {
        ?>    
            <div class="">Não foram encontrados dados!</div>
        <?php
            }else{
        ?>
            <div>
                <table class="tabela-dados">
                    <tr class="linha-titulo-tabela">
                        <td class="titulo-tabela">Nome</td>
                        <td class="titulo-tabela">Preço</td> 
                        <td class="titulo-tabela">Quantidade</td> 
                        <td class="titulo-tabela">Descrição</td>
                        <td class="titulo-tabela">Data Cadastro</td>
                        <td class="titulo-tabela"></td>  
                    </tr>
                    <?php
                        foreach($viewVar['listaProdutos'] as $produto){
                    ?>  
                    <tr class="linha-dados-tabela">
                        <td data-title="Nome" class="dados-tabela"> <?php echo $produto->getNome();?></td>
                        <td data-title="Preço" class="dados-tabela">R$<?php echo $produto->getPreco(); ?></td>
                        <td data-title="Quantidade" class="dados-tabela"><?php echo $produto->getQuantidade(); ?></td>
                        <td data-title="Descrição" class="dados-tabela"><?php echo $produto->getDescricao(); ?></td>
                        <td data-title="Data Cadastro" class="dados-tabela"><?php echo $produto->getDataCadastro()->format('d/m/Y');  ?></td>
                        <td class="dados-tabela">
                            
                                <a class="button-editar" href="<?php echo APP_HOST;?>/produto/edicao/<?php echo $produto->getId(); ?> " >Editar</a>
                                <a class="button-excluir" href="<?php echo APP_HOST;?>/produto/exclusao/<?php echo $produto->getId();?>">Excluir</a>
                            
                        </td>
                    </tr>
                        <?php }  ?>
                        
                </table>
            </div>  
            <?php } ?>
    </div>

</main>