@extends('layouts.admin-panel')
@section('title','Admin Dashboard')
@section('styles')
<style>
    
.legendLabel {
    font-size: 0.825rem;
    padding-left: 0.5rem;
    color: #0b0808 !important;
}
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert alert-success solid alert-dismissible fade show mb-3">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
            <strong>Success!</strong> {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
        @endif
        <div class="card h-auto">
            <div class="card-body">
                <div class="row shapreter-row">
                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                            <h3 id="today" class="count fs-4">0</h3>
                            <span class="fs-14">Today</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                            <h3 id="yesterday" class="count fs-4">0</h3>
                            <span class="fs-14">Yesterday</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                            <h3 id="week" class="count fs-4">0</h3>
                            <span class="fs-14">Week</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                            <h3 id="mount" class="count fs-4">0</h3>
                            <span class="fs-14">Mount</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                            <h3 id="all" class="count fs-4">0</h3>
                            <span class="fs-14">All</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                            <h3 id="online" class="count fs-4">0</h3>
                            <span class="fs-14">Online</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- fiter -->
        <div class="card h-auto">
            <div class="card-body ">
                <div class="d-flex">
                    <div style="width: 140px;" class="me-2" >
                        <select id="bulan" name="bulan" class="default-select form-control wide mb-3 "  >
                            <option value="01" {{ (date('m') == '01' )?'selected':'' }} >Januari</option>
                            <option value="02" {{ (date('m') == '02' )?'selected':'' }} >Februari</option>
                            <option value="03" {{ (date('m') == '03' )?'selected':'' }} >Maret</option>
                            <option value="04" {{ (date('m') == '04' )?'selected':'' }} >April</option>
                            <option value="05" {{ (date('m') == '05' )?'selected':'' }} >Mei</option>
                            <option value="06" {{ (date('m') == '06' )?'selected':'' }} >Juni</option>
                            <option value="07" {{ (date('m') == '07' )?'selected':'' }} >Juli</option>
                            <option value="08" {{ (date('m') == '08' )?'selected':'' }} >Agustus</option>
                            <option value="09" {{ (date('m') == '09' )?'selected':'' }} >September</option>
                            <option value="10" {{ (date('m') == '10' )?'selected':'' }} >Oktober</option>
                            <option value="11" {{ (date('m') == '11' )?'selected':'' }} >November</option>
                            <option value="12" {{ (date('m') == '12' )?'selected':'' }} >Desember</option>
                        </select>
                    </div>
                    <div style="width: 100px;" class="me-2" >
                        <select id="tahun" name="tahun" class="default-select form-control wide mb-3 ">
                            @for($a=2022;$a<=date('Y');$a++)
                            <option value="{{$a}}" {{ (date('Y') == $a )?'selected':'' }} >{{$a}}</option>
                            @endfor
                        </select>
                    </div>
                    <div style="width: 100px;">
                        <button id="filter"  type="button" class="btn btn-square btn-outline-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /fiter -->
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-20 font-w600">This Month</h4>
                    </div>
                    <div class="card-body p-1">
                        <canvas id="activity" height="115"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-20 font-w600">Referrer Websites</h4>
                    </div>
                    <div class="card-body p-1">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-20 font-w600">Visitor map</h4>
                    </div>
                    <div class="card-body ">
                        <div id="regions_div" style="height: 360px;" ></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-20 font-w600">Visitor Country</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="fs-3">
                                <tr>
                                    <th>Country</th>
                                    <th>Visitor</th>
                                </tr>
                            </thead>
                            <tbody id="vistorcountry" class="fs-5">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-20 font-w600">Visitor OS</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="fs-3">
                                <tr>
                                    <th>OS</th>
                                    <th>Visitor</th>
                                </tr>
                            </thead>
                            <tbody class="fs-5" id="visitorOS" >
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-20 font-w600">Visitor Browser</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="fs-3">
                                <tr>
                                    <th>Browser</th>
                                    <th>Visitor</th>
                                </tr>
                            </thead>
                            <tbody class="fs-5" id="visitorBrowser" >
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        


    </div>
</div>
@endsection
@section('scripts')
<!-- <script src="{{asset('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/flot/jquery.flot.resize.js')}}"></script>
<script type="text/javascript" src="https://www.google.com/jsapi?sensor=false"></script> -->



@endsection