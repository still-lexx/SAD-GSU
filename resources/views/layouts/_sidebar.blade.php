<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
          <span class="align-middle">GSU Security System</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
        @can('admin')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('home')}}">
                  <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
        @endcan
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('case')}}">
                  <i class="align-middle" data-feather="file"></i> <span class="align-middle">Cases</span>
                </a>
            </li>
      @cannot('admin')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('newcase')}}">
                  <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">New Case</span>
                </a>
            </li>
        @endcannot
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('settings')}}">
                  <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
            </li>
            @can('admin')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('users')}}">
                  <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</nav>