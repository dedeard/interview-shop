<x-admin-layout>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total User</span>
            <span class="info-box-number">{{ App\Models\User::count() }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="fas fa-wallet"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Product</span>
            <span class="info-box-number">{{ App\Models\Product::count() }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Order Pending</span>
            <span class="info-box-number">{{ App\Models\Order::where('status', 'pending')->count() }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Order Processed</span>
            <span class="info-box-number">{{ App\Models\Order::where('status', 'processed')->count() }}</span>
          </div>
        </div>
      </div>


      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Order Delivery</span>
            <span class="info-box-number">{{ App\Models\Order::where('status', 'delivery')->count() }}</span>
          </div>
        </div>
      </div>


      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Order Complete</span>
            <span class="info-box-number">{{ App\Models\Order::where('status', 'complete')->count() }}</span>
          </div>
        </div>
      </div>

    </div>

  </div>
</x-admin-layout>
