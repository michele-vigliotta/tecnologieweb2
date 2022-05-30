@extends('layouts.default')
@section('content')
    @include('contentSections.general.aboutHome')
    @include('contentSections.general.saleSection')
    @include('contentSections.general.whyUs')
    @include('contentSections.general.clientSection')
    @include('contentSections.general.infoSection')
@stop

@section('carousel')
    @include('includes.slider')
@stop
