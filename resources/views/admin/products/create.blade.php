<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Create Product</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama"
              value="{{ old('name') }}">
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Category</label>
            <select class="form-control select2 @error('category') is-invalid @enderror" name="category" style="width: 100%;">
              <option disabled selected value="">Select Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <div class="input-group @error('price') is-invalid @enderror"">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
              </div>
              <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
              <div class="input-group-append">
                <span class="input-group-text">000.00</span>
              </div>
            </div>
            @error('price')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea id="summernote" name="description">
              {{ old('description') }}
            </textarea>
            @error('description')
              <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-admin-layout>
