<div class="container">
    <div class="row">
        <div class="BillForm">
        <!-- <?php $error = $this->session->userdata('insert_error'); if($suss){?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error; $this->session->unset_userdata('insert_error');?>
            </div>
        <?php }?> -->
        <?php
            $data = json_decode($bill->invoice_data_json);
        ?>
            <form action="<?php echo base_url('Invoice/bill_edit_info/'.base64_encode($bill->invoice_id))?>" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="bill_to" class="form-control" value="<?= $data->bill_to?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_name" class="form-control" value="<?= $data->company_name?>">
                        <input type="hidden" name="invoice_no" class="form-control" value="<?= $data->invoice_no?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address[]" required class="form-control" value="<?= $data->address->streetAddress?>">
                        <input type="text" name="address[]" required class="form-control" value="<?= $data->address->zipCode?>">
                        <input type="text" name="address[]" required class="form-control" value="<?= $data->address->city?>">
                        <input type="text" name="address[]" required class="form-control" value="<?= $data->address->state?>">
                        <input type="text" name="address[]" required class="form-control" value="<?= $data->address->country?>">
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="issue_date" class="form-control" value="<?= $data->issue_date?>">
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control" value="<?= $data->due_date?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <th>Items</th>
                            <th>Unit Price</th>
                            <th>quantity</th>
                            <th>Total</th>
                        </thead>
                        <tbody>

                            <?php
                                $no = (count($data->item )-1);
                                for($i=0; $i<= $no; $i++){
                            ?>
                            <tr>
                                <td><input type="text" name="item[]" class="form-control" value="<?= $data->item[$i] ?>"></td>
                                <td><input type="number" name="unit_price[]" class="form-control unit" value="<?= $data->unit_price[$i]?>"></td>
                                <td><input type="number" name="quantity[]" class="form-control qnt" value="<?= $data->quantity[$i]?>"></td>
                                <td><input type="number" name="total[]" class="form-control nums" value="<?= $data->total[$i]?>"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><span id="addMore" class="btn btn-info">Add More</span></td>
                                <td class="text-right">Grand Total </td>
                                <td colspan="2"><input type="text" name="Grand_Total" class="form-control gTotal" value="<?= $data->Grand_Total?>"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" name="inword" class="inword" value="<?= $data->inword?>">
                </div>

                <button class="btn btn-block btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
