@extends('adminn.admin_master')
@section('admin_content')

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <p class="alert-success">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>

                </p>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 10%";>ID</th>
                        <th style="width: 20%";>Brand Name</th>
                        <th style="width: 40%";>Description</th>
                        <th style="width: 10%";>Status</th>
                        <th style="width: 20%";>Actions</th>
                    </tr>
                    </thead>

                    @foreach($brands as $brand)
                        <tbody>
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td class="center">{{$brand->name}}</td>
                            <td class="center">{{$brand->description}}</td>

                            <td class="center">
                                @if($brand->status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Deactive</span>
                                @endif
                            </td>
                            <td class="row">
                                <div class="span3"></div>
                                <div class="span2">
                                    @if($brand->status==1)
                                        <a href="{{url('/brand-status'.$brand->id)}}" class="btn btn-success" >
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @else
                                        <a href="{{url('/brand-status'.$brand->id)}}" class="btn btn-danger" >
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="span2">
                                    <a class="btn btn-info" href="{{url('/brands/'.$brand->id.'/edit')}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a></div>
                                <div class="span2">
                                    <form method="post" action="{{url('/brands/'.$brand->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"> <i class="halflings-icon white trash"></i></button>


                                    </form>
                                </div>
                                <div class="span3"></div>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection
