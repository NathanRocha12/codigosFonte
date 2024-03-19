<?php
    require_once "views/cabecalho.php"
?>
  <div class="content">
    <div class="container">
      <h1>Carrinho de Compras</h1>
        <?php
          if (isset($_SESSION["carrinho"])) {
        ?>
          <table class="table table-striped">
            <tr>
              <th>Produto</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th>Sub-Total</th>
              <th></th>
            </tr>
            <?php
              $subtotal = 0;
              $total = 0;
              
              foreach ($_SESSION["carrinho"] as $linha=>$dado) {
                $subtotal = $dado["preco"] * $dado["quantidade"];

                $total += $subtotal;

                echo "<tr>
                        <td>{$dado['nome']}</td>
                        <td>" . number_format($dado['preco'], 2, ",", ".") . "</td>
                        <td><input type='number' min='1' value='{$dado['quantidade']}' linha='$linha'></td>
                        <td>" . number_format($subtotal, 2, ",", ".") . "</td>
                        <td><a href='index.php?controle=vendaController&metodo=excluir_carrinho&linha=$linha'>Excluir</a></td>
                      </tr>";
              }

              echo "<tr>
                      <td colspan='3'>Total</td>
                      <td colspan='2'>" . number_format($total, 2, ",", ".") . "</td>
                    </tr>";

            ?>
          </table>
          <a class="btn btn-primary" href="index.php">Continuar Comprando</a>
          <a class="btn btn-primary" href="index.php?controle=vendaController$metodo=inserir_venda">Finalizar a Compra</a>
        <?php
          } //fechou aki para não precisar usar de echo para escrever o html
          else {
            echo "<br><br><h3>Não há produtos no carrinho de compras</h3>";
          }
        ?>
    </div>
  </div>  
</body>
</html>