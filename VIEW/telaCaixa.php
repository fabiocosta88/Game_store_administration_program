<?php
require_once("../CONTROLLER/Outros/cons_quant_prod.php");
require_once("../MODEL/PHP files/DAOCadastroGeral.php");
require_once("../CONTROLLER/Outros/CheckPagina.php");

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1">

    <title>GameStore - Caixa</title>

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
    <script src="https://ajax.googlepis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="_js/bootstrap.js"></script>
    <script src="_js/interativos.js"></script>
    <script src="_js/dados.js"></script>

    <link rel="stylesheet" href="_css/bootstrap.css">
    <link rel="stylesheet" href="_css/variations.css">
    <link rel="stylesheet" href="_css/forms.css">
</head>

<body>
    <div class="linha linhaUser2">
        <div class="contentLine">
            <a style="text-align: Left"><strong>Voltar</strong></a>
            <a style="text-align: center"><strong>Caixa!</strong></a>
            <?php
            if(isset($_SESSION['email'])){
                $nome = new DAOCadastroGeral();
                $nome->Email = $_SESSION['email'];
                echo "Bem-Vindo ".$nome->readName();
            }
            else
            {
                echo "Funcionario Atual";
            }
            ?>
            <a class="logOutbtn" onclick="modalShowOut()">Log out</a>
        </div>
    </div>
    <section class="content-site3">
        <div class="blocoPainel">
            <div class="painel">
                <div class="painelSubT">
                    <h3>R$ SUB TOTAL<div class="ValorSubT">1.440,51</div>
                    </h3>
                </div>
                <div class="painelDescI">
                    <h3>R$ DESCONTO NOS ITENS<div class="ValorDescI">-00,00</div>
                    </h3>
                </div>
                <div class="painelDescG">
                    <h3>R$ DESCONTO GERAL<div class="ValorDescG">-65,90</div>
                    </h3>
                </div>
                <div class="painelAcre">
                    <h3>R$ ACRÉSCIMO<div class="ValorAcre">+00,00</div>
                    </h3>
                </div>
            </div>
            <div class="painel1">
                <div class="painelTotal">
                    <h2>R$ TOTAL A PAGAR</h2>
                    <div class="ValorTotal">
                        <h1>1.374,61</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabelinha">
            <div class="parteBaixa">
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table id="tabela" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody id="listProd">
<!--                                <tr>-->
<!--                                    <td>1002</td>-->
<!--                                    <td>Batman Arkhan Origins</td>-->
<!--                                    <td>R$ 89,90</td>-->
<!--                                    <td>1</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>1004</td>-->
<!--                                    <td>A volta dos que não foram</td>-->
<!--                                    <td>R$ 1209,90</td>-->
<!--                                    <td>1</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>1005</td>-->
<!--                                    <td>Kingdom Hearts III</td>-->
<!--                                    <td>R$ 140,71</td>-->
<!--                                    <td>1</td>-->
<!--                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagar">
            <div class="caixa caixa1">
                <h4 class="tx1 tp">R$ TOTAL A PAGAR</h4>
                <h1 class="tpp"><label id="totalaPagar">00,00</label></h1>
            </div>
            <div class="caixa caixa2">
                <h4 class="tx1 vp">R$ VALOR PAGO</h4>
                <h1 class="vpp">1.400,00</h1>
            </div>
            <div class="blocosb">
                <div class="caixa caixa3">
                    <h4 class="tx1 sp">R$ SALDO A PAGAR</h4>
                    <h1 class="spp">00,00</h1>
                </div>
                <div class="caixa caixa4">
                    <h4 class="tx1 t">R$ TROCO</h4>
                    <h1 class="tr1">25,39</h1>
                </div>
            </div>
        </div> <button type="button" class="btn btn-primary add" onclick="modalShowTabela()">Adicionar</button>
    </section>
    <section class="footer-site">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-center">Copyright &copy; 2019 - by KatStorm</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('input#txt_consulta').quicksearch('table#tabela tbody tr');

    </script>
    <div class="bg-modal-logout">
        <div class="modal-content">
            <div id="close" class="close" onclick="modalCloseOut()">+</div>
            <form>
                <p class="text-center">Deseja Sair de Sua Seção?</p>
                <a href="../CONTROLLER/Outros/Logout.php" class="btn btn-danger">Sim</a>
                <a onclick="modalCloseOut()" class="btn btn-primary">Cancelar</a>
            </form>
        </div>
    </div>
    <div class="bg-modal-tabela">
        <div class="modal-content2">
            <h4>Estoque</h4>
            <div id="close" class="close1" onclick="modalCloseTabela()">+</div>
            <div class="form-group input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span> <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control"> </div>
            <div class="tabelaModalLoka">
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table id="tabela" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php impListaProdutos("../MODEL/PHP Files/DAOProdutos.php","../MODEL/PHP Files/DAOMovimento_Geral.php"); ?>
                            </tbody>
                        </table>
                        <script>
                            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
