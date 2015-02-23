.<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                            <div class="col-lg-12">
                                <b>Ref No:</b> <?php echo $work_item->reference_number ?><br/>
                                <b>Work Item Name:</b><?php echo $work_item->description ?><br/>
                                <b>Work Item Type</b> <?php echo $work_item->Work_item_type ?>                  
                            </div>
                        <div class="toolbar">
                            <ul class="nav">
                                <li>
                                    <div class="btn-group">
                                        <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                            href="#">
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
                                                echo form_open('Work_item_stage/create_work_item_stage',$attributes);
                                             ?> 
                                    
                                        <input type="hidden" id="work-item-id" name="work-item-id" class="form-control" required="required"/>
                                           
                                        <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Stage</label>
                                            <div class="col-lg-4">
                                            <select id="stage" name="stage" class="form-control" required="required">
                                                     <option></option>
                                                    <?php foreach ($stages as $stage):  ?>  
                                                        <option value="<?php echo $stage->stage_id ?>"><?php echo $stage->description ?></option> 
                                                    <?php endforeach; ?> 
                                            </select>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Assigned To</label>
                                            <div class="col-lg-4">
                                            <select id="stage" name="stage" class="form-control" required="required">
                                                     <option></option>
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

