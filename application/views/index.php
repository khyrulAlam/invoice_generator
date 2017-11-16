<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/flat-ui.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/main.css')?>">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC|Bungee+Inline|Graduate|Iceland|PT+Mono|Righteous|Russo+One" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body onload="getTime()">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->


    <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('Invoice')?>">
                    Bill Generator
                    <span class="fui-star"></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('Invoice/bill_list')?>"><span class="fui-list-numbered"></span> List Of Bill</a></li>
                    <li><a href="<?php echo base_url('Invoice/make_bill')?>"><span class="fui-new"></span> Make A Bill</a></li>
                </ul>


                <div class="pull-right">
                <?php $u_id = $this->session->userdata('user_id');
                if($u_id != NULL) { ?>
                <h5>
                    <a href="<?php echo base_url('Invoice/logout')?>">
                        <span class="fui-exit"></span> Logout
                    </a>
                </h5>
                <?php } ?>
                </div>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav><!-- /navbar -->

<main>
    <?php echo $master;?>
</main>

<footer>
    <div class="container">
        <div class="row">
            <span>&copy; <?php echo date("Y");?></span>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('js/vendor/jquery-1.12.0.min.js')?>"><\/script>')</script>
<script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('js/flat-ui.min.js')?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>
<script src="<?php echo base_url('js/plugins.js')?>"></script>
<script src="<?php echo base_url('js/main.js')?>"></script>
<script>
    function getTime()
    {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function () {
            getTime()
        }, 500);
    }

    function checkTime(i){
        if (i < 10){
            i = "0" + i;
        }
        return i;
    }
</script>
</body>
</html>
