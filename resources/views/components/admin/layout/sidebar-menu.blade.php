@php
  $menu = [
      [
          [
              'name' => 'Dashboard',
              'route' => 'admin.dashboard',
              'is' => 'admin.dashboard',
              'icon' => 'tachometer-alt',
          ],
          [
              'name' => 'Users',
              'route' => 'admin.users.index',
              'is' => 'admin.users*',
              'icon' => 'users',
          ],
      ],
      [
          [
              'name' => 'Products',
              'route' => 'admin.products.index',
              'is' => 'admin.products*',
              'icon' => 'suitcase',
          ],
          [
              'name' => 'Categories',
              'route' => 'admin.categories.index',
              'is' => 'admin.categories*',
              'icon' => 'list',
          ],
      ],
  ];
  $x = true;
@endphp

@foreach ($menu as $group)
  @if ($x)
    @php
      $x = false;
    @endphp
  @else
    <li class="py-3"></li>
  @endif
  @foreach ($group as $link)
    @if (isset($l['can']))
      @can($link['can'])
        <li class="nav-item">
          <a href="{{ route($link['route']) }}" class="nav-link @if (Route::is($link['is'])) active @endif">
            <i class="nav-icon fas fa-{{ $link['icon'] }}"></i>
            <p>
              {{ $link['name'] }}
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>
      @endcan
    @else
      <li class="nav-item">
        <a href="{{ route($link['route']) }}" class="nav-link @if (Route::is($link['is'])) active @endif">
          <i class="nav-icon fas fa-{{ $link['icon'] }}"></i>
          <p>
            {{ $link['name'] }}
            {{-- <span class="right badge badge-danger">New</span> --}}
          </p>
        </a>
      </li>
    @endif
  @endforeach
@endforeach
