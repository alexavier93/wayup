@extends('layouts.app')

@section('title', '- ' . $solucao->title)

@section('content')

    <div class="banner-solucoes">

        <div class="row justify-content-start align-items-center">
            <div class="col-5">
                <div class="background-solucao" style="background-image: url('{{ asset('storage/' . $solucao->thumbnail) }}');"></div>
            </div>
            <div class="col-5">
                
                <h1>{{ $solucao->title }}</h1>

                <h4 class="mt-5">Soluções</h4>

                <h6>{!! $solucao->description !!}</h6>
                
            </div>
        </div>
        <div class="overlay"></div>

    </div>

    <section id="solucoes-item">

        <div class="container">

            <div class="content py-5">

                <div class="row">

                    @foreach ($solucao_itens as $item)


                        <div class="col-md-4">

                            <div class="card">


                                <h4>{{ $item->title }}</h4>

                                <div class="text mt-5">{!! $item->description !!}</div>

                            </div>

                        </div>

                    @endforeach



                </div>

            </div>

        </div>

    </section>

@endsection
