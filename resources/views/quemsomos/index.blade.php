@extends('layouts.app')

@section('title', '- Quem Somos')

@section('content')


    <section id="sobre">

        <div class="container">

            <div class="content py-5">

                <div class="row align-items-center mb-5">
                    <div class="col-12 col-lg-6 pb-3">
                        <h2>QUEM SOMOS</h2>
                        <div class="pt-3">
                            <p>Uma empresa de consultoria, com uma solução 360 graus para sua área de vendas. Trabalhamos
                                com desenvolvimento, estruturação e capacitação comercial, baseado em anos de experiência de
                                trabalho, atualização constante e estudos de técnicas de vendas e desenvolvimento de
                                pessoas. Buscamos o crescimento e otimização de resultados, através de estudos de mercado,
                                análises da empresa, visão estratégica e capacitação.</p>
                            <p>Nossos trabalhos se dividem em três pilares: Terceirização de Vendas, Consultoria e
                                Capacitação.</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 ps-md-5 ps-2">
                        <img src="{{ asset('assets/images/sobre.jpg') }}" alt="" class="img-fluid img-rounded">
                    </div>
                </div>

                <div class="valores row align-items-center justify-content-center">

                    <div class="text-center my-3">
                        <h2>VALORES</h2>
                    </div>


                    <div class="col-md-12 col-lg-4 text-center">
                        <div class="card p-4 mb-4">
                            <h4>Inovação</h4>
                            <div class="text mt-1">Buscando atualizações e desenvolvimento sempre.</div>
                        </div>

                    </div>

                    <div class="col-md-12 col-lg-4 text-center">
                        <div class="card p-4 mb-4">
                            <h4>Confiança</h4>
                            <div class="text mt-1">Traçando uma linha de empatia e credibilidade com os clientes.</div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 text-center">
                        <div class="card p-4 mb-4">
                            <h4>Desenvolvimento</h4>
                            <div class="text mt-1">Acreditamos que o desenvolvimento pessoal deve ser um trabalho constante para a evolução.</div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 text-center">
                        <div class="card p-4 mb-4">
                            <h4>Humanização</h4>
                            <div class="text mt-1">O contato e empatia fazem parte na nossa essência.</div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 text-center">
                        <div class="card p-4 mb-4">
                            <h4>Mindset de Crescimento</h4>
                            <div class="text mt-1">Estamos sempre abertos a avaliar todas as possibilidades e traçar o melhor caminho para o crescimento.</div>
                        </div>
                    </div>


                </div>

            </div>

        </div>

    </section>


@endsection
