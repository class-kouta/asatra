@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.edit',['id' => $post->id]) }}">編集</a>
    <ul>
        <li><h4>{{ $post->title }}<h4></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
        <li>{{ $post->choose_yes }}</li>
        <li>{{ $post->choose_no }}</li>
        <li>{{ $post->note }}</li>
    </ul>

</div>
@endsection
