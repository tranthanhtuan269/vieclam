@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="row image-ad">
                <!-- <img src="{{ url('/') }}/img/Moi-QC-300x148.jpg" class="img-rounded" alt="Cinque Terre" width="100%"> -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Người tìm việc</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ url('/') }}/img/avatar1.jpg" class="img-thumbnail" alt="avatar1" width="100%">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    Mai Ngoc Tran Tam
                                </div>
                                <div class="col-md-6">
                                    Sn: 1996
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Dong Anh - Ha Noi
                                </div>
                                <div class="col-md-6">
                                    Nhan vien ke toan
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Cao đẳng giao thong van tai
                                </div>
                                <div class="col-md-6">
                                    10.000.000 - 20.000.000 VND
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Kinh nghiem: 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary">500 likes</button>
                                    <button type="button" class="btn btn-success">300 views</button>
                                    <button type="button" class="btn btn-danger">5 calls</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Việc tìm người</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ url('/') }}/img/jardino.png" class="img-thumbnail" alt="avatar1" width="100%">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    Jardino
                                </div>
                                <div class="col-md-6">
                                    Ra doi: 2010
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Dong Anh - Ha Noi
                                </div>
                                <div class="col-md-6">
                                    Nhan vien ke toan
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    10.000.000 - 20.000.000 VND
                                </div>
                                <div class="col-md-6">
                                    31-08-2017
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Kinh nghiem: 1 nam
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary">500 likes</button>
                                    <button type="button" class="btn btn-success">300 views</button>
                                    <button type="button" class="btn btn-danger">5 applies</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row image-ad">
                <!-- <img src="{{ url('/') }}/img/Moi-QC-300x148.jpg" class="img-rounded" alt="Cinque Terre" width="100%"> -->
            </div>
        </div>
    </div>
</div>
@endsection
