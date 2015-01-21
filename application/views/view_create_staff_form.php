<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Staff </h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li>
                                    <div class="btn-group">
                                        <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                            href="#collapseOne">
                                            <i class="icon-chevron-up"></i>
                                        </a>
                                        
                                    </div>
                                </li>                
                            </ul>
                        </div>
                    </header>
                </div>
                 <div id="collapseOne" class="accordion-body collapse in body">
                                      <?php echo validation_errors()?>
          
                                            <?php
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-staff' ,'method'=>'post' );
                                                echo form_open('Staff_controller/create_new_staff',$attributes);
                                             ?> 
                                        <div class="form-group">
                                            <label for="firstname" class="control-label col-lg-4">First Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo set_value('firstname'); ?>" id="firstname" name="firstname" class="form-control"  required="required" />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="second-name" class="control-label col-lg-4">Second Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo set_value('second-name');?>" id="second-name" name="second-name" class="form-control"  required="required" />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="last-name" class="control-label col-lg-4">Last Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo set_value('last-name');?>" id="last-name" name="last-name" class="form-control" required="required"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="payroll-number" class="control-label col-lg-4">Payroll Number</label>
                                            <div class="col-lg-4">
                                                <input type="number" value="<?php echo set_value('payroll-number');?>" id="payroll-number" name="payroll-number" class="form-control" required="required"/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="designation" >Designation</label>
                                            <div class="col-lg-4">
                                                <select id="designation" value="<?php echo set_value('designation');?>" name="designation" class="form-control" required="required">
                                                    <?php foreach ($designation as $d):  ?>  
                                                        <option value="<?php echo $d->ID?>"><?php echo $d->Name ?></option> 
                                                    <?php endforeach; ?>                                                 
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="station">Station</label>
                                            <div class="col-lg-4">
                                                <select id="station" name="station" class="form-control" required="required">
                                                    <?php foreach ($station as $d):  ?>  
                                                        <option value="<?php echo $d->ID?>"><?php echo $d->Name ?></option> 
                                                    <?php endforeach; ?> 
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" value="<?php echo set_value('firstname');?>" for="program">Program</label>
                                            <div class="col-lg-4">
                                                <select id="program" name="program" class="form-control" required="required" >
                                                    <?php foreach ($program as $d):  ?>  
                                                        <option value="<?php echo $d->ID?>"><?php echo $d->Name ?></option> 
                                                    <?php endforeach; ?> 
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg " />
                                            <input type="reset" id="btn-reset" value="Clear" class="btn btn-warning btn-lg " />
                                            <input type="button" id="btn-cancel" value="Cancel" class="btn btn-danger btn-lg " />
                                        </div>

                                    </form>
                                </div>
            </div>
        </div>
    </div>
</div>

