<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Work Item Stage Status</h5>
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
                                                $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-type-stage' ,'method'=>'post' );
                                                echo form_open('Work_item_stage_status/create_work_item_stage_status',$attributes);
                                             ?> 
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" for="work-item-type-filter">Work Item Type</label>
                                        <div class="col-lg-4">
                                            <select id="work-item-type-filter" name="work-item-type-filter" class="form-control" required="required">
                                                   <option ></option>
                                                    <?php foreach ($work_item_types as $work_item_type):  ?>  
                                                        <option value="<?php echo $work_item_type->work_type_id ?>"><?php echo $work_item_type->description ?></option> 
                                                    <?php endforeach; ?> 
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="control-label col-lg-4" for="work-item">Work Item </label>
                                        <div class="col-lg-4">
                                            <select id="work-item" name="work-item" class="form-control stage-output" required="required">
                                                   <option ></option>
                                                    <?php foreach ($work_items as $work_item):  ?>  
                                                        <option value="<?php echo $work_item->work_item_id ?>"><?php echo $work_item->description ?></option> 
                                                    <?php endforeach; ?> 
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Stage</label>
                                            <div class="col-lg-4">
                                            <select id="stage" name="stage" class="form-control" required="required">
                                                    <option ></option>
                                                    <?php foreach ($stages as $stage):  ?>  
                                                        <option value="<?php echo $stage->stage_id ?>"><?php echo $stage->description ?></option> 
                                                    <?php endforeach; ?> 
                                            </select>
                                        </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Status</label>
                                            <div class="col-lg-4">
                                            <select id="stage" name="status" class="form-control" required="required">
                                                   <option ></option>
                                                    <?php foreach ($status as $state):  ?>  
                                                        <option value="<?php echo $state->status_id ?>"><?php echo $state->description ?></option> 
                                                    <?php endforeach; ?> 
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="submission-deadline" class="control-label col-lg-4">Status Start Date</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="submission-deadline" name="submission-deadline" class="form-control" readonly="readonly" data-date-format="yyyy-mm-dd"/>
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

