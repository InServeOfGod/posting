<form class="col-1 d-inline-block" action="{{ route('posts.destroy', $datum->id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-danger fw-bold col-12">Delete</button>
</form>
