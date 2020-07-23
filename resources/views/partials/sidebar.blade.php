<div class="sidebar" data-color="green" data-background-color="white">
  <!--
  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

  Tip 2: you can also add an image using data-image tag -->
  <div class="logo text-center">
{{--    <a href="{{ route('home') }}" class="simple-text logo-mini">--}}
{{--      <img src="{{ asset('assets/img/tray.svg') }}" alt="">--}}
{{--    </a>--}}
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      <img src="{{ asset('assets/img/tray.svg') }}" alt="">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <!-- your sidebar here -->
    <ul class="nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('vendors.index') }}">
          <i class="material-icons">person</i>
          <p>Vendedores</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sales.index') }}">
          <i class="material-icons">receipt</i>
          <p>Vendas</p>
        </a>
      </li>
    </ul>
  </div>
</div>