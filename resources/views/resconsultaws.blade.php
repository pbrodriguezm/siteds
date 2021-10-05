<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OSI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="https://www.centromedicoosi.com/wp-content/uploads/2020/01/cropped-isotipo_osi-32x32.png" sizes="32x32" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        {{-- <a class="navbar-brand" href="#">Centro Medico Especializado OSI</a> --}}
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="/">
              <img src="data:image/png;base64,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" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
              WS - Centro Médico Especializado OSI
            </a>
          </nav>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Lista de Metodos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach($funcionesWs as $funcionWs): ?>
                    <?php 
                      $data = explode(' ', $funcionWs);
                    ?>
                    <a class="dropdown-item" href="#"><?= $data[0] ?></a>
                    <div class="dropdown-divider"></div>
                    <?php endforeach ?>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Información
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/detalleproceso">Procesos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/herramientas">Herramientas</a>
              </div>
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
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar Método</button>
          </form>
        </div>
      </nav>

      <div class="container mt-3">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Parametros necesarios para la solicitud a Web Services</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">TRANSACCIÓN: 270_CON_ASE, Consulta por Nombre o por DNI</h4>
          <p>6.	Ejemplo de Request para el método getConsultaAsegNom</p>
        </div>
        <form>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">coExcepcion</label>
              <input type="text" class="form-control" id="validationDefault01" value="0000" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">txNombre</label>
              <input type="text" class="form-control" id="validationDefault02" value="270_CON_ASE" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">coIafa</label>
              <input type="text" class="form-control" id="validationDefault01" value="40009" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">txPeticion</label>
              <textarea class="form-control" rows="9"
              >ISA*00*          *00*          *ZZ*00019049       *ZZ*40009          *190416*1204*|*00501*000000001*0*P*: ~GS*HS*00019049*40009*20190416*120408*1*X*005010~ST*270*0001~BHT*0022*13~HL*1**20*1~NM1*PR*2******PI*20501781291~PRV*OR**CN~HL*2*1*21*1~NM1*1P*2******FI*40009~HL*3*2*22*0~NM1*IL*1*RAMIREZ*LUIS****MI*  ***BACA~REF*DD*1~REF*4A* ~REF*PRT* * *ZZ:Revisión del Instalador 5.3~REF*D7* * *  : :: ~REF*D7* **ZZ: ~REF*8X* ~REF*S2* ~REF*ZZ* ~REF*18* **ZZ: ~REF*PRT* ~DTP*447*D8* ~NM1*P5* * * ******** ~REF*DD* **4A: ~SE*5*0001~GE*1*1~IEA*1*000000001~</textarea>
            </div>
          </div>
       
          <button class="btn btn-danger" type="submit">Enviar Trama</button>
        </form>
      </div>
      <div class="container mt-5">

        

        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Ver Repuesta en X12N
            </a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
              X12N a Humano
            </a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
              WSSECURIY - HEADER
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              {{ $resX12N }}
            </div>
          </div>
          <div class="collapse" id="collapseExample2">
            <div class="card card-body">
              <?php 
              echo "<pre>";
                var_dump($resX12NaHuman); 
                ?>
            </div>
          </div>
          <div class="collapse" id="collapseExample3">
            <div class="card card-body">
              <code>
              <?php 
              echo "<pre>";
                var_dump($desHeaders); 
                ?>

              </code>
            </div>
          </div>

      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

