<form class="col-12 mt-3" action="{{route('data.store')}}" method="post">
    @csrf
    <div class="form-group">
        <input class="form-control" name="title" placeholder="Название статьи" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="note" placeholder="Статья для добавления"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
