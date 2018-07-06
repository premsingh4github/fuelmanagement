<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('') }}">

    <title>{{config('app.APP_NAME')}}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{url('favicon.ico')}}">

    <!-- Styles -->
    {!! Html::style('/css/app.css') !!}
    {!! Html::style('/css/daterangepicker.css') !!}
    {!! Html::style('/css/jquery-ui.min.css') !!}
    {!! Html::style('/css/khoj.css') !!}
    <link rel="stylesheet" type="text/css" href="{{url('nepalidate/nepali.datepicker.v2.2.min.css')}}" />
    <!-- Scripts -->
    <script>
        window.Laravel ={!! json_encode([
            'csrfToken' => csrf_token(),
            'base_url'=> url(''),
        ]) !!};
    </script>
    <style>
        #app{
            min-height: 700px;
        }
        .custom-combobox-input{
            width: 96%;
            display: inline;
        }
        .reg_no{
            font-size: 50px;
            font-family: sans-serif;
        }
        .navbar-logo-text {
            text-align: center;
        }
        .footer {
         //   position:absolute;
            bottom:0;
            width:100%;
            height:50px;   /* Height of the footer */
            background-color: #ffffff;
            line-height: 50px;
        }

        @media print{
            body {
                font-size: 15px;
            }
            .print_hide{
                display: none;
            }
            a[href]:after {
                content: none !important;
            }
            .extra-details{
                display: none;
            }

            .mid-para{
                margin-top: -10px;
            }
            #footerContainer{
                margin-top:-25px;
            }
            h4{
                line-height: 2;
                font-size: 10px;
            }
            .header-mid img{
                width: 75%;
            }


        }
    </style>
    @yield('style')
    {!! Html::script('js/jquery.min.js') !!}
    {{--    {!! Html::script('js/jquery-3.2.1.min.js') !!}--}}
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                {{--{{ config('app.name', 'Laravel') }}--}}
                {{--</a>--}}
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <div class="navbar-logo">

                        {{--@if(Auth::check() && (Auth::user()->type == array_search('Super Admin',config('custom.user_types')) ))--}}
                            {{--<img src="{{url('images/nepal-govt.png')}}" alt="Nepal govt Logo">--}}
                        {{--@elseif(Auth::check() && (Auth::user()->getParent()->type == array_search('Admin',config('custom.user_types')) ))--}}
                            {{--<img src="{{url(Auth::user()->getParent()->client->logo)}}">--}}
                        {{--@elseif(Auth::check() && (Auth::user()->type == array_search('Officer',config('custom.user_types')) ))--}}
                            {{--<img src="{{url(Auth::user()->getParent()->client->logo)}}">--}}
                        {{--@else--}}
                            {{--<img src= {{url(config('custom.logo.default_logo'))}}> --}}
                            {{--<img src= "{{url('images/nepal-govt.png')}}" alt="Nepal govt Logo">--}}
                        {{--@endif--}}
                    </div>
                    <div class="navbar-logo-text">
                        {{--@if(Auth::check() && (Auth::user()->type == array_search('Admin',config('custom.user_types')) ))--}}
                            {{--{{Auth::user()->name}}--}}
                        {{--@elseif(Auth::check() && (Auth::user()->type == array_search('Officer',config('custom.user_types')) ))--}}
                        {{--@else--}}
                            <h5>Government of Nepal</h5>
                            <h3>{{config('app.name')}}</h3>
                            <h4>Nepal</h4>
                            {{--<h5>Government of Nepal</h5>--}}
                            {{--<h3>Department of Consular Services</h3>--}}
                            {{--<h4>Tripureshwor, Kathmandu, Nepal</h4>--}}
                        {{--@endif--}}
                    </div>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="<?php if(Request::segment(2) ==''){echo 'active';}?>"  >
                        {{--<a href="{{ url('') }}">Home</a>--}}
                    </li>
                    {{--{{Auth::user()->type}}--}}
                    @if(  isset(Auth::user()->type) && Auth::user()->type == 1)

