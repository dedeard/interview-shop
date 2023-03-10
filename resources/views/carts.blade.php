<x-app-layout>

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 m-0">SHOPPING CART</h2>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <livewire:cart-lists :user="Auth::user()" />
    </div>
  </section>
</x-app-layout>
