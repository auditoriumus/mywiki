<form class="col-12 mt-3" action="{{route('search')}}" method="post">
    @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Строка поиска">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Искать</button>
        </div>
</form>
