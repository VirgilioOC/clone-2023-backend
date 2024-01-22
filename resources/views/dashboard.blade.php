<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Pedidos Ya</title>
    <link rel="icon" href="images/favicon.ico">
    <!-- Importa los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    @vite(['resources/css/dashboard.css'])
  </head>
  <body>
    <!-- Navbar -->
    @include('navbar')

    <!-- Contenido -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <image class="card-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQavZS77mInKpbajzhaGj9JG6K4gJJt4ndKfw&usqp=CAU">
            <div class="card-body">
              <h5 class="card-title">Items</h5>
              <p class="card-text">Ver los items disponibles</p>
              <div class="text-center">
                <a href="/item" class="btn btn-primary">Ir a Items</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <image class="card-image" src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/LCZYWLLCRFFYLLAEPWQZGXE45Y.jpg">
            <div class="card-body">
              <h5 class="card-title">Pedidos</h5>
              <p class="card-text">Ver los pedidos realizados</p>
              <div class="text-center">
                <a href="/pedido" class="btn btn-primary">Ir a Pedidos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <image class="card-image" src="https://www.diabetesaldia.info/wp-content/uploads/2011/05/viandas-2-7jog0sccg7q0.jpg">
            <div class="card-body">
              <h5 class="card-title">Tipos</h5>
              <p class="card-text">Ver los tipos existentes</p>
              <div class="text-center">
                <a href="/tipo" class="btn btn-primary">Ir a Tipos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Importa los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
