
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle Permit</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .subpage{
            height: 500px;
            width: 100%;
            background-image: url('https://omniitworld.com/demo/verification/public/letterpad/eng.png');
            background-size: 100% 100%;
            background-position: center center;
            background-repeat: no-repeat;
            position: relative;
            z-index: 5;
        }
        @media  print {
            body .subpage {
                background-image: url('https://omniitworld.com/demo/verification/public/letterpad/eng.png');
                background-size: 100% 100%;
                background-repeat: no-repeat;
            }
        }



        .btn-warning{
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;

            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-success{
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;

            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }
        .header-panel{
            text-align: center;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            /*min-height: 25cm;*/
            padding: 1cm;
            margin: 1cm auto;
            padding-top: 0.5cm;
            padding-bottom: 0.5cm;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);




        }

        .header-panel{
            max-height: 90px;
        }

        .subpage {
        // padding: 1cm;
        //  border: 5px #f3f3f3 solid;
            /*height: 256mm;*/
            min-height: 27.7cm;
            outline: 1cm #fffff solid;
        }
        .extra-details{
            min-height: 130px;
        }
        .hide-print{

        }
        .table>thead>tr>th{
            vertical-align: top;
        }
        @page  {
            size: A4;
            margin: 0;
        }

        @media  print {
            .page {
                margin: 0;
                border: initial;
                /*border-radius: initial;*/
                /*width: initial;*/
                /*min-height: initial;*/
                /*box-shadow: initial;*/
                /*background: initial;*/
                /*page-break-after: always;*/
            }
            .hide-print{
                display: none;
            }

            .darta-number{
                display: inline-table;
                width: 32%;
                /*border: solid 1px red;*/
            }
            .extra-details{
                display: inline;
                min-height: 5cm;
            }
            .print-clear{
                clear: both;
                min-height: 2cm;
            }
        }
    </style>
    <style>

        /*@import  url(https://fonts.googleapis.com/css?family=Lato);*/
        *{border:0;padding:0;margin:0;background:50% 50% no-repeat;text-decoration:none;color:inherit;box-sizing:border-box;font-weight:400}
        :focus{outline:0}
        b,b *,strong,strong *{font-weight:700}
        ol,ul{list-style:none}
        button,input,input:not([type]),input[type=color],input[type=text],input[type=time],input[type=url],input[type=week],input[type=button],input[type=reset],input[type=submit],input[type=date],input[type=datetime],input[type=datetime-local],input[type=email],input[type=month],input[type=number],input[type=password],input[type=search],input[type=tel],pre,select,textarea{font:inherit}
        .codepen body{margin:10px 0 0}
        .codepen body textarea{display:none}
        .mce-container textarea{display:inline-block!important}
        .mce-content-body{font-family:Lato!important;font-size:14px;color:#626262;padding:0 25px 25px}
        .mce-content-body h1,.mce-content-body h2,.mce-content-body h3,.mce-content-body h4,.mce-content-body h5,.mce-content-body h6{font-family:aileron;font-weight:200;line-height:1.4em;margin:25px 0 15px}
        .mce-content-body *{background-position:initial}
        .mce-content-body h1{font-size:34px}
        .mce-content-body h2{font-size:30px}
        .mce-content-body h3{font-size:26px}
        .mce-content-body h4{font-size:22px}
        .mce-content-body h5{font-size:18px}
        .mce-content-body h6{font-size:14px}
        .mce-content-body p{margin:25px 0}
        .mce-content-body ol,.mce-content-body ul{margin-left:15px;list-style-position:outside;margin-bottom:20px}
        .mce-content-body ol li,.mce-content-body ul li{margin-left:10px;margin-bottom:10px;color:#626262}
        .mce-content-body ul{list-style-type:disc}
        .mce-content-body ol{list-style-type:decimal}
        .mce-content-body a[href]{text-decoration:underline}
        .mce-content-body table{width:100%;border-spacing:0;border-collapse:separate;border:1px solid #aaa}
        .mce-content-body table tr:nth-child(even){background:#FAFAFA}
        .mce-content-body table caption,.mce-content-body table td,.mce-content-body table th{padding:15px 7px;font:inherit}
        .mce-content-body table th{font-weight:400;color:#6E6E6E;background-position:100% 100%;background-size:2px 10px;background-repeat:no-repeat}
        .mce-content-body table th:last-child{background:0 0}
        .mce-content-body table td{border:1px solid #aaa}
        .mce-content-body hr{border-top:2px solid #BBB}
        @media  print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<div class="book">
    <div class="page">
        <div class="subpage" >
            <form class="mce-content-body">
                <h1 style="text-align: center;">&nbsp;</h1>
                <h1 style="text-align: center;">&nbsp;</h1>
                <div class="row">

                </div>

                <h2 style="text-align: center;"> Non Official Fuel</h2>
                <table>
                    <tbody>
                    <tr>
                        <td><strong>Date</strong></td>
                        <td><strong>{{$entry->date}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>{{$entry->name}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Organization</strong></td>
                        <td><strong>{{$entry->organization}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Vehicle No</strong></td>
                        <td><strong>{{$entry->vehicle_no}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Month</strong></td>
                        <td><strong>{{config('custom.nepali_months')[$entry->month_id]}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Mode</strong></td>
                        <td><strong>{{$entry->mode}}</strong></td>
                    </tr>

                    @if($entry->mode == 'coupon')
                        <tr>
                            <td><strong>Coupon No.</strong></td>
                            <td><strong>{{$entry->coupon}}</strong></td>
                        </tr>
                    @else
                        <tr>
                            <td><strong>Amount</strong></td>
                            <td><strong>{{$entry->amount}}</strong></td>
                        </tr>
                    @endif
                    <tr>
                        <td><strong>Petrol Pump Name</strong></td>
                        <td><strong>{{$entry->petrolpump->name}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Petrol</strong></td>
                        <td><strong>{{$entry->petrol}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Diseal</strong></td>
                        <td><strong>{{$entry->diseal}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Engine Oil</strong></td>
                        <td><strong>{{$entry->engine_oil}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Receiver Name</strong></td>
                        <td><strong>{{$entry->receiver_name}}</strong></td>
                    </tr>

                    </tbody>
                </table>
                <p>&nbsp;</p>
                <h5 style="text-align: right;"><strong>________&shy;______</strong><br> <strong>Received by</strong></h5>
            </form>
        </div>
    </div>
</div>
<div class="hide-print " style="text-align: center;    margin-bottom: 5px">
    <a class="btn-success" onclick="window.print()">Print</a>
    <a class="btn-warning"  href="{{url('nonofficialfuels')}}">Back</a>
</div>
</body>
</html>