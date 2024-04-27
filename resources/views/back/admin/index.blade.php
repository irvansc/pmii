@extends('back.layouts.pages-layouts')
@section('pageTitle')

@section('content')
<div class="row same-height">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Monthly Sales</h4>
            </div>
            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myChart" height="200" width="434" class="chartjs-render-monitor" style="display: block; width: 434px; height: 200px;"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
