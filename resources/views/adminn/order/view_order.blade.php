@extends('adminn.admin_master')
@section('admin_content')

    <div class="row" >

        <div class="invoice">
            <a role="button" class="btn btn-info" href="#" style="float: right;">Invoice</a>
        </div>

    </div>

    <br>
    <div class="row-fluid sortable">
        <div class="box span5">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Information</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Mobile No</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$orders->customer->name}}</td>
                        <td class="center">{{$orders->customer->phone}}</td>


                    </tr>


                    </tbody>
                </table>

            </div>
        </div><!--/span-->




        <div class="box span7">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Shipping Address</th>
                        <th>Mobile No</th>
                        <th>Email Address</th>
                        <th>Payment Method</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$orders->shipping->name}}</td>
                        <td class="center">{{$orders->shipping->address}}</td>
                        <td class="center">{{$orders->shipping->phone}}</td>
                        <td class="center">{{$orders->shipping->email}}</td>
                        <td class="center">{{$orders->payment->payment_method}}</td>

                    </tr>



                    </tbody>
                </table>


            </div>
        </div><!--/span-->




        <div class="box span12" style="margin-left: auto;">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_by_id as $order_id)
                    <tr>
                        <td>{{$order_id->order_id}}</td>
                        <td class="center">{{$order_id->product_name}}</td>
                        <td class="center">&#2547; {{$order_id->product_price}}</td>
                        <td class="center">{{$order_id->product_sales_qnty}}</td>
                        <td class="center"> &#2547; {{$order_id->product_price*$order_id->product_sales_qnty}}</td>
                    </tr>
                    @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="4" style="font-size: 20px;font-weight: 521;text-align: right; color: red"> Total Amount to pay</td>
                        <td><strong style="font-size: 20px; color: #007cff;">&#2547; {{$orders->total}} +&#2547;50</strong></td>
                    </tr>
                    </tfoot>
                </table>


            </div>
        </div><!--/span-->


    </div><!--/row-->

@endsection
view_order.txt
Displaying view_order.txt.
