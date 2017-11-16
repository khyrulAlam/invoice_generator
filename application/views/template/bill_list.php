<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="listTable">
				<table id="example" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<th>No.</th>
						<th>Company Name</th>
						<th>Invoice Number</th>
						<th>Concern</th>
						<th>Issue Date</th>
						<th>Due Date</th>
						<th>Ammount</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</thead>
					<tbody>
					<?php $no = 1; foreach ($bill as $key => $value) {
						$data = json_decode($value->invoice_data_json);
					?>
						<tr>
							<td><?php echo $no++?></td>
							<td><?php echo $data->company_name?></td>
							<td><?php echo $data->invoice_no?></td>
							<td class="bg-info">
								<?php if($value->company_id == 1){?>
									<span  style="font-size:13px;color:#e74c3c">Tech World</span>
								<?php }else if($value->company_id == 2){?>
									<span  style="font-size:13px;color:#4f4fff">Tech Solutions</span>
								<?php }else if($value->company_id == 3){?>
									<span  style="font-size:13px;color:#2ecc71">Rallyround</span>
								<?php }?>
							</td>
							<td><?php echo $data->issue_date?></td>
							<td><?php echo $data->due_date?></td>
							<td>‎৳ <?php echo $data->Grand_Total?></td>
							<td class="text-center">
								<?php if($value->invoice_status == 1){?>
								<button class="btn btn-success">Paid</button>
								<?php }else{?>
								<a href="<?php echo base_url('Invoice/Bill_Paid/'. base64_encode($value->invoice_id))?>" onclick=" return confirmClick()">
									<button class="btn btn-danger">Unpaid</button>
								</a>
								<?php }?>
							</td>
							<td class="text-center">
								<?php if($value->invoice_status == 0){?>
								<a href="<?php echo base_url('Invoice/makePdf/'.base64_encode($value->invoice_id))?>" title="VIEW">
									<span class="fui-eye"></span>
								</a>
								&nbsp;&nbsp;&nbsp;
								<a href="<?php echo base_url('Invoice/bill_edit/'.base64_encode($value->invoice_id))?>" title="EDIT">
									<span class="fui-new"></span>
								</a>
								<?php }else{?>
								<a href="" title="VIEW">
									<a href="<?php echo base_url('Invoice/makePdf/'.base64_encode($value->invoice_id))?>" title="VIEW">
									<span class="fui-eye"></span>
								</a>
								</a>
								<?php }?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
