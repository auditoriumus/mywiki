@if(!empty($search_result))
    <div class="col-12">
        @foreach($search_result as $search_item)
            <a href="{{ route('data.show', $search_item['id']) }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">@php echo $search_item['title']; @endphp</h5>
                    <small>@php echo date('d.m.Y', strtotime($search_item['updated_at'])); @endphp</small>
                </div>
                <p class="mb-1">@php echo $search_item['note']; @endphp</p>
            </a>
        @endforeach
    </div>
@endif
