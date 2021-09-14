@extends('layouts.app')

@section('title', '- Soluções')

@section('content')

    <section id="solucoes">

        <div class="container">

            <div class="content py-5">

                <div class="row">

                    @foreach ($solucoes as $solucao)


                        <div class="col-md-4">
                            <a href="{{ route('solucoes.info', ['solucao' => $solucao->slug]) }}">
                                <div class="card mb-3">
                                    <img src="{{ asset('storage/' . $solucao->thumbnail) }}"
                                        alt="{{ $solucao->title }}" title="{{ $solucao->title }}">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $solucao->title }}</h3>
                                        <p class="card-text">{!! Str::limit($solucao->description, 150) !!}</p>
                                        <button class="btn btn-primary">Saiba Mais</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach



                </div>

            </div>

        </div>

    </section>

@endsection
