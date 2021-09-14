@extends('layouts.app')

@section('title', '- Contato')

@section('content')

    <div id="contato">

        <section id="banner" class="bg-white pb-5">
            <div class="row m-0">
                <div id="floating-smi" class="floating-smi">
                    <div class="d-none d-md-flex col-12 col-md-1 px-0 py-2 justify-content-end align-items-center flex-column">
                        <div class="vertical-line"></div>
                        <a href="https://www.facebook.com/grupo.grotta/" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/grupo.grotta/" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/user/GrupoGrotta" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="{{ route('contato.index') }}" class="btn btn-circle btn-outline-dark mb-2">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="https://wa.me/5511947634758" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
        
                <div class="col-12 col-md-11 offset-md-1 px-0">
                    <div id="carousel-home" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="banner-frame banner-frame-top"></div>
                            <div class="banner-frame banner-frame-bottom"></div>

                            <!-- 1 Item do carrosel -->
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/sobre/banner.jpg') }}" alt="Grotta Engenharia"
                                    class="banner banner-100">
                                <div class="carousel-caption carousel-caption-home container-site mt-5">
                                    <div class="col-12 col-lg-7 text-start">
                                        <span class="fs-5 text-mark">FALE CONOSCO</span>
                                        <br>
                                        <span class="fs-1 text-mark">GRUPO GROTTA</span>

                                    </div>
                                </div>
                            </div>
                            <!-- Fim 1 Item do carrosel -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="content">

                <div class="row">

                    <div class="col-xl-6 col-md-12 col-sm-12 mb-4 form">

                        <h2>ENTRE EM <span class="text-primary">CONTATO</span></h2>

                        @include('flash::message')

                        <form action="{{ route('contato.enviaEmail') }}" method="POST" class="my-4">

                            @csrf

                            <div class="form-group my-3">
                                <input type="text" name="name" class="form-control form-control-custom @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Nome">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group my-3">
                                <input type="email" name="email" class="form-control form-control-custom @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="E-mail">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group my-3">
                                <input type="text" name="phone"
                                    class="form-control form-control-custom telefone @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" placeholder="Telefone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <input type="text" name="cidade" class="form-control form-control-custom @error('cidade') is-invalid @enderror"
                                    value="{{ old('cidade') }}" placeholder="Cidade">
                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group my-3">
                                <textarea name="description" class="form-control form-control-custom @error('description') is-invalid @enderror"
                                    rows="5" placeholder="Mensagem" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary text-right">Enviar Mensagem</button>
                            </div>

                        </form>

                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12 map">

                        <h2>GRUPO <span class="text-primary">GROTTA</span></h2>

                        <h6>Endereço</h6>

                        <p>R. Padre Manoel de Paiva, 191 - Jardim, Santo André - SP, 09070-230</p> 

                        <p>E-mail: atendimento@grupogrotta.com.br</p>
                        
                        <p>Telefone: (11) 4994-8322</p>

                        <div>
                            <a href="https://www.facebook.com/grupo.grotta/" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/grupo.grotta/" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/user/GrupoGrotta" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="{{ route('contato.index') }}" class="btn btn-circle btn-outline-dark mb-2">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="https://wa.me/5511947634758" target="_blank" class="btn btn-circle btn-outline-dark mb-2">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="map mt-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7309.290013968932!2d-46.536543!3d-23.652881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce42eca33c0b87%3A0xeb36fa9a7746f47b!2sR.%20Padre%20Manoel%20de%20Paiva%2C%20191%20-%20Jardim%2C%20Santo%20Andr%C3%A9%20-%20SP%2C%2009070-230!5e0!3m2!1spt-BR!2sbr!4v1626188256154!5m2!1spt-BR!2sbr"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>

@endsection
