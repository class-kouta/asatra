@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="ml-3 d-flex align-items-center">
      <div>準備中...</div>
      {{-- <a href="{{ url()->previous() }}">前のページに戻る</a> --}}
      <button type="button" onClick="history.back()" class="btn btn-link">前のページに戻る</button>
    </div>
</div>
@endsection
