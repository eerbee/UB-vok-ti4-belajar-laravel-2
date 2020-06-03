<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Bernd</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Be</a>
    </div>
    <ul class="sidebar-menu">
      @if(auth()->user()->role == 'admin')
        <li class="">
          <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-chart-line"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a class="nav-link" href="{{url('/fakultas')}}">
            <i class="far fa-building"></i><span>Fakultas</span>
          </a>
        </li>
        <li class="">
          <a class="nav-link" href="{{url('/jurusan')}}">
            <i class="fas fa-book-reader"></i><span>Jurusan</span>
          </a>
        </li>
        <li class="">
          <a class="nav-link" href="{{url('/ruangan')}}">
            <i class="fab fa-houzz"></i><span>Ruangan</span>
          </a>
        </li>
        <li class="">
          <a class="nav-link" href="{{url('/barang')}}">
            <i class="fas fa-pencil-ruler"></i><span>Barang</span>
          </a>
        </li>
      @endif  
      @if(auth()->user()->role == 'staff')
        <li class="">
          <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-chart-line"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a class="nav-link" href="{{url('/barang')}}">
            <i class="fas fa-pencil-ruler"></i><span>Barang</span>
          </a>
        </li>
      @endif 
    </ul>
  </aside>
</div>