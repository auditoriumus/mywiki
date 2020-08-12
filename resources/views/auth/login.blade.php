@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="col-4 offset-4 my-3" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="Password">Пароль:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection
