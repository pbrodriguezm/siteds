<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="https://www.centromedicoosi.com/wp-content/uploads/2020/01/cropped-isotipo_osi-32x32.png" sizes="32x32" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="https://www.centromedicoosi.com/wp-content/uploads/2020/01/logo_osi_color.png">
              <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
              WS - Centro Medico Especializado OSI
            </a>
          </nav>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/todosMetodos">Ver Metodos  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pruebas Unitarias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Convertir Parametros a X12N</a>
                  <a class="dropdown-item" href="#">X12N a Humano</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Unit</a>
                </div>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar M??todo</button>
          </form>
        </div>
      </nav>

      <div class="container mt-3">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Mostrar c??digo sin formato
            </a>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Ocultar
            </button>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <code>
                    <?php 
                    echo "<pre>";
                    print_r($funcionesWs)
                    ?>
                </code>
            </div>
          </div>
    </div>
      <div class="container">
      <div class="row row-cols-1 row-cols-md-3 mt-2">
          <?php foreach($funcionesWs as $funcionWs): ?>
          <?php 
            $data = explode(' ', $funcionWs);
          ?>
          <div class="col mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><a href="/getConsultaAsegNomResponse"><?= $data[0] ?></a></h5>
                  <p class="card-text"><code><?= $data[1] . ' ' . $data[2]?></code></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

