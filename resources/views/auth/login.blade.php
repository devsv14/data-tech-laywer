<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Iniciar sesión</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  @include('partials.linkscss')
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">                    
                  <span class="d-none d-lg-block" style='color:black'>DATA TECH LAWYER</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                    <div style="text-align: center;">
                      <img style="width: 75%; margin: auto;" src="dtlLogo.png" alt="Logo">
                    </div>
                   
              

                  <form class="row g-3 needs-validation" action="{{route('login.auth')}}" method="POST" novalidate>
                    @csrf

                    <div class="row">
                      <div class="col-sm-12">
                          <div class="content-input mb-2">
                              <input id="usuario" name="usuario" type="text" class="custom-input material"
                                  placeholder=" "  autocomplete="off" >
                              <label class="input-label" for="">Usuario</label>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="content-input mb-2">
                              <input id="password" name="password" type="text" class="custom-input material"
                                  placeholder="" autocomplete="off" >
                              <label class="input-label" for="">Password</label>
                          </div>
                      </div>
                  </div>
                   <!-- <div class="col-12">
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">Usuario</span>
                        <input type="text" name="usuario" class="form-control" id="usuario" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">Clave</span>
                          <input type="password" name="password" class="form-control" id="password" required>
                          <div class="invalid-feedback">Please enter your username.</div>
                        </div>
                      </div>
                    <div class="col-12">
                        <div class="form-group">
                            <select class="form-control" name="" id="">
                                <option value="">Sucursal 1</option>
                            </select>
                        </div>
                      </div>-->
                    <div class="col-12">
                      <button class="btn btn-dark w-100" type="submit">Iniciar</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('partials.linksjs')

</body>

</html>