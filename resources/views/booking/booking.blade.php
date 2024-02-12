@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
@endpush
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />

@endpush
@section('content')
@if(session()->has('message'))
<p class="message-box" >
    {{ session()->get('message') }}
</p>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">{{__('الحجوزات')}}</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>{{__('hall name')}} [Ar]</th>
                <th>{{__('hall name')}} [En]</th>
                <th>{{__('first_name')}}</th>
                <th>{{__('last_name')}}</th>
                <th>{{__('time')}}</th>
                <th>{{__('type')}}</th>
                <th>{{__('luxury')}}</th>
                <th>{{__('size')}}</th>
                <th>{{__('total_price')}}</th>
                <th>{{__('created at')}}</th>
                <th class="action">{{__('option')}}</th>
              </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking['hall']->translate('ar')->name}}</td>
                    <td>{{$booking['hall']->translate('en')->name}}</td>
                    <td>{{$booking['user']->first_name}}</td>
                    <td>{{$booking['user']->last_name}}</td>
                    <td>{{$booking->time}}</td>
                    <td>{{$booking['category']->type}}</td>
                    <td>@if($booking->luxury == 1) {{__('selver')}}@elseif($booking->luxury == 2){{__('selver')}}@endif</td>
                    <td>{{$booking->size}}</td>
                    <td>{{$booking->total_price}}</td>
                    <td>{{$booking->created_at}}</td>
                    <td class="action"> 
                        <a  title="{{__('delete')}}" href="/deleteBooking/{{$booking->id}}"><i data-feather="trash"></i></i></a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush