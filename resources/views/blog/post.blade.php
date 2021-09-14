@extends('layouts.app')

@section('title', '- ' . $post->title)

@section('content')

    <div id="blog-post">

        <div class="container">

            <div class="content py-5">

                <div class="row">


                    <div class="col-md-6 offset-md-1">

                        <div class="row justify-content-between align-items-center">

                            <div class="col-6">
                                Data da Publicação
                            </div>
                            <div class="col-6 text-end">
                                <h6>{{ $post->created_at->format('d/m/Y') }}</h6>
                            </div>

                        </div>

                        <div class="image mb-4">
                            <img class="img-fluid" src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                        </div>

                        <h2 class="title">{{ $post->title }}</h2>

                        <div class="text">{!! $post->description !!}</div>

                    </div>

                    <div class="col-md-4 offset-md-1">

                        <div class="lasts-posts">

                            <h3>Últimas do blog</h3>

                            <ul>
                                @foreach ($posts as $item)
                                    <li><a
                                            href="{{ route('blog.posts', ['post' => $item->slug]) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>


                    </div>

                </div>



            </div>

        </div>

    </div>

@endsection
