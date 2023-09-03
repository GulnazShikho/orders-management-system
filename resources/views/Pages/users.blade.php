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


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.UserName')}}</th>
                                <th>{{trans('main_trans.Email')}}</th>
                                <th>{{trans('main_trans.Roles')}}</th>
                                <th>{{trans('Orders_Trans.Processes')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $key => $user )
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role_name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $user->id }}"
                                                title="{{ trans('Orders_Trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_Order-->
                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                   id="exampleModalLabel">
                                                   {{ trans('main_trans.edituser') }}
                                               </h5>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">

                                               <form action="{{route('users.update', $user->id)}}"  method="post">
                                                   {{method_field('patch')}}
                                                   @csrf
                                                   <div class="row">
                                                   <div class="col">
                                                    <div class="form-group">
                                                        <label for="role_name"> {{ trans('main_trans.Roles') }} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="role_name">
                                                            <option selected disabled>{{trans('Orders_Trans.Choose')}}...</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->name }}"{{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }} >{{ $role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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




       @endforeach
     </table>
   </div>
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
