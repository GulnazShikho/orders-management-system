@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Orders_Trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Orders')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @can('Add Order')
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Orders_Trans.add_Order') }}
                    </button>
                    @endcan
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('Orders_Trans.Order_Title')}}</th>
                                <th>{{trans('Orders_Trans.Order')}}</th>
                                <th>{{trans('Orders_Trans.Notes')}}</th>
                                <th>{{trans('Orders_Trans.Status')}}</th>
                                <th>{{trans('Orders_Trans.Processes')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($orders as $Order)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $Order->OrderTitle }}</td>
                                    <td>{{ $Order->order }}</td>
                                    <td>{{ $Order->notes }}</td>
                                    <td>{{ $Order->status ?->StatusName}}</td>

                                    <td>
                                        @can('Edit Order')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Order->id }}"
                                                title="{{ trans('Orders_Trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        @endcan
                                        @can('Delete Order')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Order->id }}"
                                                title="{{ trans('Orders_Trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                        @endcan
                                    </td>
                                </tr>
                                <!-- edit_modal_Order -->
                                <div class="modal fade" id="edit{{ $Order->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                   id="exampleModalLabel">
                                                   {{ trans('Orders_Trans.edit_Order') }}
                                               </h5>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <!-- add_form -->
                                               <form action="{{route('userorders.update','test')}}" method="post">
                                                   {{method_field('patch')}}
                                                   @csrf
                                                   <div class="row">
                                                       <div class="col">
                                                           <label for="OrderTitle"
                                                                  class="mr-sm-2">{{ trans('Orders_Trans.Order_Title') }}
                                                               :</label>
                                                           <input id="OrderTitle" type="text" name="OrderTitle"
                                                                  class="form-control"
                                                                  value="{{$Order->OrderTitle}}"
                                                                  required>
                                                           <input id="id" type="hidden" name="id" class="form-control"
                                                                  value="{{ $Order->id }}">
                                                       </div>
                                                       @can('Add Notes to the order')
                                                       <div class="col">
                                                           <label for="notes"
                                                                  class="mr-sm-2">{{ trans('Orders_Trans.Notes') }}
                                                               :</label>
                                                           <input id="notes" type="text" class="form-control"
                                                                  value="{{$Order->notes}}"
                                                                  name="notes">
                                                       </div>
                                                       @endcan
                                                   </div>
                                                   <div class="form-group">
                                                       <label
                                                           for="order"> {{ trans('Orders_Trans.Order') }}
                                                           :</label>
                                                       <textarea class="form-control" name="order"
                                                                 id="order"
                                                                 rows="3">{{ $Order->order }}</textarea>
                                                   </div>
                                                   @can('Edit order Status')
                                                   <div class="col">
                                                    <div class="form-group">
                                                        <label for="status_id">{{trans('Orders_Trans.Status')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="status_id">
                                                            <option selected disabled>{{trans('Orders_Trans.Choose')}}...</option>
                                                            @foreach($order_statuses as $OrderStatus)
                                                                <option value="{{ $OrderStatus->id }}"  >{{ $OrderStatus->StatusName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endcan
                                                </div>
                                                   <br><br>

                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary"
                                                               data-dismiss="modal">{{ trans('Orders_Trans.Close') }}</button>
                                                       <button type="submit"
                                                               class="btn btn-success">{{ trans('Orders_Trans.submit') }}</button>
                                                   </div>
                                               </form>

                                           </div>
                                       </div>
                                   </div>
                               </div>


 <!-- delete_modal_Order-->
<div class="modal fade" id="delete{{ $Order->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('Orders_Trans.delete_Order') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('userorders.destroy','test')}}" method="post">
                    {{method_field('Delete')}}
                    @csrf
                    {{ trans('Orders_Trans.Warning_Order') }}
                    <input id="id" type="hidden" name="id" class="form-control"
                           value="{{ $Order->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                          data-dismiss="modal">{{ trans('Orders_Trans.Close') }}</button>
                        <button type="submit"
                           class="btn btn-danger">{{ trans('Orders_Trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

       @endforeach
     </table>
   </div>
  </div>
 </div>
</div>


 <!-- add_modal_Order -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('Orders_Trans.add_Order') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{route('userorders.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="OrderTitle"
                                           class="mr-sm-2">{{ trans('Orders_Trans.Order_Title') }}
                                        :</label>
                                    <input id="OrderTitle" type="text" name="OrderTitle" class="form-control">
                                </div>
                                @can('Add Notes to the order')
                                <div class="col">
                                    <label for="notes"
                                           class="mr-sm-2">{{ trans('Orders_Trans.Notes') }}
                                        :</label>
                                    <input id="notes" type="text" class="form-control" name="notes">
                                </div>
                                @endcan
                            </div>
                            <div class="form-group">
                                <label
                                    for="order">{{ trans('Orders_Trans.Order') }}
                                    :</label>
                                <textarea class="form-control" name="order" id="order"
                                          rows="3"></textarea>
                            </div>
                            @can('Edit order Status')
                            <div class="col">
                                <div class="form-group">
                                    <label for="status_id">{{trans('Orders_Trans.Status')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="status_id">
                                        <option selected disabled>{{trans('Orders_Trans.Choose')}}...</option>
                                        @foreach($order_statuses as $OrderStatus)
                                            <option value="{{ $OrderStatus->id }}">{{ $OrderStatus->StatusName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endcan
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Orders_Trans.Close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('Orders_Trans.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
