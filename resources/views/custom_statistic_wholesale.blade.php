<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

@section('content')
<!-- Your custom  HTML goes here -->
@if(CRUDBooster::myPrivilegeId() != 8)
    <p>
        <a href="{{ g('return_url') }}"><i class="fa fa-chevron-circle-left"></i>
        &nbsp; Back </a>
    </p>
    <!-- Your custom  HTML goes here -->
    <form action="/admin/statistic_wholesale" method="GET">
    <div class="box">
            <div class="box-body table-responsive no-padding">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse_monthly"><strong><i class="fa fa-bars"> Report Monthly</i></strong></a>
                            </h4>
                        </div>
                        <div id="collapse_monthly" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody> 
                                    <tr>
                                        <td width="25%"><strong>Tahun</strong></td>
                                        <td>
                                            <select class="form-control" name="tahun" onchange="this.form.submit()">
                                                    <?php
                                                    $year_now = date('Y');
                                                    for ($x = $year_now; $x >= 2018; $x--) {
                                                    ?>
                                                        <option value="{{ $x }}" @if($x == $tahun) selected="selected" @endif>{{ $x }}</option>
                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div id="wholesale" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    {{-- <div class="box">
            <div class="box-body table-responsive no-padding">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse_monthly"><strong><i class="fa fa-bars"> Report Daily</i></strong></a>
                            </h4>
                        </div>
                        <div id="collapse_monthly" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody> 
                                    <tr>
                                        <td width="25%"><strong>Range Date</strong></td>
                                        <td>
                                            <input type="date" name="from_date" class="form-control" id="from_date" value="{{ date('Y-m-d') }}"> s/d
                                            <input type="date" name="to_date" class="form-control" id="to_date" onclick="toDate()">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div id="daily" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div> --}}
    </form>

<script>
    function toDate() {
        var x = new Date(document.getElementById("from_date").value);
        
        // min
        m = '' + (x.getMonth() + 1),
        d = '' + (x.getDate() + 3),
        y = x.getFullYear();
        if (m.length < 2) m = '0' + m;
        if (d.length < 2) d = '0' + d;
        // min

        // max
        month = '' + (x.getMonth() + 1),
        day = '' + (x.getDate() + 7),
        year = x.getFullYear();
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        // max

        var min = [y, m, d].join('-');
        var max = [year, month, day].join('-');
        document.getElementById("to_date").setAttribute("min", min);
        document.getElementById("to_date").setAttribute("max", max);
    }
</script>
<script>
Highcharts.chart('wholesale', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Report Monthly Sales <?php echo $tahun ?>'
    },
    subtitle: {
        text: 'Source: doremimusik.com <br> Total Doremi: Rp. <?php echo number_format($sales_year_doremi) ?> <br> Total Musika: Rp. <?php echo number_format($sales_year_musika) ?>'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Sales'
        },
        labels: {
            formatter: function () {
                return this.value + '°';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Doremi',
        marker: {
            symbol: 'square'
        },
        data: [
            <?php foreach($result['doremi'] as $v) { echo $v; ?> ,
                <?php } ?>
        ]

    }, {
        name: 'Musika',
        marker: {
            symbol: 'diamond'
        },
        data: [
            <?php foreach($result['musika'] as $v) { echo $v; ?> ,
                <?php } ?>
        ]
    }]
});


Highcharts.chart('daily', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Average fruit consumption during one week'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Fruit units'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'John',
        data: [3, 4, 3, 5, 4, 10, 12]
    }, {
        name: 'Jane',
        data: [1, 3, 4, 3, 3, 5, 4]
    }]
});
</script>
@endif
@endsection