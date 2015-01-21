<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Work Item</h5>
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
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'edit-work-item' ,'method'=>'post' );
                                            echo form_open('Work_Item/update_work_items',$attributes);
                                         ?>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="work-item">Work Item</label>
                                            <div class="col-lg-4">
                                                <input id="work-item-id" type="text" name="work-item-id" class="form-control" value="<?php echo htmlentities($work_item->work_item_id); ?>" />  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="control-label col-lg-4">Work Item Title</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="title" value="<?php echo htmlentities($work_item->description); ?>" name="title" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="work-item-type">Work Item Type</label>
                                            <div class="col-lg-4">
	                                            <select id="work-item-type" name="work-item-type" class="form-control" value="<?php echo $work_item->work_item_id ?>">
                                                    <?php foreach ($work_item_type as $s):  ?>  
                                                        <option value="<?php echo $s->work_type_id ?>"><?php echo $s->description ?></option> 
                                                    <?php endforeach; ?> 
                                                </select>
	                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="submission-deadline" class="control-label col-lg-4">Submission Deadline</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="submission-deadline" data-date-format="yyyy-mm-dd" value="<?php echo htmlentities(substr($work_item->submission_deadline,0,10)); ?>" name="submission-deadline" class="form-control"  >
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

