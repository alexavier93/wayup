@extends('layouts.app')

@section('title', '- Blog')

@section('content')

    <div id="blog">

        <div class="container">

            <div class="content py-5">

                <div class="posts">

                    <div class="row grid-blog">

                        @foreach ($posts as $post)

                            <a class="item col-md-4 col-lg-3 col-xl-3 mb-4" href="{{ route('blog.posts', ['post' => $post->slug]) }}">

                                <div class="card">
                                    <img class="w-100" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" title="{{ $post->title }}">
                                    <div class="card-body">
                                        <h6>{{ $post->created_at->format('d/m/Y') }}</h6>
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <div class="card-text">{!! Str::limit($post->description, 250) !!}</div>
                                        <button class="btn btn-primary">Saiba mais</button>
                                    </div>
                                </div>
                            </a>

                        @endforeach

                        {{ $posts->links() }}

                    </div>

                </div>



            </div>

        </div>

    </div>

@endsection
