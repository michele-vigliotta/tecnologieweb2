@extends('layouts.default')
@section('optionalStyle')

@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-xl-center">
            <div class="col-4">
                -------------------------------
                <br>
                message w/h centered
                <br>
                chatlist

            </div>
            <div class="col-8">
                --------------------------------------------------------------------
                <br>
                name chat centred
                chat section

                <!--Start submit section-->
                <div class="row justify-content">
                    <div class="col-8">
                        insert message
                    </div>
                    <div class="col-4">
                        submit
                    </div>
                </div>
                <!--End submit section-->
            </div>
    </div>
</div>
@include('contentSections/general/infoSection')
@stop
