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
                                            <label class="control-label col-lg-4" for="work-item"></label>
                                            <div class="col-lg-4">
                                                <input id="work-item-id" type="hidden" name="work-item-id" class="form-control" value="<?php echo htmlentities($work_item->work_item_id); ?>" />  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="control-label col-lg-4">Scientific Item Title</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="title" value="<?php echo htmlentities($work_item->description); ?>" name="title" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="work-item-type">Scientific Item Type</label>
                                            <div class="col-lg-4">
                                                <select id="work-item-type" name="work-item-type" class="form-control" required="required">
                                                    <?php foreach ($work_item_type as $work):  ?> 
                                                         
                                                        <option value="<?php echo $work->work_type_id ?>" 
                                                            <?php 
                                                                if($work->work_type_id==$work_item->work_type)
                                                                {
                                                                    echo 'selected="selected"';
                                                                }   
                                                            ?>
                                                        >
                                                        <?php echo $work->description  ?></option> 
                                                        <?php endforeach; ?> 
                                                </select>
	                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reference-number" class="control-label col-lg-4">Reference Number</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="reference-number"  value="<?php echo htmlentities(substr($work_item->reference_number,0,10)); ?>" name="reference-number" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="submission-deadline" class="control-label col-lg-4">Submission Deadline</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="submission-deadline" data-date-format="yyyy-mm-dd" value="<?php echo htmlentities(substr($work_item->submission_deadline,0,10)); ?>" name="submission-deadline" class="form-control" required  />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="details" class="control-label col-lg-4">Details</label>

                                            <div class="col-lg-4">
                                                <textarea id="details"  value="<?php echo htmlentities($work_item->details); ?>" name="details" class="form-control" cols="53" required ><?php echo $work_item->details ?></textarea>
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

