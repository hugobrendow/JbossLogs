<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Logs </title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">LOGS SERVIDORES</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Voltar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="location.reload()" href="javascript:void(0)">Atualizar</a>
          </li>
        </ul>
      </div>
    </nav>
    <br/>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php
            $container = $_GET["container"];
            $versao = $_GET["versao"];
            $linhas = $_GET["linhas"];

            if($versao == jboss7 || $versao == jboss6){
              $output = shell_exec("sshpass -p 'SENHA' ssh -o StrictHostKeyChecking=no -vp $container USUARIO_SSH@IP_DO_SERVIDOR 'tail -n $linhas /opt/jboss/standalone/log/server.log'");
              echo "<div class='col-md-12'><pre>$output</pre></div>";
            }else{
              echo $containerIp;
              $output = shell_exec("sshpass -p 'SENHA' ssh -o StrictHostKeyChecking=no -vp $container USUARIO_SSH@IP_DO_SERVIDOR 'tail -n $linhas /opt/jboss/server/default/log/server.log'");
              echo "<div class='col-md-12'><pre>$output</pre></div>";
            }

            ?>
        </div>
      </div>

    <div>

<script src="js/bootstrap.min.js"></script>
  </body>
</html>
