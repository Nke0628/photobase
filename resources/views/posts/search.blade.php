@extends('layouts.app')

@section('content')
    <div class="container mt-5">
         <div class="row">
            <div class="col-md-1">
                <p>一覧</p>
            </div>
         </div>
         <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-12" style="margin-top:20px;">
                    <a class="ph-style-base mx-auto" href="{{ url('posts/'.$post->id)}}">
                    <img class="ph-style" src="{{ asset('storage/' . $post->file_name) }}" style="width: 300px; height: 200px;">
                    <p class="mask"> 
                        {{$post->like}}
                    </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection