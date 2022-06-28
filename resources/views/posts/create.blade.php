@extends('layouts.app')

@section('content')
<div class="is-container-column">
    @include('components.post', ['post' => null])

    @component('components.profilebar')
    @endcomponent

</div>
@endsection
