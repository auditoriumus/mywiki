@extends('layouts.app')
<div class="container">
    @section('content')
        @include('forms.search')
        @include('results.results')
        @include('forms.add')
    @endsection
</div>
