<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="/img/favicon.ico">
    <title>SigaDesk</title>



    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body style="font-family:'verdana'">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark ">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-2  mb-0" href="{{ url('forms') }}">

            <img src="https://app.sigafy.com.br/images/pages/login/login.png" alt="" width="100px"
                height="50px">
        </a>

        <!-- Sidebar Toggle-->

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 m-2" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar login-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>



        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
        </ul>


    </nav>

    <!--Menu lateral-->

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu ">
                    <div class="nav">
                        <a class="nav-link" href="index.html">

                            {{-- href="{{ route('users.edit', [auth()->user()->id]) }} --}}
                            <a href="{{ route('users.index') }}" class="sb-nav-link-icon nav-link text-info"><i
                                    class="fa-solid fa-user m-2"></i>{{ Auth::user()->name }}</a>

                            <a class="sb-nav-link-icon nav-link" href="{{ route('orders.index') }}"><i
                                    class="fa-solid fa-table m-2 text-info"></i>Chamados</a>


                            <a class="sb-nav-link-icon nav-link padding-3" href="" data-bs-toggle="modal"
                                data-bs-target="#modal" data-bs-whatever="@getbootstrap"><i
                                    class="fa-solid fa-square-plus m-2 text-info"></i> Nova Categoria </a>


                        </a>
                        <div class="sb-sidenav-menu-heading"> <i class="fa-solid fa-gear"></i> Configuração </div>

                        <a class="sb-nav-link-icon nav-link" href="{{ route('categories.index') }}"><i
                                class="fa-solid fa-list m-2 text-info"></i>Categorias</a>


                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">


                            </nav>
                        </div>

                        <a class="sb-nav-link-icon nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket m-2 text-info"></i>{{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        {{-- Nova categoria modal --}}

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('categories.store') }}" name="makeorder" role="ajax">
                            {{-- <input type="hidden" name="_token"  value="{! csrf_token() !!}"> --}}
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Exemplo: Sistema Operacional">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class=" w-100 btn btn-primary"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Criar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>




        <!--Conteudo pagina-->
        <main id="layoutSidenav_content">
            @yield('content')
            @yield('create')
            @yield('edit')
            @yield('category')
        </main>

        <!--Rodapé-->
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; SIGADESK 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <script src="/js/scripts.js"></script>

</body>

</html>
