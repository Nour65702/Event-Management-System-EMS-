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
        <h6 class="card-title">{{__('hall')}}</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>{{__('name')}} [Ar]</th>
                <th>{{__('name')}} [En]</th>
                <th>{{__('location')}}</th>
                <th>{{__('type')}}</th>
                <th>{{__('star')}}</th>
                <th>{{__('provider name')}}</th>
                <th>{{__('provider email')}}</th>
                <th>{{__('city name')}}</th>
                <th>{{__('rate')}}</th>
                <th>{{__('created_at')}}</th>
                <th class="action">{{__('option')}}</th>
              </tr>
            </thead>
            <tbody>
                @foreach($halls as $hall)
                <tr>
                    <td>{{$hall->translate('ar')->name}}</td>
                    <td>{{$hall->translate('en')->name}}</td>
                    <td>{{$hall->location}}</td>
                    <td>{{$hall->type}}</td>
                    <td>{{$hall->star}}</td>
                    <td>{{$hall['provider']->first_name}}</td>
                    <td>{{$hall['provider']->email}}</td>
                    <td>{{$hall['city']->name}}</td>
                    <td>{{$hall->rate}}</td>
                    <td>{{$hall->created_at}}</td>
                    <td class="action"> 
                        <a  title="{{__('more details')}}" href="/moreDetails/{{$hall->id}}"> <i data-feather="eye"></i></i></a>
                        <a  title="{{__('delete')}}" href="/deleteHall/{{$hall->id}}"><i data-feather="trash"></i></i></a>
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