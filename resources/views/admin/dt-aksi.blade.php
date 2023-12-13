<form action="{{ route('curah-hujan.destroy', $model->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a href="{{ route('curah-hujan.edit', $model->id) }}" class="btn btn-secondary">Edit</a>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </div>
</form>
