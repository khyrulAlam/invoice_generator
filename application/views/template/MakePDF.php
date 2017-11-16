
		<style>
        p{
            margin:0;
            padding:0;
            font-family:Arial !important;
            font-size:10pt;}
        #wrapper{
            width:180mm;
            margin:0 auto;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;}

        .page{
            height:297mm;
            width:210mm;
            page-break-after:always;}

        table{
            /*border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;*/
            border-spacing:0;
            border-collapse: collapse;}

        table td{
            /*border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;*/
            padding: 2mm;}

        table.heading{
            /*height:50mm;*/
            height:45mm;
            text-transform: capitalize;}

        h1.heading{
            font-size:14pt;
            color:#000;
            font-weight:normal;}

        h2.heading{
            font-size:9pt;
            color:#000;
            font-weight:normal;}
				h3,h1,h2{
          font-size:12pt;
					color:#000;
					font-weight:normal;
					font-family: Arial;}

        hr{
            color:#ccc;
            background:#ccc;}

        #invoice_body{
            height: 137mm;}

        #invoice_body , #invoice_total{
            width:100%;}
        #invoice_body table , #invoice_total table{
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
            border-spacing:0;
            border-collapse: collapse;
            margin-top:5mm;}

        #invoice_body table td , #invoice_total table td{
            text-align:center;
            font-size:8pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;}

        #invoice_body table td.mono  , #invoice_total table td.mono{
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;}

        #footer{
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;}
        #footer table{
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
            background:#eee;
            border-spacing:0;
            border-collapse: collapse;}
        #footer table td{
            width:25%;
            text-align:center;
            font-size:8pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;}
				.paid{
					position: absolute;
			    top: 45rem;
			    left: 35rem;}
					.invoicNo{
						font-weight: 600;
						font-family: serif;
						background: #d8d8d8;
						border-left: 1px solid #eee;
						color: #b35635;
						letter-spacing: 2px;
					}
					.footerInfo{
						text-align: center;
						border-top: 1px solid #eee;
						font-size: 8pt;
						font-family: monospace;
						letter-spacing: -1px;
						color: #6f6f6f;
					}
    </style>



		<?php
			$data = json_decode($bill->invoice_data_json);
		?>
		<center>
			<a href="<?php echo base_url('Invoice/makeMpdf')?>/<?php echo $bill->invoice_id?>">
				<button class="btn btn-primary"><span class="fui-document"></span> GENERATE PDF</button>
			</a>
		</center>
			<div id="wrapper">
				<div style="text-align:right; padding-top:5mm;">
					<?php if($bill->company_id == 1){?>
						<img src="<?php echo site_url()?>img/tech-world-logo.png" width="165">
					<?php }elseif($bill->company_id == 2){?>
						<img src="<?php echo site_url()?>img/tech-Solution-logo.png">
					<?php }elseif($bill->company_id == 3){?>
						<img src="<?php echo site_url()?>img/rallyround_logo.png">
					<?php }?>
		    </div>
	    	<br />
		    <table class="heading" style="width:100%;">
		        <tr>
		            <td>
		                <h2>To</h2>
		                <h2><?= $data->company_name?></h2>
		                <p class="heading">
											<?= $data->address->streetAddress?><br>
											<?= $data->address->zipCode?>,
											<?= $data->address->city?><br>
											<?= $data->address->state?>,
											<?= $data->address->country?>
		                </p>
		            </td>
		            <td rowspan="2" valign="top" align="right">
		                <table style="border: 0px solid #eee;">
		                    <tr style="border-bottom:0px solid #eee">
		                      <td style="background: #f1f1f1;font-family:sans-serif;">Invoice No: </td>
		                      <td class="invoicNo"><?= $data->invoice_no?></td>
		                    </tr>
		                    <tr style="border-bottom:0px solid #eee">
		                      <td>Date Of Invoice: </td>
		                      <td><?= $data->issue_date?></td>
		                    </tr>
		                    <tr style="border-bottom:0px solid #eee">
		                      <td>Due Date: </td>
		                      <td><?= $data->due_date?></td></tr>
		                </table>
		            </td>
		        </tr>
						<tr>
							<td colspan="5"></td>
						</tr>
		        <tr>
		            <td colspan="5" style="font-family:sans-serif">
		                <h3 style="font-weight:600">Subject: <?= $data->bill_to?></h3>
		            </td>
		        </tr>
		    </table>
				<br>
				<div id="content">

		        <div id="invoice_body">
		            <table>
		              <tr style="background:#eee;">
		                  <td style="width:8%;"><b>Sl.No</b></td>
		                  <td><b>Description</b></td>
		                  <td style="width:15%;"><b>Quantity</b></td>
		                  <td style="width:15%;"><b>Unit Price</b></td>
		                  <td style="width:15%;"><b>Total</b></td>
		              </tr>
		            </table>

		            <table>
		              <?php
		                $no = (count($data->item )-1);
		                for($i=0; $i<= $no; $i++){
		              ?>
		              <tr>
		                  <td style="width:8%;"><?php echo $i+1?></td>
		                  <td style="text-align:left; padding-left:10px;"><?= $data->item[$i] ?></td>
		                  <td class="mono" style="width:15%;"><?= $data->quantity[$i]?></td>
		                  <td style="width:15%;" class="mono"><?= $data->unit_price[$i]?></td>
		                  <td style="width:15%;" class="mono"><?= $data->total[$i]?></td>
		              </tr>
		              <?php } ?>

		              <tr>
		                  <td colspan="3"></td>
		                  <td></td>
		                  <td></td>
		              </tr>

		              <tr>
		                  <td colspan="3">
		                  </td>
		                  <td>Total :</td>
		                  <td class="mono"><?= $data->Grand_Total?></td>
		              </tr>
		          </table>
		          <table style="border:0px solid">
		            <tr>
		              <td colspan="5" style="border: none;text-align: left;font-weight: 600;font-size:15px;text-transform:capitalize">
		                In Word (Taka): <span><?= $data->inword?></span> only
		              </td>
		            </tr>
		          </table>
		        </div>
		        <div id="invoice_total">
		            <table>
		                <tr>
		                    <td style="text-align:left; padding-left:10px;font-family: cursive;">
		                      Please arrange to make the payment by cash or A/C payee cheque in favor of
													<?php if($bill->company_id == 2){?>
														"TechsolutionsBD"
													<?php }else {?>
														"The Monthly Techworld Bangladesh"
													<?php }?>
		            					As earliest. Thanks you cooperation and looking forward
		            					to you patronization. <span style="color:red;">For any query, please call @ 01926677542,
														<?php if($bill->company_id == 3){?>
															01968740603
														<?php }else {?>
															01926677534
														<?php }?>
															</span>
		                    </td>
		                </tr>
		            </table>
		        </div>
		        <hr/>

		        <table style="width:100%; height:38mm;">
		            <tr>
		                <td style="width:85%;" valign="bottom">
												<?php if($bill->company_id == 3){?>
													<img src="<?php echo site_url()?>img/yusuf-sig.png" height="60" style="padding-left:30px"><br />
												<?php }else{ ?>
		                    <img src="<?php echo site_url()?>img/sign.png" height="60" style="padding-left:30px"><br />
												<?php } ?>
		                    _________________________________<br/>
												<?php if($bill->company_id == 3){?>
												MD. Yusuf Chowdhury <br/>
												Asst. Manager & Content & Business Development
												<?php }else{ ?>
												Sobail Ibn-e- Hamja <br/>
		                    Accounts & Admin Department
												<?php } ?>
		                </td>
		                <td valign="bottom">
		                  <div id="box">
		                    _________________________________<br/><br/>
		                    <p style="text-align:center">Customer's Signature</p>
		                  </div>
		                </td>
		            </tr>
								<tr>
									<td colspan="2" class="footerInfo">404, Golam Rasul Plaza, 1st Floor, A-4, Dilu Road, New Eskaton, Dhaka. Tel: +88 02 9355114 Email:
										<?php if($bill->company_id == 2){?>
											info@techsolutionsbd.com
										<?php }else if($bill->company_id == 1) {?>
											info.techworldbd@gmail.com
										<?php }else if($bill->company_id == 3) {?>
											pr@rallyroundbd.com
										<?php }?>
									</td>
								</tr>
		        </table>
		    </div>
		</div>
		<?php if($bill->invoice_status== 1 ){?>
		<div class="paid">
			<img src="<?php echo site_url()?>img/paid.png" height="150">
		</div>
		<?php } ?>