{{--                        <li  ><a href="{{ url('admin/report') }}">Reports</a></li>--}}
                        <li class="<?php if(Request::segment(2) =='fuel'){echo 'active';}?>"  ><a href="{{ url('admin/fuel') }}">Fuel</a></li>

                        <li  class="<?php if(Request::segment(2) =='staff_vehicle'){echo 'active';}?>" ><a href="{{ url('admin/staff_vehicle') }}">Staff Vehicles</a></li>

                        <li class="<?php if(Request::segment(2) =='staff'){echo 'active';}?>"  ><a href="{{ url('admin/staff') }}">Staffs</a></li>

                        <li class="<?php if(Request::segment(2) =='vehicle'){echo 'active';}?>" ><a href="{{ url('admin/vehicle') }}">Vehicles</a></li>
                        <li  class="<?php if(Request::segment(2) =='petrolpump'){echo 'active';}?>" ><a href="{{ url('admin/petrolpump') }}">Petrol Pump</a></li>
                        <li  class="<?php if(Request::segment(2) =='designation'){echo 'active';}?>" ><a href="{{ url('admin/designation') }}">Designation</a></li>
                        <li class="<?php if(Request::segment(2) =='users'){echo 'active';}?>" ><a href="{{ url('admin/users') }}">Manage Users</a></li>
                        <li class="<?php if(Request::segment(2) =='report'){echo 'active';}?>" ><a href="{{ url('admin/report') }}">Reports</a></li>
                    @elseif(isset(Auth::user()->type) && Auth::user()->type == 2)
                            <li class="<?php if(Request::segment(2) =='fuel'){echo 'active';}?>"  ><a href="{{ url('admin/fuel') }}">Fuel</a></li>
                    @endif

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}">

                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li><a href="{{ url('change_password') }}"><i class="fa fa-lock fa-fw"></i>Change Password</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
<div class="footer text-center">
    <div>©  Copyright {{date('Y')}}.All Right Reserve. <a href="http://www.webvisionaryitsol.com/" target="_new"> Web Visionary I. T. Solution </a></div>
</div>
<div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title" style="text-align: center">File Added</h4>
            </div>
            <div class="body">

            </div>
            <div class="modal-footer">
                <button id="addMore" type="button" class="btn btn-primary" onclick="addMore()">Add More</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="upload_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title" style="text-align: center">Data updated to server</h4>
            </div>
            <div class="body">
                <progress id="progress" value="0"></progress>
                <span id="display"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="export_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title" style="text-align: center">Data updated to server</h4>
            </div>
            <div class="body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >OK</button>
            </div>

        </div>
    </div>
</div>

<div class="loading">Loading&#8230;</div>
<!-- Scripts -->

{!! Html::script('js/app.js') !!}
{!! Html::script('js/jquery-ui.min.js') !!}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
{!! Html::script('js/moment.min.js') !!}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js"></script>--}}
{!! Html::script('js/daterangepicker.js') !!}
<script type="text/javascript" src="{{url('nepalidate/nepali.datepicker.v2.2.min.js')}}"></script>
{!! Html::script('js/jquery.dropdown.js') !!}

