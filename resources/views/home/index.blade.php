@extends('layouts.app')

@section('content')

    <div id="home">

        <!-- Banner Section -->
        <section class="banner-section">

            <div class="banner-carousel owl-carousel owl-theme">

                <!-- Slide Item -->
                <div class="slide-item d-flex align-items-center" style="background-image: url('{{ asset('storage/banners/banner-01.jpg') }}');">

                    <div class="container">

                        <div class="content-box">
                            <h2>Assistencia Comercial</h2>
                            <p class="descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
                                quidem,
                                architecto fuga, error quasi, nesciunt maxime saepe consequuntur voluptatum quisquam
                                corporis porro veritatis debitis dolor nulla similique magnam culpa dolores!</p>
                            <a href="" class="btn-box"><span class="btn-title">Saiba Mais</span></a>
                        </div>

                    </div>

                    <div class="overlay"></div>

                </div>

                <!-- Slide Item -->
                <div class="slide-item d-flex align-items-center" style="background-image: url('{{ asset('storage/banners/banner-01.jpg') }}');">

                    <div class="container">

                        <div class="content-box">
                            <h2>Assistencia Comercial</h2>
                            <p class="descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
                                quidem,
                                architecto fuga, error quasi, nesciunt maxime saepe consequuntur voluptatum quisquam
                                corporis porro veritatis debitis dolor nulla similique magnam culpa dolores!</p>
                            <a href="" class="btn-box"><span class="btn-title">Saiba Mais</span></a>
                        </div>

                    </div>

                    <div class="overlay"></div>

                </div>

            </div>

        </section>

        <!-- Soluções -->
        <section class="solucoes-hm py-5">

            <div class="container">

                <div class="row">

                    @foreach ($solutions as $solution)

                        <div class="col-md-4">
                            <a href="{{ route('solucoes.info', ['solucao' => $solution->slug]) }}">
                                <div class="card mb-3">
                                    <img src="{{ asset('storage/' . $solution->thumbnail) }}"
                                        alt="{{ $solution->title }}" title="{{ $solution->title }}">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $solution->title }}</h3>
                                        <p class="card-text">{!! Str::limit($solution->description, 150) !!}</p>
                                        <button class="btn btn-primary">Saiba Mais</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>
            </div>

        </section>

        <section class="sobre-hm" style="background-image: url('{{ asset('assets/images/sobre.jpg') }}')">

                
                <div class="row justify-content-center">

                    <div class="col-md-12 col-lg-7 col-xl-5 d-flex align-items-center bg">

                        <div class="text col-md-10">

                            <h2>Lorem Ipsum Dolor</h2>

                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas consectetur dicta perspiciatis vero. At quaerat, corrupti id odio quae ratione corporis est dolores dicta fugit eaque accusamus, nam obcaecati eveniet.</p>
    
                            <ul class="p-0 mt-5">
                                <li class="d-flex align-items-center mb-3">
                                    <div class="icon px-3">
                                        <img class="img-fluid" src="{{ asset('assets/images/icon-black.png') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <h4>Gestão de Conhecimento</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur deleniti quos debitis ut dolore delectus magni ab.</p>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center mb-3">
                                    <div class="icon px-3">
                                        <img class="img-fluid" src="{{ asset('assets/images/icon-black.png') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <h4>Gestão de Conhecimento</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur deleniti quos debitis ut dolore delectus magni ab.</p>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center mb-3">
                                    <div class="icon px-3">
                                        <img class="img-fluid" src="{{ asset('assets/images/icon-black.png') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <h4>Gestão de Conhecimento</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur deleniti quos debitis ut dolore delectus magni ab.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>

                    <div class="col-md-12 col-lg-5 col-xl-7 p-0 d-flex justify-content-center align-items-center">

                        <a href="https://www.youtube.com/watch?v=qNnHS62uDHQ&ab_channel=JoshuaWeissman" class="play-video d-none d-lg-block d-xl-block" data-fancybox="video"><i class="fas fa-play"></i></a>
                        
                        <div class="video d-none d-sm-block d-md-none">

                        </div>

                    </div>

                </div>


        </section>

        <!-- Blog -->
        <section class="blog-hm py-5">

            <div class="container">

                <div class="row align-items-center justify-content-center my-5">

                    <div class="col-lg-5 mb-5 text-center">

                        <div class="newsletter">

                            <h1 class="mb-4">Novidades</h1>

                            <form action="">

                                <div class="form-group m-b30">
                                    <div class="input-group mb-0">
                                        <input class="form-control" type="email" name="email" placeholder="E-MAIL">
                                        <div class="input-group-addon">
                                            <button name="submit" value="Submit" type="submit"
                                                class="btn btn-primary">Receber Novidades</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

                <div class="row">

                    @foreach ($posts as $post)

                        <div class="col-lg-4">
                            <div class="post mb-4 mb-md-3">
                                <a href="{{ route('blog.posts', ['post' => $post->slug]) }}">
                                    <div class="img-post">
                                        <img class="w-100" src="{{ asset('storage/' . $post->thumbnail) }}"
                                            alt="{{ $post->title }}" title="{{ $post->title }}">
                                    </div>
                                    <div class="card-post">
                                        <span class="date">{{ $post->created_at->format('d/m/Y') }}</span>
                                        <h3 class="title">{{ Str::limit($post->title, 60) }}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>

        </section>

    </div>

@endsection
