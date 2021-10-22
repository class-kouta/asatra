@extends('layouts.app')

@section('content')
<div class="container">
  <div class="btn-group">
      <form action="{{ route('users.destroy',Auth::user()->id ) }}" method="post">
      @csrf
        <button type="submit" class="btn btn-primary">退会</button>
      </form>

      <div class="ml-3">
        <a href="/" class="btn btn-primary">キャンセルする</a>
      </div>
  </div>
</div>
@endsection