<script>
    window.new = true;
    $(document).ready(function(){
        var start = moment().subtract(29, 'days');
        var end = moment();
        function cb(start, end) {
            $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'YYYY-MM-DD'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
        $('.datepicker').datepicker({
            maxDate: new Date(),
            yearRange: "-100:+0",
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
        $(document).keypress(function(e) {
            if(e.which == 13) {
                if($('#addMore').is(':visible')){
                    location.reload();
                }
            }
        });
//
        if(($('#nepalidate').length > 0)){
            $('#nepalidate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
            });
        }
        if($('#nepalidate').val() == ""){
            $('#nepalidate').val(getNepaliDate());
        }
        if(($('#nepalidate_today').length > 0)){
            $('#nepalidate_today').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
            });
            $('#nepalidate_today').val(AD2BS($('#nepalidate_today').val()));
        }

        if(($('#nepalidate_darta').length > 0)){
            @if(Auth::check() && Auth::user()->type == '1')
            $('#nepalidate_darta').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
            });
            @else
            $('#nepalidate_darta').nepaliDatePicker({
                disableBefore: getNepaliDate().substr(5,2)+'/'+getNepaliDate().substr(8,2)+'/'+getNepaliDate().substr(0,4),
                npdMonth: true,
                npdYear: true,
            });
            @endif

            $('#nepalidate_darta').val(AD2BS($('#nepalidate_darta').val()));
        }
        if(($('#nepalidate_today1').length > 0)){

            $('#nepalidate_today1').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
            });
            $('#nepalidate_today1').val(AD2BS($('#nepalidate_today1').val()));
        }

        $('.nepali-calender').nepaliDatePicker({
            npdMonth: true,
            npdYear: true,
        });
        $('.nepali_date_past').nepaliDatePicker({
            disableAfter: getNepaliDate().substr(5,2)+'/'+(getNepaliDate().substr(8,2) - 2)+'/'+getNepaliDate().substr(0,4),
            npdMonth: true,
            npdYear: true,
        });

        $('#adddocs').click(function () {
            var docsCount = document.getElementById('docsCount').value;
            docsCount = parseInt(docsCount) + 1;
            document.getElementById('docsCount').value = docsCount;
            var add = "<div id='docs_" + docsCount + "'>" +
                "<div class='form-group'>" +
                "<div class = 'col-sm-12'>" +
                "<div class = 'row'>" +
                "<a href='javascript:void(0);'onClick='docsremove(" + docsCount + ")' title='Remove Docs'><span class='glyphicon glyphicon-remove'></span></a>" +
                "<label class = 'control-label custom-control-label required c-text-left' id = 'lbl_designation' aria - required = 'true'> Document#" + docsCount + "</label>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "<div class='form-group'>" +
                "<div class = 'col-sm-12'>" +
                "<div class = 'row'>" +
                "<div class = 'col-xs-3'>" +
                "<input required id='docs_" + docsCount + "' name = 'docs[]' type = 'file'>" +
                "</div>" +
                "<div class = 'col-xs-6'>" +
                "<input required class = 'form-control' id='docsname_" + docsCount + "' name = 'docs_name[]' type = 'text' maxlength = '100' value = '' placeholder='Document Name'>" +
                "</div>"+
                "</div>" +
                "</div>" +
                "</div>"+
                "</div>";
            var Container = document.getElementById('extradocs');
            Container.insertAdjacentHTML('beforeend', add);
        });

        $('#start_date').nepaliDatePicker({
            npdMonth: true,
            npdYear: true,
            onChange: function(){
                $('#end_date').val("")
                var day = $('#start_date').val().substr(8,2);
                // day = parseInt(day)+ 1;
                day = parseInt(day) -1;
                day = parseInt(day) - 1;
                $('#end_date').nepaliDatePicker({
                    npdMonth: true,
                    npdYear: true,
                    disableBefore: $('#start_date').val().substr(5,2)+"/"+day+"/"+$('#start_date').val().substr(0,4)
                });
            }
        });

    });
    function select_All(){
        var checkboxes = document.getElementsByName('document[]');
        var button = document.getElementById('toggle');
        if(button.value == 'Select All'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'Deselect All'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'Select All';
        }
    }
    //    delete dom with it
    function deleteDom(id){
        if($('#person_'+id).html() != undefined){
            var parent = $('#person_'+id).parent();
            if($('#person_'+id).find('.client_id').val() != undefined){
                $('.loading').show();
                $.ajax({
                    type:'GET',
                    url:window.Laravel.base_url+'/deleteClient/'+$('#person_'+id).find('.client_id').val(),
                    success:function(data){
                        $('#client_id_'+data.id).parent().parent().remove();
                        $('#manpower_clients').find('tr').each(function(ls,i){
                            //$(i).attr('id','parson_'+ls+1);
                            $(i).find('.sn').html(ls+1);
                        });
                        $('.loading').hide();
                    },
                    error:function(){

                    }
                });
            }
            else {
                $('#person_'+id).remove();
                parent.find('tr').each(function(ls,i){
                    //$(i).attr('id','parson_'+ls+1);
                    $(i).find('.sn').html(ls+1);
                });
            }
        }
    }
    //    print page
    function printDom(id){
        window.print();
    }
    //    allow only uppercase in input
    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            }
            else if (e) {
                var charCode = e.which;
            }
            else { return true; }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32 || charCode == 46)
                return true;
            else
                return false;
        }
        catch (err) {
            alert(err.Description);
        }
    }
    //    send form with ajax
    function sendForm(e){
        if(!window.new){
            return false;
        }
        $('.loading').show();
        var data = new FormData($("#add_darta")[0]);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': Laravel.csrfToken}
        });
        $.ajax({
            type:$(e).attr('method'),
            url: $(e).attr('action'),
            data : data,
            async:false,
            processData: false,
            contentType: false,
            success:function(data){
                window.new = false
                var reg_no = data.reg_no;
                var letter_number = data.letter_number;
                var message = '<div class="alert alert-success reg_no">Letter Number: '+letter_number+'<br>'+data.type+' no.: '+reg_no+' </div>';
                $('#modal').find('.body').html(message);
                $('#modal').modal('show');
                $('#add_darta').find('.reset').click();
                $('.loading').hide();
                $('#addMore').focus();
                setTimeout(function() {$('#addMore').focus(); },50);
            },
            error:function(data){
                //window.new = false;
                if(data.responseJSON != undefined){
                    for(var error in data.responseJSON){
                        $('#'+error).closest('div').addClass('has-error');
                        var message = ' <span class="help-block"><strong>' + data.responseJSON[error][0] + '</strong></span>';
                        $('#'+error).closest('.form-group .help-block').html(message);
                        if($('#'+error).parent().find('.help-block').html() != undefined){
                            $('#'+error).closest('.form-group .help-block').html(message);
                        }else {
                            $('#'+error).parent().append(message);
                        }
                        $('#'+error).focus()

                    }
                }
                $('.loading').hide();
            }
        });
        return false;
    }
    //    sending data to server
    function export_data(){
        var r = confirm("Are you sure want to update to server!");
        if (r == true) {
            $('#upload_modal').modal('show');
            upload(buildFormData());

//            $('.loading').show();
//            $.ajax({
//                type:'GET',
//                url:window.Laravel.base_url+'/myadmin/update',
//                success:function(data){
//                    if(data.status =='ok'){
//                        $('#export_modal').modal('show');
//                        $('.loading').hide();
//                    }
//                },
//                error:function(data){
//                }
//
//            });
        }
    }
    function addMore() {
        window.location = window.Laravel.base_url+'/home';
    }
    //
    function uploadfile1(e) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status ==200){
                console.log(this.response);
            }
        }
        xhttp.open("POST",window.Laravel.base_url+'/myadmin/update',true);
        console.log(buildFormData());
        xhttp.send(buildFormData());
    }
