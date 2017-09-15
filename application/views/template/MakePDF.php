<?php 
//echo "<pre>";
//print_r($bill);
$data = json_decode($bill->invoice_data_json);

?>

<style type="text/css">
	body{
		background: #ECF0F1;
	}
	#content{
		min-height: 942px;
		border-bottom: 1px solid;
		font-family: 'Russo One', sans-serif;
	}
	.pcontainer{
			width:750px;
			margin: 0px auto;
			overflow: hidden;
			position: relative;
			padding: 0px 15px;
		}
		header .pcontainer{
			padding: 14px 0px 0px;
    		border-bottom: 1px solid #c5cbea;;
    		margin-bottom: 10px;
		}

		h3,h2{
			font-family: 'Bungee Inline', cursive;
			color: #222483;
			font-size: 20px;
			margin: 0px;
		}
		h4{
			margin: 0px;
			font-size: 18px;
		}
		p{
			margin: 0px;
			font-size: 14px;
		}
		header p{
			/*font-family: 'Graduate', cursive;*/
			font-size: 14px;
			font-family: 'Russo One', sans-serif;
		}
		.in-to{
			border-left: 3px solid #9E9E9E;
    		padding-left: 10px;
		}
		table{
			margin-top: 40px;
			/*font-family: 'Graduate', cursive;*/
		}
		thead{
			background: #b5b6d4;
		}
		.min-table{
			min-height: 575px;
		}
		hr{
			border-top: 1px solid #c5cbea;
		}
		.bhead{
			border-bottom: 1px solid #c5cbea;
		    margin-bottom: 15px;
		    padding-bottom: 10px;
		}
</style>

	
	<center>
		<button class="btn btn-primary" id="cmd"><span class="fui-document"></span> GENERATE PDF</button>
	</center>
	<hr>

	<div  id="content">
		<div class="pcontainer bhead">
			<div class="col-md-6">
			<img src="<?php echo site_url()?>img/tech-Solution-logo.png">
			</div>
			<div class="col-md-4 col-md-offset-2">
				<div class="row">
					<p>404, Golam Rasul Plaza<br>
					1st Floor, A-4<br>
					Dilu Road, New Eskaton,Dhaka<br>
					Phone: +8801926677540<br>
					Email: info@ techsolutionsbd.com</p>
				</div>
			</div>
		</div>
		<div class="pcontainer">
			<div class="row">
				<div class="col-sm-6">
					<div class="in-to">
						<h3>Bill To: </h3>
						<p><?= $data->bill_to?></p>
						<p><?= $data->company_name?></p>
						<p><?= $data->address?></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-right">
						<div>
							<h2>INVOICE NO: <?= $data->invoice_no?></h2>
							<p>Date Of Invoice:  <?= $data->issue_date?></p>
							<p>Due Date: <?= $data->due_date?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pcontainer">
			<div class="min-table">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Items</th>
							<th class="text-center">Unit Price</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		                    $no = (count($data->item )-1);
		                    for($i=0; $i<= $no; $i++){
		                ?>
						<tr>
							<td><p class="text-center">01</p></td>
		                    <td><p class="text-center"><?= $data->item[$i] ?></p></td>
		                    <td><p class="text-center"><?= $data->unit_price[$i]?></p></td>
		                    <td><p class="text-center"><?= $data->quantity[$i]?></p></td>
		                    <td><p class="text-center"><?= $data->total[$i]?></p></td>
		                </tr>
		                <?php } ?>
					</tbody>
					<tfoot>
						<!-- <tr style="border-top: 3px solid #222483">
							<td></td>
							<td></td>
							<td></td>
							<td class="text-center">SUBTOTAL</td>
							<td class="text-center">43,000</td>
						</tr>
						<tr style="border-top: 3px solid #222483">
							<td></td>
							<td></td>
							<td></td>
							<td class="text-center">TAX 15/%</td>
							<td class="text-center">00.00</td>
						</tr> -->
						<tr style="border-top: 3px solid #222483">
							<td></td>
							<td></td>
							<td colspan="2" class="text-center text-uppercase">Total Payable Amount: </td>
							<td class="text-center"><?= $data->Grand_Total?></td>
						</tr>
					</tfoot>
				</table>
				<p style="font-size: 12px;">*NOTE: Excluding VAT & Tax</p>
			</div>	
		</div>
		<div class="pcontainer">
			<div class="row">
				<hr>
				<div class="col-md-8">
					<h4>Ammatul Anam Luna</h4>
					<img src="<?php echo site_url()?>img/sign.png" height="60">
					<p><i>Accounts Department</i></p>
				</div>
				<div class="col-md-4">
					<br>
					<h3 class="text-center">Thank You</h3>
				</div>
			</div>
		</div>

	</div> <!-- PDF Id Div -->

	<div id="editor"></div>

	<script type="text/javascript">
			var form = $('#content'),
		    cache_width = form.width(),
		    a4 = [625, 990.89]; // for a4 size paper width and height

		var canvasImage,
		    winHeight = a4[1],
		    formHeight = form.height(),
		    formWidth  = form.width();

		var imagePieces = [];

		// on create pdf button click
		$('#cmd').on('click', function() {
		    $('body').scrollTop(0);
		    imagePieces = [];
		    imagePieces.length = 0;
		    main();
		});

		// main code
		function main() {
		    getCanvas().then(function(canvas){
		        canvasImage = new Image();
		        canvasImage.src= canvas.toDataURL("image/png");
		        canvasImage.onload = splitImage;
		    });
		}

		// create canvas object
		function getCanvas() {
		    form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
		    return html2canvas(form, {
		        imageTimeout: 2000,
		        removeContainer: true
		    });
		}

		// chop image horizontally
		function splitImage(e) {
		    var totalImgs = Math.round(formHeight/winHeight);
		    for(var i = 0; i < totalImgs; i++) {
		        var canvas = document.createElement('canvas'),
		            ctx = canvas.getContext('2d');
		        canvas.width = formWidth;
		        canvas.height = winHeight;
		        //                    source region                   dest. region
		        ctx.drawImage(canvasImage, 0, i * winHeight, formWidth, winHeight, 0, 0, canvas.width, canvas.height);

		        imagePieces.push(canvas.toDataURL("image/png"));
		    }
		    console.log(imagePieces.length);
		    createPDF();
		}

		// crete pdf using chopped images
		function createPDF() {
		    var totalPieces = imagePieces.length - 1;
		    var doc = new jsPDF({
		        unit: 'px',
		        format: 'a4'
		    });
		    imagePieces.forEach(function(img){
		        doc.addImage(img, 'JPEG', 20, 10);
		        if(totalPieces)
		            doc.addPage();
		        totalPieces--;
		    });
		    doc.save('<?php echo $data->invoice_no?>_invoice.pdf');
		    form.width(cache_width);
		}
	</script>