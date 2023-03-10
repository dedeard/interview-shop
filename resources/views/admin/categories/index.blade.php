<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Categories</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">Create Category</a>
        </div>
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nama</th>
            <th class="text-center" style="width: 120px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td class="align-middle">{{ $category->name }}</td>
              <td class="text-center py-0 align-middle">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-default btn-sm" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
                  x-data="{
                      onclick(e) {
                          e.preventDefault()
                          this.$store.deleteConfirm(() => {
                              this.$refs.formDeletePost.requestSubmit()
                          })
                      }
                  }" x-ref="formDeletePost" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm btn-icon" x-on:click="onclick">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="card-footer">
        {{ $categories->links() }}
      </div>
    </div>
  </div>
</x-admin-layout>
