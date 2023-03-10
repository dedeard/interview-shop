@props(['product', 'categories' => App\Models\Category::all()])

<form action="{{ route('admin.products.update', $product->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama"
      value="{{ $product->name }}">
    @error('name')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label>Category</label>
    <select class="form-control select2 @error('category') is-invalid @enderror" name="category" style="width: 100%;">
      <option disabled selected value="">Select Category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
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
      <input type="text" id="price" name="price" class="form-control" value="{{ $product->price / 1000 }}">
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
      {{ $product->description }}
    </textarea>
    @error('description')
      <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update Product</button>
  </div>
</form>