</script>
<script type="text/javascript">
    var progressBar = document.getElementById("progress"),
        display = document.getElementById("display");

    function upload(data) {
        var xhr = new XMLHttpRequest();
        xhr.setRequestHeader('X-CSRF-Token',Laravel.csrfToken);
//        xhr.open("POST", "https://zinoui.com/demo/progress-bar/upload.php", true);
        xhr.open("POST", window.Laravel.base_url+'/myadmin/update', true);
        xhr.setRequestHeader('X-CSRF-Token',Laravel.csrfToken);
        if (xhr.upload) {
            xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) {
                    progressBar.max = e.total;
                    progressBar.value = e.loaded;
                    display.innerText = Math.floor((e.loaded / e.total) * 100) + '%';
                }
            }
            xhr.upload.onloadstart = function(e) {
                progressBar.value = 0;
                display.innerText = '0%';
            }
            xhr.upload.onloadend = function(e) {
                progressBar.value = e.loaded;

            }
        }
        xhr.send(data);
    }

    function buildFormData() {
        var fd = new FormData();
//
//        for (var i = 0; i < 3000; i += 1) {
//            fd.append('data[]', Math.floor(Math.random() * 999999));
//        }

        return fd;
    }
    function print_this() {
        window.print();
    }
    function  checkQuantity() {
        var staff_id = $('#staff_id').val();
        var month_id = $('#month_id').val();
        var quantity = $('#quantity').val();
        if( (staff_id > 0) && (month_id > 0) && (quantity > 0) ){
            $.ajax({
                type: "GET",
                url: window.Laravel.base_url+'/checkquantity',
                data: {staff_id: staff_id,month_id: month_id, quantity: quantity},
                success:function (data) {
                    $('#message').html(data);
                },
                error:function (error) {
                    debugger
                }
            });
        }

        if (staff_id >0 ){
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/getstaffdetail',
                data:{staff_id: staff_id},
                success:function (data) {
                    $('.staffdetail').html(data);
                },
                error:function (error) {
                    debugger

                }
            });
        }
        else {
            $(".staffdetail").html("");

        }


    }
    function mediumChanged() {
        var medium = $('#medium').val();
        if(medium  == '2'){
            $('#amount').removeAttr('required');
            $('#amount_container').slideUp();
        }
        else {
            $('#amount').attr('required','true');
            $('#amount_container').slideDown();
        }
    }
    function valueChange(selected,input) {
        var container = $('#'+input+"_container");
        var mealeage = $('#'+input);
        if($('#'+selected).val() =='1'){
            container.slideUp('slow');
            mealeage.removeAttr('required');
        }
        else {
            container.slideDown('slow');
            mealeage.attr('required','required');
        }


    }

    function petrolpumpChange() {
        var type = $('#petrolpump_name').val()
        $('.other_petrolpump').hide();
        if(type == '0')
        {
            $('.other_petrolpump').show();
            $('#other').attr('required','true');
        }
        else{
            $('.other_petrolpump').hide();
            $('#other').removeAttr('required');
        }
    }

    function getamount() {
        $('#amount_container').slideDown();
        $('#amount').attr('required','true')

    }
    function hideamount() {
        $('#amount').removeAttr('required');
        $('#amount_container').slideUp()
    }

    function  updateService() {
        var staff_id = $('#staff_id').val();
        var month_id = $('#month').val();
        if( (staff_id > 0)){
            $.ajax({
                type: "GET",
                url: window.Laravel.base_url+'/admin/staff_services',
                data: $("#myform").serialize(),
                success:function (data) {
                    $('#services').html(data);
                },
                error:function (error) {
                    debugger
                }
            });
        }else{
            $('#services').html("");
        }
    }

    function getVehicleinfo() {
        var vehicle_id = $('#vehicle_id').val()
        if (vehicle_id >0 ){
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/admin/vehicledetail',
                data:$("#myform").serialize(),
                success:function (data) {
                    $('.ajax').html(data);
                },
                error:function (error) {
                    debugger

                }
            });
        }
        else {
            $(".ajax").html("");

        }

    }

    function getStaffdetail() {
        var staff_id = $('#staff_id').val();
        if(staff_id > 0){
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/admin/getStaffdetail',
                data:{staff_id: staff_id},
                success:function (data) {
                    $('#staff_detail').html(data);
                },
                error:function (error) {
                    debugger

                }
            });
        }
        else{
            $('#staff_detail').html("");
        }
    }
    function designationChange() {
        if($('#designation').val() == '1'){
            $('#licence_no_label').html(' Driving Licence <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span>');
            $('#licence_no').attr('required','true');
        }
        else{
            $('#licence_no_label').html(' Driving Licence ');
            $('#licence_no').removeAttr("required")
        }
    }
    function ownershipChanged() {
        if($('#ownership').val() == '1' || $('#ownership').val() == '0'){
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/admin/getvehicles',
                data:{ownership_id: $('#ownership').val()},
                success:function (data) {
                    $('#vehicle_container').html(data);
                },
                error:function (error) {
                    debugger

                }
            });
        }else {
            $('#vehicle_container').html("");
        }
    }
    function getCurrentMeters() {
        if($('#staff_id').val() > 0 ){
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/getcurrentmeter',
                data:{staff_id: $('#staff_id').val()},
                success:function (data) {
                    $('#meters_container').html(data);
                },
                error:function (error) {
                    debugger

                }
            });
        }else {
            $('#meters_container').html("");
        }
    }
    function getMeterDetail() {
        if ($('#staff_id').val() >0 ){
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/meterdetail',
                data:$("#myform").serialize(),
                success:function (data) {
                    $('#old_fuel').html(data);
                },
                error:function (error) {
                    debugger

                }
            });
        }
        else {
            $("#old_fuel").html("");

        }
    }

</script>
@yield('script')

</body>
</html>
