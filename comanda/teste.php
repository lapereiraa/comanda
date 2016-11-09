 <?php

  include "menu.php";
  include "conecta.inc";

?>


<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" name="descricao" placeholder="Garrafa/Dose">
  </div>

  <div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" name="marca" placeholder="Marca">
  </div>

  <div class="form-group">
    <label for="preco">Preço</label>
    <input type="preco" class="form-control" id="preco" name="preco" placeholder="R$">
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
        <button type="submit" name="save_produto" class="btn btn-primary">Concluir</button>
      </div>
    </div>
  </div>
</div>
      </form>


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







           <div class="form-group">
    <label for="grupo"> Categoria</label>
    <select id="categoria" name="categoria" class="form-control">
    <option value="" selected="">Selecione a categoria </option>

 <?php
    include "conecta.inc";
  
 $listacategoria = "SELECT idcategoria, nome_categoria FROM categoria ORDER BY nome_categoria";  
  
 
  $resultado = mysqli_query($conexao,$listacategoria) or die("Error: ".mysqli_error($conexao));
    while ($dados = mysqli_fetch_array($resultado)) {


  echo "<option value='".$dados['idcategoria']."'>".$dados['nome_categoria']."</option>";
  }

?>
  </div>