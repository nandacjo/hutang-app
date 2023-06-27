<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">Warung Unyak</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="/dashboard">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Beranda</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('daftar-hutang*') ? 'active' : '' }}">
        <a class="sidebar-link" href="/daftar-hutang">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Daftar Hutang</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('pelanggan.index') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pelanggan</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('transaksi.index') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">Transaksi</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('kategori.index') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">Kategori</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="pages-sign-in.html">
          <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Product</span>
        </a>
      </li>

      <li class="sidebar-header">
        Master Data
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="pages-sign-in.html">
          <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Transaksi</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="pages-sign-in.html">
          <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Laporan Bulanan</span>
        </a>
      </li>
    </ul>

  </div>
</nav>
