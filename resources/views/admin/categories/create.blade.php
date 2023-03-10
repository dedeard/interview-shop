<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Create New Category</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              placeholder="Nama..." value="{{ old('name') }}">
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Category</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-admin-layout>
