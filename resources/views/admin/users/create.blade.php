<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Create New User</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name"
              value="{{ old('name') }}">
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
              placeholder="Email" value="{{ old('email') }}">
            @error('email')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
              placeholder="password">
            @error('password')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" @if (old('is_admin') == 'on') checked @endif>
            <label class="form-check-label" for="is_admin">Make this user admin</label>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Create User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-admin-layout>
