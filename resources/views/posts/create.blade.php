@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('components.post', ['post' => null])

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
