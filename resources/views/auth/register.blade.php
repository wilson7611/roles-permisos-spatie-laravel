<!doctype html >
<html lang="en" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8" />
    <title> Sistema  | Ventas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Layout config Js -->
<script src="{{asset('assets/js/layout.js')}}"></script>
<!-- Bootstrap Css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{asset('assets/css/custom.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

    <body>
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Bienvenido Sistema de Ventas!</h5>
                                            <p class="text-muted">Registrarse.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Introducir Nombre" name="name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Introducir Correo Electronico" name="email">
                                                </div>

                                                <div class="mb-3">
                                                    
                                                    <label class="form-label" for="password-input">Contraseña</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5"
                                                            placeholder="Introducir Contraseña" id="password-input" name="password">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    
                                                    <label class="form-label" for="password-input">Confirmar Contraseña</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5"
                                                            placeholder="Repetir Contraseña" name="password_confirmation" id="password-input">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                

                                               
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div class="mt-1">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">CI</label>
                                                    <input type="text" class="form-control" id="ci"
                                                        placeholder="Introducir Cedula de Identidad" name="ci">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Telefono</label>
                                                    <input type="text" class="form-control" id="email"
                                                        placeholder="Introducir Correo Electronico" name="phone">
                                                </div>

                                                <div class="mb-3">
                                                    
                                                    <label class="form-label" for="password-input">Direccion</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="text" class="form-control pe-5"
                                                            placeholder="Introducir Direccion" id="password-input" name="address">
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    
                                                    <label class="form-label" for="password-input">Fecha de Nacimiento</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="date" class="form-control pe-5"
                                                            placeholder="Fecha de Nacimiento" name="fecha_nacimiento" id="password-input">
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="img" class="form-label">Imagen</label>
                                                    <input type="file" class="form-control" id="email"
                                                        placeholder="Introducir Correo Electronico" name="img" accept="image/">
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Registrarse</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->
    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather-icons.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
</body>

</html>