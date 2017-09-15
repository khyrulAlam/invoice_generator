<div class="container">
    <div class="row">
        <div class="BillForm">
        <?php $suss = $this->session->userdata('success'); if($suss){?>
            <div class="alert alert-success" role="alert">
              <?php echo $suss; $this->session->unset_userdata('success');?>
            </div>
        <?php }?>
        <?php $error = $this->session->userdata('insert_error'); if($suss){?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error; $this->session->unset_userdata('insert_error');?>
            </div>
        <?php }?>

            <form action="<?php echo base_url()?>Invoice/insert_bill" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="bill_to" class="form-control" placeholder="Bill For">
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_name" placeholder="Company Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="address" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="issue_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control">
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
                            <tr>
                                <td><input type="text" name="item[]" class="form-control"></td>
                                <td><input type="number" name="unit_price[]" class="form-control unit"></td>
                                <td><input type="number" name="quantity[]" class="form-control qnt"></td>
                                <td><input type="number" name="total[]" class="form-control nums"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><span id="addMore" class="btn btn-info">Add More</span></td>
                                <td class="text-right">Grand Total </td>
                                <td colspan="2"><input type="text" name="Grand_Total" class="form-control gTotal"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <button class="btn btn-block btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
