@extends('admin.master')
@section('title')
    invoice
@endsection
@section('body')

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>

    <div class="row">
        <div class="col-12 mt-2 mb-3">
            <h4 class="text-center"> Invoice</h4>
            <hr>
            <div class="invoice-box">
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img
                                            src="{{asset('/')}}upload/dummy.jpg"
                                            style="width: 100%; max-width: 100px"
                                        />
                                    </td>

                                    <td>

                                        Invoice #: 0000{{$order->id}}<br/>
                                        @if($order->created_at)
                                            Order Created:{{$order->created_at}}<br/>
                                        @else
                                            Order Created:{{$order->order_date}}<br/>
                                        @endif
                                        Invoice Date: {{date('Y-m-d')}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        <h4><u>Delivery Information</u></h4>

                                        {{$order->customer->name}}<br>
                                        {{$order->customer->mobile}}<br>
                                        {{$order->delivery_address}}<br/>
                                    </td>

                                    <td>
                                        <h4><u>Company Information</u></h4>

                                       My Commerce Limited<br/>
                                         Badda ,Dhaka-1212<br/>
                                        contact.mycommerce@gmail.com
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>Payment Method</td>

                        <td>Amount</td>
                    </tr>

                    <tr class="details">
                        <td>{{$order->payment_type == 1 ?'Cash on delivery':'Online'}}</td>

                        <td>{{$order->order_total}} .BDT</td>
                    </tr>
                    <tr>
                    <tr class="heading">
                        <td>Order Information</td>
                        <td></td>
                    </tr>
                </table>
                <table class="table mt-2 table-bordered table-responsive-sm" style="border: 1px solid black">

                    @php($i=1)
                    <thead class="text-center">
                        <th>Sl</th>
                        <th>product name</th>
                        <th>product price</th>
                        <th>product quantity</th>
                        <th class="text-end">total amount(BDT)</th>
                    </thead>

                    @foreach($order->orderDetails as $orderDetail)
                        <tbody class="text-center">

                            <td>{{$i++}}</td>
                            <td class="text-center"> {{$orderDetail->product_name}}</td>
                            <td>{{$orderDetail->product_price}} tk.</td>
                            <td>{{$orderDetail->product_qty}}</td>
                            <td class="text-end">{{$orderDetail->product_price*$orderDetail->product_qty}} .Tk</td>
                        </tbody>
                    @endforeach
                    <tr>
                        <td class="text-end" Colspan="4">Tax (5%)</td>
                        <td class="text-end">{{$order->tax_total}} .Tk</td>
                    </tr>
                    <tr>
                        <td class="text-end" Colspan="4">Shipping Cost</td>
                        <td class="text-end">{{$order->shipping_total}} .Tk</td>
                    </tr>
                    <tr>
                        <td class="text-end" Colspan="4"><b>Total Cost</b></td>
                        <td class="text-end ">{{$order->order_total}} .Tk</td>
                    </tr>

                </table>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <p> Prepared By</p>

                        <hr>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-3">
                        <p class="text-end">Received by</p>
                        <hr>
                    </div>
                </div>
                <h6 class="text-center pt-3">Thank You  Happy shopping</h6>
            </div>
        </div>
    </div>
@endsection
