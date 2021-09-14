@extends('admin.layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="page-header-content py-3">

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Soluções</h1>
            <a href="{{ route('admin.solutions.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Nova Solução
            </a>
        </div>

        <ol class="breadcrumb mb-0 mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Soluções</li>
        </ol>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            @include('flash::message')

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <span class="m-0 font-weight-bold text-primary">Soluções</span>

                    <a href="{{ route('admin.solutions.create') }}"
                        class="btn btn-sm btn-primary float-right d-block d-sm-none">Novo Solução</a>
                </div>

                <div class="card-body">

                    <div class="table-solutions d-none d-sm-block">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($solutions as $solution)

                                    <tr>
                                        <td>{{ $solution->id }}</th>
                                        <td class="w-25"><img class="img-fluid w-50" src="{{ asset('storage/' . $solution->thumbnail) }}" alt=""></td>
                                        <td>{{ $solution->title }}</td>

                                        <td width="15%">

                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.solutions.solution', ['solution' => $solution->id]) }}"><i class="fas fa-search-plus"></i> ver</a>
                                              
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('admin.solutions.edit', ['solution' => $solution->id]) }}"><i class="far fa-edit"></i> Editar</a>
                                                    <a class="dropdown-item delete" href="javascript:;" data-toggle="modal" data-id='{{ $solution->id }}' data-target="#modalDelete"><i class="far fa-trash-alt"></i> Excluir</a>
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                        {{ $solutions->links() }}
                        
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="py-3 m-0">Tem certeza que deseja excluir este registro?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                    <form action="{{ route('admin.solutions.delete') }}" method="post" class="float-right">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
