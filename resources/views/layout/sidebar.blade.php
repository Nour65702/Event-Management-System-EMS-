@push('plugin-styles')
  <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
@endpush
<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
    <span>p</span>arty
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
    <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ url('/home') }}" class="nav-link">
        <i  data-feather="box"></i>
          <span class="link-title">{{__('Main')}}</span>
        </a>
      </li>
      <li class="nav-item nav-category">user</li>
      <li class="nav-item">
        <a href="{{ url('/users') }}" class="nav-link">
        <i  data-feather="box"></i>
          <span class="link-title">{{__('user')}}</span>
        </a>
      </li>

      <li class="nav-item nav-category">{{__('providers')}}</li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="" aria-controls="email">
        <i class="mdi mdi-account"></i>
          <span class="link-title">{{__('providers')}}</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="users">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="/providers" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">  {{__('providers')}}</a>
            </li>
            <li class="nav-item">
              <a href="/requestProvider" class="nav-link {{ (request()->is('requestProvider')) ? 'active' : '' }}">  {{__('request provider')}}</a>
            </li>
            <li class="nav-item">
              <a href="/blocked" class="nav-link {{ (request()->is('blocked')) ? 'active' : '' }}">  {{__('blocked provider')}}</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">{{__('reservations')}}</li>
      <li class="nav-item">
        <a href="{{ url('/bookings') }}" class="nav-link">
        <i class="mdi mdi-calendar-clock"></i>
          <span class="link-title">{{__('reservations')}}</span>
        </a>
      </li>
      <li class="nav-item nav-category">{{__('reviews')}}</li>
      <li class="nav-item">
        <a href="{{ url('/reviews') }}" class="nav-link">
        <i class="mdi mdi-calendar-clock"></i>
          <span class="link-title">{{__('reviews')}}</span>
        </a>
      </li>
      <li class="nav-item nav-category">{{__('halls')}}</li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#hall" role="button" aria-expanded="" aria-controls="email">
        <i class="mdi mdi-account"></i>
          <span class="link-title">{{__('halls')}}</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="hall">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="/halls" class="nav-link {{ (request()->is('halls')) ? 'active' : '' }}">  {{__('halls')}}</a>
            </li>
            <!-- <li class="nav-item">
              <a href="/requestProvider" class="nav-link {{ (request()->is('requestProvider')) ? 'active' : '' }}">  {{__('request provider')}}</a>
            </li> -->
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">notifications</li>
      <li class="nav-item">
        <a href="{{ url('/notifications') }}" class="nav-link">
        <i  class="mdi mdi-bell-ring-outline"></i>
          <span class="link-title">{{__('notifications')}}</span>
        </a>
      </li>
      <li class="nav-item nav-category">cities</li>
      <li class="nav-item">
        <a href="{{ url('/cities') }}" class="nav-link">
        <i  class="mdi mdi-bell-ring-outline"></i>
          <span class="link-title">{{__('cities')}}</span>
        </a>
      </li>
      <li class="nav-item nav-category">{{__('logout')}}</li>
      <li class="nav-item ">
      <a class="nav-link" href="/logout">
        <i class="fas fa-power-off"></i>
        <span class="link">
          {{__('logout')}}
        </span>
      </a>
      </li>
    </ul>
  </div>
</nav>
