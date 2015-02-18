.<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Work Item Type Stage</h5>
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
                                                echo form_open('Work_item_type_stage/create_work_item_type_stage',$attributes);
                                             ?> 
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" for="work-item-type-for_stage">Work Item Type</label>
                                        <div class="col-lg-4">
                                            <select id="work-item-type-for-stage" name="work-item-type-for-stage" class="form-control" required="required">
                                                <option ></option>
                                                <?php foreach ($work_item_types as $work_item_type):  ?>  
                                                    <option value="<?php echo $work_item_type->work_type_id ?>"><?php echo $work_item_type->description ?></option> 
                                                <?php endforeach; ?> 
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stage-id" class="control-label col-lg-4">Stage</label>
                                            <div class="col-lg-4">
                                            <select id="stage-id" name="stage-id" class="form-control" required="required">
                                                    <option ></option>
                                                    <?php foreach ($stages as $stage):  ?>  
                                                        <option value="<?php echo $stage->stage_id ?>"><?php echo $stage->description ?></option> 
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

