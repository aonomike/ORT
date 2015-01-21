<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Work Item Type Stage</h5>
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
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'update-work-item_type_stage' ,'method'=>'post' );
                                            echo form_open('work_item_type_stage/update_work_item_type_stage',$attributes);
                                         ?> 
                                         <div class="form-group">
                                            <label for="id" class="control-label col-lg-4">ID</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="id" name="id" class="form-control" value="<?php echo htmlentities($work_item_type_stage->id); ?>" required="required">
                                             </div>       
                                        </div>
                                       
                                         <div class="form-group">
                                        <label class="control-label col-lg-4" for="work-item-type">Work Item Type</label>
                                        <div class="col-lg-4">
                                            <select id="work-item-type" name="work-item-type" class="form-control" required="required">
                                                    <?php foreach ($work_item_types as $work_item_type):  ?> 
                                                         
                                                        <option value="<?php echo $work_item_type->work_type_id ?>" 
                                                            <?php 
                                                                if($work_item_type->work_type_id==$work_item_type_stage->work_type)
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        >
                                                        <?php echo $work_item_type->description  ?></option> 
                                                        <?php endforeach; ?> 
                                                </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Stage</label>
                                            <div class="col-lg-4">
                                            <select id="stage" name="work-item-type" class="form-control" required="required">
                                                    <?php foreach ($stages as $stage):  ?>  
                                                        <option value="<?php echo $stage->stage_id ?>"
                                                            <?php 
                                                                if($stage->stage_id==$work_item_type_stage->stage)
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        >
                                                        <?php echo $stage->description ?></option> 
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

