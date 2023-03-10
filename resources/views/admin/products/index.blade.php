<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Products</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">Create Product</a>
        </div>
      </div>
      <div class="card-body">
        <form>
          <div class="input-group">
            <input type="search" name="search" value="{{ request()->get('search') }}" class="form-control form-control-lg"
              placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-lg btn-default">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Last Update</th>
              <th class="text-center" style="width: 100px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td class="align-middle">{{ $product->id }}</td>
                <td class="align-middle">{{ $product->name }}</td>
                <td class="align-middle">Rp {{ number_format($product->price, 2) }}</td>
                <td class="align-middle">{{ $product->updated_at->diffForHumans() }}</td>
                <td class="text-center py-0 align-middle">
                  <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-default btn-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        {{ $products->links() }}
      </div>
    </div>
  </div>
</x-admin-layout>
