<?php

  include "menu.php";
  include "conecta.inc";


  setlocale (LC_ALL, 'pt_BR');


function get_post_action($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}

  switch (get_post_action('save_categoria', 'save_produto')) {


    case 'save_categoria':
       if (!empty($_POST)) {
  $categoria = $_POST['categoria'];

  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $sqlcategoria = "INSERT INTO categoria VALUES (null, '$categoria')";

    if (!mysqli_query($conexao, $sqlcategoria)) $erro++;

  if ($erro == 0){
      mysqli_commit($conexao);
       echo("<script language='javascript' type='text/javascript'>alert('Categoria incluída com sucesso!');>window.location.href='index.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='index.php';</script>");
  }
}
        break;

    case 'save_produto':
        if (!empty($_POST)) {
  $descricao = $_POST['descricao'];
  $marca = $_POST['marca'];
  $preco = $_POST['preco'];
  $categoria = $_POST['categoria'];

  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $sqlproduto= "INSERT INTO produto VALUES (null, '$descricao', '$marca', '$preco', '$categoria')";

    if (!mysqli_query($conexao, $sqlproduto)) $erro++;

  if ($erro == 0){
      mysqli_commit($conexao);
       echo("<script language='javascript' type='text/javascript'>alert('Produto cadastrado com sucesso!');>window.location.href='index.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='index.php';</script>");
  }
}
        break;

    default: 
        //no action sent
}

 ?>




  <center><h4 class="sub-header">Categoria</h4></center> 
			
	 <form name="form" method="post" enctype="multipart/form-data" action="cad_categoria.php">

  <div class="form-group">
     <label for="categoria">Categoria</label>
     <input type="text" class="form-control" name="categoria" placeholder="Informe o nome da categoria"> 
  </div>


<!-- BOTÃO SALVAR -->

<center><button type="button"  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#salvar">Salvar</button></center>

<div class="modal fade" id="salvar" tabindex="-1" role="dialog" aria-labelledby="salvar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="salvar">Concluir cadastro</h4>
      </div>
      <div class="modal-body">
        Salvar as informações cadastrais informadas?
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="save_categoria" class="btn btn-primary">Concluir</button>
      </div>
    </div>
  </div>
</div>
      </form>

<br><br>

      <div class="table-responsive">
             <div class="table-responsive col-md-12">
        <table class="table table-hover" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
       
                  <th>Código Categoria</th>
                  <th>Nome Categoria</th>
               <th class="actions"></th>
                 </tr>
            </thead>
            <tbody>
      
             
<?php       
    include "conecta.inc";

  
  $lista = "SELECT idCategoria, nome_categoria
          FROM categoria ORDER BY idcategoria";

 
  $resultado = mysqli_query($conexao,$lista) or die("Error: ".mysqli_error($conexao));
    while ($dados = mysqli_fetch_array($resultado)) {

    echo '<td>'. $dados[0] . '</td>';
    echo '<td>'. $dados[1] . '</td>';

     ?>

<td class="actions">
                        <a class="btn btn-danger btn-xs" href="exibe_juridica.php?id=<?=$dados[0]?>">Excluir</a>
            
                    </td>


<?php         
      echo  '</tr>';
    }

?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>