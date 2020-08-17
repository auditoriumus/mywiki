@extends('layouts.app')
<div class="container">
    @section('content')
        @include('forms.search')
        @include('results.results')
        @if(Auth::user()->email == 'um_2005@mail.ru')
            @include('forms.add')
        @endif
    @endsection
</div>
