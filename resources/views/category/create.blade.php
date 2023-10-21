<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>