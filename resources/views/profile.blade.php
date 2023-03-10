<x-app-layout>

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 mb-3">PROFILE</h2>
      <form class="text-center" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">LOG OUT</button>
      </form>
    </div>
  </div>

  <section class="pb-5 pt-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto">
          <div class="card mb-4">
            <div class="card-header">Edit Profile</div>
            <form class="card-body" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  placeholder="Name" value="{{ Auth::user()->name }}">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" readonly value="{{ Auth::user()->email }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </form>
          </div>

          <div class="card">
            <div class="card-header">Edit Password</div>
            <form class="card-body" method="POST" action="{{ route('profile.update.password') }}">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="password">New password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                  placeholder="New password">
                @error('password')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password-confirm">Confirm new password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                  placeholder="Confirm new password">
              </div>

              <div class="form-group">
                <label for="current_password">Current password</label>
                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                  name="current_password" placeholder="Current password">
                @error('current_password')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
