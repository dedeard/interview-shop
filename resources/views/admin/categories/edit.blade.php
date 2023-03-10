<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Edit Category</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              placeholder="Nama..." value="{{ $category->name }}">
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit Category</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-admin-layout>
