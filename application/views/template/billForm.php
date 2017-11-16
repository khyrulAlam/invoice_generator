<div class="container">
    <div class="row">
        <div class="BillForm">
        <?php $suss = $this->session->userdata('success'); if($suss){?>
            <div class="alert alert-success" role="alert">
              <?php echo $suss; $this->session->unset_userdata('success');?>
            </div>
        <?php }?>
        <?php $error = $this->session->userdata('insert_error'); if($error){?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error; $this->session->unset_userdata('insert_error');?>
            </div>
        <?php }?>

            <form action="<?php echo base_url()?>Invoice/insert_bill" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <select class="form-control" required name="company_id">
                          <<option value="">Select Company</option>
                          <<option value="1">Tech World</option>
                          <<option value="2">Tech Solutions BD</option>
                          <<option value="3">Rallyround BD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="bill_to" class="form-control" placeholder="Subject"  required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_name" placeholder="Company Name" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address[]" required placeholder="Street Address" class="form-control">
                        <input type="text" name="address[]" required placeholder="Zip Code" class="form-control">
                        <input type="text" name="address[]" required placeholder="City" class="form-control">
                        <input type="text" name="address[]" required placeholder="State" class="form-control">
                        <input type="text" name="address[]" required placeholder="Country" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="issue_date" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control"  required>
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
                                <td><input type="text" name="item[]" class="form-control"  required></td>
                                <td><input type="number" name="unit_price[]" class="form-control unit"  required></td>
                                <td><input type="number" name="quantity[]" class="form-control qnt"  required></td>
                                <td><input type="number" name="total[]" class="form-control nums"  required></td>
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
                    <input type="hidden" name="inword" class="inword">
                </div>

                <button class="btn btn-block btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
