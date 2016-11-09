<?php
    include "menu.php";
?>

<form name="pesquisa" method="post" action="busca_produto.php">
 <div class="row">
  <div class="col-lg-12">
    <div class="input-group input-group-lg">
      <div class="input-group-btn">
        
      </div><!-- /btn-group -->
 <input type="text" name= "txtcampo" class="form-control" aria-describedby="sizing-addon1">
  <span class="input-group-addon" id="sizing-addon1"><button class="fa fa-search" type="submit" style="border:none"></button></span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>
</form>


<br><br>

<div class="table-responsive">
             <div class="table-responsive col-md-12">
        <table class="table table-hover" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                  <th>Categoria</th>
                  <th>Produto</th>
                  <th>Marca</th>
                  <th>Preço</th>
               <th class="actions"></th>
                 </tr>
            </thead>
            <tbody>
      
        
<?php       
   include "conecta.inc";
  $campo = $_POST["txtcampo"];

        $consulta = "SELECT categoria.nome_categoria,
          produto.descricao, 
          produto.marca,
          produto.preco
          FROM categoria
        INNER JOIN
    produto ON categoria.idcategoria = produto.idcategoria WHERE produto.marca LIKE '%$campo%'";
  
 
  $resultado = mysqli_query($conexao,$consulta) or die("Error: ".mysqli_error($conexao));
    while ($dados = mysqli_fetch_array($resultado)) {

        echo '<td>'. $dados[0] . '</td>';
    echo '<td>'. $dados[1] . '</td>';
    echo '<td>'. $dados[2] . '</td>';
    echo '<td>'. $dados[3] . '</td>';
     ?>

<td class="actions">
                        <a class="btn btn-danger btn-xs" href="exibe_juridica.php?id=<?=$dados[0]?>">Excluir</a>
            
                    </td>


<?php         
      echo  '</tr>';
    
  }
  


