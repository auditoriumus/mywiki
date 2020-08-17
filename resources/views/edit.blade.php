@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('data.update', $result['id']) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="@php echo $result['title'] @endphp">
            </div>
            <div class="form-group">
                <label for="note">Заметка</label>
                <textarea class="form-control" id="note" name="note" rows="20">@php echo $result['note'] @endphp</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
