<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex border-bottom-0">
        <h3>Edit Product</h3>
        <form class="my-auto ml-auto" action="{{ route('admin.products.destroy', $product->id) }}" method="post" x-data="{
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
          <button class="btn btn-danger btn-sm" x-on:click="onclick">
            Delete Product
          </button>
        </form>
      </div>
      <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs px-3" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'basic') active @endif"
              href="{{ route('admin.products.edit', $product->id) }}">Basic</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'cover') active @endif"
              href="{{ route('admin.products.edit', ['product' => $product->id, 'tab' => 'cover']) }}">Gambar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'video') active @endif"
              href="{{ route('admin.products.edit', ['product' => $product->id, 'tab' => 'video']) }}">Video</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        @if ($tab == 'basic')
          <x-admin.products.form-edit-basic :product="$product" />
        @endif
        @if ($tab == 'cover')
          <x-admin.products.form-edit-cover :product="$product" />
        @endif
        @if ($tab == 'video')
          <x-admin.products.form-edit-video :product="$product" />
        @endif
      </div>
    </div>
  </div>
</x-admin-layout>
