@extends('admin.layouts.app')

@section('title', '- Editar Categoria')

@section('content')

    <!-- Page Heading -->
    <div class="page-header-content py-3">

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
        </div>

        <ol class="breadcrumb mb-0 mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Categoria</li>
        </ol>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-xl-12 col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-header">
                    <span class="m-0 font-weight-bold text-primary">Informações</span>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

           
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $category->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </form>


                </div>

            </div>

        </div>

    </div>

@endsection
