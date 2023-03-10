<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Users</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Create User</a>
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
              <th>Email</th>
              <th>Admin</th>
              <th>Last update</th>
              <th>Registered at</th>
              <th class="text-center" style="width: 120px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td class="align-middle">{{ $user->id }}</td>
                <td class="align-middle">{{ $user->name }}</td>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">{{ $user->is_admin ? 'YES' : 'NO' }}</td>
                <td class="align-middle">{{ $user->updated_at->diffForHumans() }}</td>
                <td class="align-middle">{{ $user->created_at->format('M/d/Y') }}</td>
                <td class="text-center py-0 align-middle">
                  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-default btn-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post" x-data="{
                      onclick(e) {
                          e.preventDefault()
                          this.$store.deleteConfirm(() => {
                              this.$refs.formDeletePost.requestSubmit()
                          })
                      }
                  }"
                    x-ref="formDeletePost" method="POST">
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
      </div>
      <div class="card-footer">
        {{ $users->links() }}
      </div>
    </div>
  </div>
</x-admin-layout>
