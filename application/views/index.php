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
<body>
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

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>

<script type="text/javascript">
    $('body').on('change', function(e) {
        var nums = $('.nums'),
            total = 0;
        $(nums).each(function(index, el) {
            total += $(el).val() * 1;
        });
        $('.gTotal').val( total);
    });

    $('body').on('keyup', '.unit, .qnt, .nums', function(){
        var $row = $(this).closest("tr");
        var hrs1 = parseFloat($('.unit', $row).val()) || 0;
        var hrs2 = parseFloat($('.qnt', $row).val()) || 0;

        var totalHrs = (hrs1 * hrs2);
        $('.nums', $row).val(totalHrs);
    });

    $('#addMore').on('click',function (e) {
        //console.log($("#rowss"));
        $('tbody').append("<tr><td><input type='text' name='item[]' class='form-control'></td><td><input type='number' name='unit_price[]' class='form-control unit'></td><td><input type='number' name='quantity[]' class='form-control qnt'></td><td><input type='number' name='total[]' class='form-control nums'></td></tr>");
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
    function confirmClick() {
        var chk = confirm('Are You Sure This Bill Is Paid?');
        if (chk) {
            return true;
        } else {
            return false;
        }

    }
</script>
</body>
</html>