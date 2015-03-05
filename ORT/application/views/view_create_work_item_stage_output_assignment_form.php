<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Assignment </h5>
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
                                                echo form_open('Document/create_new_document_assignment',$attributes);
                                             ?>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                 <input type="hidden" value="<?php echo $work_item_stage_output->work_item_stage_output_id ?>" id="wiso" name="wiso" class="form-control date_input"  required="required" />
                                           </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stage_assigned_to" class="control-label col-lg-4">Assigned To</label>
                                            <div class="col-lg-4">
                                                <select id="stage_assigned_to" value="<?php echo set_value('stage_assigned_to');?>" name="stage_assigned_to" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($stages as $stage):  ?>  
                                                        <option value="<?php echo $stage->stage_id?>"><?php echo $stage->description ?></option> 
                                                    <?php endforeach; ?>                                                 
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="second-name" class="control-label col-lg-4">Date Assigned</label>
                                            <div class="col-lg-4">
                                                <input type="datetime" value="<?php echo set_value('date-assigned');?>" id="date-assigned" name="date-assigned" class="form-control date_input"  required="required" />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="last-name" class="control-label col-lg-4">Date Expected Back</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo set_value('date-expected-back');?>" id="date-expected-back" name="date-expected-back" class="form-control date_input" required="required"/>
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

