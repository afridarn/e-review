<html>
<body>
<?php echo form_open_multipart(base_url() . 'index.php/manageassignedtask/withdrawing_funds')?>
                          <div class="text-center">
                            <h2>Deduct Funds</h2>
                          </div>
                            <?php if($this->session->flashdata('fail_max_deduct_funds')):?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('fail_max_deduct_funds')?></div>
                            <?php endif;?>
                            <?php if($this->session->flashdata('fail_min_deduct_funds')):?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('fail_min_deduct_funds')?></div>
                            <?php endif;?>
                            <?php if($this->session->flashdata('success_deduct_funds')):?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success_deduct_funds')?></div>
                            <?php endif;?>
                            <p>Your Balance : Rp <?php echo $reviewer[0]['balance']; ?> </p>

                            <label for="withdraw">Input amount that you want to withdraw : </label>
                            <input type="number" id="withdraw" name="withdraw" placeholder="Minimum amout to withdraw Rp10000"><br>
                            <div class="form-group">
                                <div class="aligncenter">
                                    <input type="submit" value="Deduct Funds">
                                </div>
                            </div>
                        </form>
</body>
</html>