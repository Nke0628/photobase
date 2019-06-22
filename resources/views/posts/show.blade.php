@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <p>「{{ $post->title }}」</p>
    <p>投稿日時{{ $post->created_at }}</p>
    @auth
		<div class="good">
			@if($post->likes->where('post_id',$post->id)->where('user_id',auth::id())->count()>=1)
    			<i class="fas fa-heart fa-2x good color-red" onclick="rmaddGood()"></i>
    		@else
    		 	<i class="fas fa-heart fa-2x good" onclick="rmaddGood()"></i>
    		@endif
    		<span class="good-count">{{ $post->likes->count()}}</span>
    		<input  class="post-id" type="hidden" value="{{ $post->id }}">
    	</div>
    @else
    	<div>
    		<i class="fas fa-heart fa-2x"></i><a href="/login">ログインしてお気に入りに登録する</a>
    	</div>
    @endauth
    <br>

    <!-- 投稿ユーザ部分 -->
    <div class="row">
    	<img class="col-md-8 img-fluid show-photo" src="{{ asset('storage/' . $post->file_name) }}">
        <div class="col-md-3 offset-md-1">
        	<div class="row">
        	@if($post->user->user_image)
        		<img src="{{ asset('storage/icon/'. $post->user->user_image)}}" class="" style="width:100px; height:100px;  border-radius:100px;">
        	@else
        		<img src="{{ asset('storage/icon/person.png')}}" class="" style="width:100px; height:100px;  border-radius:100px;" >
        	@endif
        		<p class="col-md-2">{{$post->user->name}}</p>
        	</div>
        	<div class="row mt-5">
        		<div class="col-md-12">
    				<form method="get" action="/posts/{{$post->id}}/download">
    				<input type="submit" value="ダウンロード" class="form-control bg-success text-white" style="cursor: pointer;">
					</form>
				</div>
			</div>
    	</div>
	</div>

	<br>
	<div class="row">
		<div class="col-md-4">
		<p>コメント</p>
		</div>
	</div>
	@foreach($post->comments as $comment)
		<div class="row mt-3">
			<div class="col-md-1 pr-0 mr-0 pt-3 border-top"> 
        		<img src="{{ asset('storage/icon/'. $comment->user->user_image)}}" class="" style="width:50px; height:50px;  border-radius:100px;">
        	</div>
        	<div class="col-md-6 pl-0 ml-0 pt-3 border-top">
        		<div class="row"> 
        			<div class="col-md-12">
					{{$comment->user->name}}
					{{$comment->created_at}}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12"> 
					{{$comment->comment}}
					</div>
				</div>
			</div>
		</div>
	@endforeach
	<br>
	@auth
	<div class="row">
		<div class="col-md-5">
    		<form method="post" action="/comments">
    		@csrf
      		<input type="hidden" name="id" value="{{ $post->id }}"> 		
      		<textarea name="comment" rows="4" cols="49" class="form-control"></textarea>
    		<input type="submit" value="書き込む" class="form-control">
			</form>
		</div>
	</div>
	@else

	@endauth
</div>
@endsection
