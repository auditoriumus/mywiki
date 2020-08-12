@extends('layouts.app')

@section('content')
    <div class="container bg-light my-3 card">
        <div class="card-header">@php echo date('d.m.Y', strtotime($result['updated_at'])) @endphp</div>
        <div class="card-body">
            <h5 class="card-title">@php echo $result['title'] @endphp</h5>
            <p class="card-text">@php echo $result['note'] @endphp</p>
        </div>
        <a href="{{ route('data.edit', $result['id']) }}" class="btn btn-secondary">Изменить</a>
        <div class="row">
        <form class="col-12" action="{{ route('data.destroy', $result['id']) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="col-12 btn btn-danger">Удалить</button>
        </form>
        </div>
    </div>
@endsection
