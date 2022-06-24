@extends('layouts.app')

@section('content')
<div class="is-container-column">
    @include('components.post_confirm')

    @component('components.profilebar')
    @endcomponent

</div>
@endsection
