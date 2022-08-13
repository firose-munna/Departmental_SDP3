@extends('adminn.admin_master')
@section('admin_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Subcategory</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/sub-categories/')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Subcategory Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Category Name</label>
                            <div class="control">
                                <select name="category" style="margin-left: 20px;">

                                    <option>Select Category</option>

                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Subcategory Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required></textarea>
                            </div>

                        </div>



                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Subcategory</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
