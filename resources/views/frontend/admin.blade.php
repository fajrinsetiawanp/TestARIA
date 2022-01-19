<!-- First you need to extend the CB layout -->


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doremi Dashboard: Statistic Wholesale</title>
    <meta name="csrf-token" content="dMmXWwwxlnsUFkVFp7UsF7UC9ivQDnh5csC07nNR"/>
    <meta name='generator' content='CRUDBooster 5.4.6'/>
    <meta name='robots' content='noindex,nofollow'/>
    <link rel="shortcut icon"
          href="https://doremimusicstore.com/uploads/2019-09/ebcd401fb1e51ec7674adbd7e1061de8.png">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="https://doremimusicstore.com/vendor/crudbooster/ionic/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>

    <!-- support rtl-->
    
    <link rel='stylesheet' href='https://doremimusicstore.com/vendor/crudbooster/assets/css/main.css?r=1609292458'/>

    <!-- load css -->
    <style type="text/css">
            </style>
    
    <style type="text/css">
        .dropdown-menu-action {
            left: -130%;
        }

        .btn-group-action .btn-action {
            cursor: default
        }

        #box-header-module {
            box-shadow: 10px 10px 10px #dddddd;
        }

        .sub-module-tab li {
            background: #F9F9F9;
            cursor: pointer;
        }

        .sub-module-tab li.active {
            background: #ffffff;
            box-shadow: 0px -5px 10px #cccccc
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            border: none;
        }

        .nav-tabs > li > a {
            border: none;
        }

        .breadcrumb {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        .form-group > label:first-child {
            display: block
        }
    </style>
    <meta name="facebook-domain-verification" content="wrsmsgb5r25ixiby3bhgjl9dsvjzs7" />

    </head>
<!-- <body class="skin-red  "> -->
<body class="skin-red  sidebar-collapse">
<div id='app' class="wrapper">

    <!-- Header -->
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="https://doremimusicstore.com/admin" title='Doremi Dashboard' class="logo">Doremi Dashboard</a>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <h1>Doremi Dashboard
                <small>Information</small>
            </h1>
        </section>
        <!-- Main content -->
        <section id='content_section' class="content">

    <!-- Your Page Content Here -->
    <!-- Your custom  HTML goes here -->
    <p>
        <a href=""><i class="fa fa-chevron-circle-left"></i>
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
                                            <option value="2020"  selected="selected" >2020</option>
                                            <option value="2019" >2019</option>
                                            <option value="2018" >2018</option>
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
        text: 'Report Monthly Sales 2020'
    },
    subtitle: {
        text: 'Source: doremimusicstore.com <br> Total Doremi: Rp. 5,725,968,300 <br> Total Musika: Rp. 2,772,552,633'
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
            739148200 ,
                701559100 ,
                727688900 ,
                51341200 ,
                49392600 ,
                695815700 ,
                585923100 ,
                1224118500 ,
                817627000 ,
                133354000 ,
                0 ,
                0 ,
                        ]

    }, {
        name: 'Musika',
        marker: {
            symbol: 'diamond'
        },
        data: [
            293869279 ,
                455371734 ,
                457676723 ,
                39761256 ,
                38733200 ,
                326096344 ,
                425160199 ,
                198978412 ,
                427790153 ,
                109115333 ,
                0 ,
                0 ,
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
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Powered by Doremi Dashboard
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020. All Rights Reserved .</strong>
</footer>

</div><!-- ./wrapper -->


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/dist/js/app.js" type="text/javascript"></script>

<!--BOOTSTRAP DATEPICKER-->
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/datepicker/datepicker3.css">

<!--BOOTSTRAP DATERANGEPICKER-->
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/daterangepicker/moment.min.js"></script>
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css">

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.css">
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<link rel='stylesheet' href='https://doremimusicstore.com/vendor/crudbooster/assets/lightbox/dist/css/lightbox.min.css'/>
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/lightbox/dist/js/lightbox.min.js"></script>

<!--SWEET ALERT-->
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://doremimusicstore.com/vendor/crudbooster/assets/sweetalert/dist/sweetalert.css">

<!--MONEY FORMAT-->
<script src="https://doremimusicstore.com/vendor/crudbooster/jquery.price_format.2.0.min.js"></script>

<!--DATATABLE-->
<link rel="stylesheet" href="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.css">
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    var ASSET_URL = "https://doremimusicstore.com/";
    var APP_NAME = "Doremi Dashboard";
    var ADMIN_PATH = 'https://doremimusicstore.com/admin';
    var NOTIFICATION_JSON = "https://doremimusicstore.com/admin/notifications/latest-json";
    var NOTIFICATION_INDEX = "https://doremimusicstore.com/admin/notifications";

    var NOTIFICATION_YOU_HAVE = "You Have";
    var NOTIFICATION_NOTIFICATIONS = "Notifications";
    var NOTIFICATION_NEW = "You have a new notification !";

    $(function () {
        $('.datatables-simple').DataTable();
    })
</script>
<script src="https://doremimusicstore.com/vendor/crudbooster/assets/js/main.js?r=1609292458"></script>

    

<!-- load js -->
<script type="text/javascript">
    var site_url = "https://doremimusicstore.com";
    </script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>