@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
@endpush
@section('content')


@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
            <a href="/users"><h6 class="card-title mb-0">{{__('المستخدمين')}}</h6></a>
              <div class="dropdown mb-2">
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <div class="d-flex align-items-baseline">
                  <p class="text-danger" style="font-size: 25px ; padding-top: 1rem;">
                    <span></span>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
              <a href="/users"><i class="mdi mdi-account-multiple" style="font-size: 50px ;padding-right: 35%;"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <a href="/providers"><h6 class="card-title mb-0">{{__('اصحاب العقارات')}} </h6></a>

            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <div class="d-flex align-items-baseline">
                  <p class="text-danger" style="font-size: 25px ; padding-top: 1rem;">
                    <span></span>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
              <a href="/providers"><i class="mdi mdi-account-multiple" style="font-size: 50px ;padding-right: 35%;"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div> <!-- row -->
<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
            <a href="/halls"><h6 class="card-title mb-0">{{__('الصالات')}}</h6></a>
              <div class="dropdown mb-2">
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <div class="d-flex align-items-baseline">
                  <p class="text-danger" style="font-size: 25px ; padding-top: 1rem;">
                    <span></span>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
              <a href="/halls"><i class="mdi mdi-bell-ring-outline" style="font-size: 50px ;padding-right: 35%;"></i></a> 
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <a href="/notifications"><h6 class="card-title mb-0">{{__('الاشعارات')}} </h6></a>

            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <div class="d-flex align-items-baseline">
                  <p class="text-danger" style="font-size: 25px ; padding-top: 1rem;">
                    <span></span>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
              <a href="/notifications"><i class="mdi mdi-bell-ring-outline" style="font-size: 50px ;padding-right: 35%;"></i> </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div> <!-- row -->
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush


@push('custom-scripts')
  <script src="{{ asset('assets/js/chartjs.js') }}"></script>
@endpush
