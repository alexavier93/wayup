<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Way Up Consultoria @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon-logo.png') }}" />

    <meta name="title" content="Way Up">
    <meta name="apple-mobile-web-app-title" content="Way Up">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <!-- opengraph -->
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="350">
    <meta property="og:image:height" content="350">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="Way Up">
    <meta property="og:title" content="Way Up" />
    <meta property="og:description" content="">
    <meta property="og:url" content="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

</head>

<body>


    <!-- Header -->
    <header id="header">

        <div class="header-top">
            <div class="container">
                <div class="row">


                    <div class="col-sm-12 col-md-9 col-lg-9 text-center text-md-start">
                        <ul class="nav-top">
                            <li><a href=""><i class="far fa-envelope me-2"></i>contato@wayupconsultoria.com.br</a></li>
                            <li><a href=""><i class="fab fa-whatsapp me-2"></i>11 90000-9999</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3 text-center text-md-end">
                        <ul class="nav-top">
                            <li><a href="https://www.facebook.com/wayupconsultoria/"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/wayupconsultoria/"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-nav">

            <div class="container">

                <div class="wrap">

                    <div class="logo">
                        @if (route('home'))
                            <a href="{{ route('home') }}" class="logo-main"><img
                                    src="{{ asset('assets/images/logo-wayup.png') }}" alt=""></a>
                        @else
                            <a href="{{ route('home') }}" class="logo-main"><img class="img-fluid"
                                    src="{{ asset('assets/images/logo-wayup.png') }}" alt=""></a>
                        @endif
                        <a href="{{ route('home') }}" class="logo-fix"><img class="img-fluid"
                                src="{{ asset('assets/images/logo-wayup.png') }}" alt=""></a>
                    </div>

                    <div class="menu">

                        <nav class="nav">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link @if (\Route::current()->getName() == 'home') active @endif" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if (\Route::current()->getName() == 'quemsomos.index') active @endif"
                                        href="{{ route('quemsomos.index') }}">Quem Somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if (\Route::current()->getName() == 'solucoes.index') active @endif"
                                        href="{{ route('solucoes.index') }}">Soluções</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if (\Route::current()->getName() == 'blog.index') active @endif"
                                        href="{{ route('blog.index') }}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if (\Route::current()->getName() == '#contato') active @endif" href="#contato">Contato</a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                    <div class="icon-sidemenu d-lg-none d-flex flex-grow-1 justify-content-end align-items-center">
                        <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>



                </div>

            </div>

        </div>

        <!--Side Nav-->
        <div class="side-menu hidden">
            <div class="inner-wrapper">
                <span class="btn-close" id="btn_sideNavClose"><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if (\Route::current()->getName() == 'home') active @endif" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (\Route::current()->getName() == 'quemsomos.index') active @endif" href="{{ route('quemsomos.index') }}">Quem
                                Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (\Route::current()->getName() == 'solucoes.index') active @endif"
                                href="{{ route('solucoes.index') }}">Soluções</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (\Route::current()->getName() == 'blog.index') active @endif" href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (\Route::current()->getName() == '#contato') active @endif" href="#contato">Contato</a>
                        </li>

                    </ul>
                </nav>

            </div>

        </div>

        <a id="close_side_menu" href="javascript:void(0);"></a>

    </header>
    <!-- Header -->

    <main role="main">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer id="footer">

        <div class="footer-top">

            <div class="container">

                <div class="row justify-content-between links">

                    <div class="col-sm-12 col-md-6 col-lg-6 item-link">

                        <h2 class="mb-4">Obtenha uma consultoria</h2>

                        <div class="contact mb-3">
                            <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                            <div class="contact-info">11 90000-9999</div>
                        </div>

                        <div class="contact mb-3">
                            <div class="contact-icon"><i class="far fa-envelope"></i></div>
                            <div class="contact-info">contato@wayupconsultoria.com.br</div>
                        </div>


                        <div class="address mb-3">
                            <div class="address-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="address-info">Av. Lorem Ipsum, 123 - São Paulo - SP
                            </div>
                        </div>

                        <div class="social-midia d-flex aling-items-center">

                            <a href="https://www.facebook.com/" target="_blank" class="p-2 text-light">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <a href="https://www.instagram.com/" target="_blank" class="p-2 text-light">
                                <i class="fab fa-instagram"></i>
                            </a>

                        </div>

                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-5 offset-lg-1 item-link">

                        <h2 class="mb-2">Entre em contato</h2>

                        <div id="contato" class="form-contato">

                            <form id="formContato" method="POST">

                                @csrf

                                <input type="hidden" name="url" value="{{ route('contato.index') }}">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group my-3">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" placeholder="Nome" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="E-mail" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="text" name="phone"
                                                class="form-control telefone @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}" placeholder="Telefone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea name="description"
                                                class="form-control @error('description') is-invalid @enderror" rows="5"
                                                placeholder="Mensagem" required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-3 text-end">
                                    <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="bottom-footer">

            <div class="container">

                <div class="row text-center">

                    <p class="p-3">© {{ now()->year }} - Way Up Consultoria - Todos os direitos reservados
                    </p>

                </div>

            </div>

        </div>

    </footer>
    <!-- End Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/runtime.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

</body>

</html>
