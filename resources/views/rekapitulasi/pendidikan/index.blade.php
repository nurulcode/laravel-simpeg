@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div id="golongan"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
<script src="{{ asset('assets/js/highcharts.js') }}"></script>

<script>
    Highcharts.chart('golongan', {
    chart: {
        type: 'column'
    },
    // title: {
    //     text: 'Browser market shares. January, 2018'
    // },
    subtitle: {
        text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
                {
                    name: "S1",
                    y: 40,
                    drilldown: "S1"
                }
            ]
        }
    ],
});

</script>
@endsection
