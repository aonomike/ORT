<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Receive Document </h5><br/>
                        	<p class="navbar-text">
                        		<b>Name:</b> <?php echo $work_item->description.'	'; ?>  </p>
                        		<p class="navbar-text"><b>  Type:</b> <?php echo $work_item->Work_item_type.'	'; ?></p>
                        		<p class="navbar-text"><b>  Reference Number:</b> <?php echo $work_item->description.'	'; ?> </p>
                        	
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
                                        <?php //echo $error;?>
                                    <?php if (isset($error)) { ?>
                                        <?php if ($error!='') {  ?>
                                            
                                        
                                        <div class="alert alert-danger alert-block fade in" id="success-alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <h4>Error</h4>
                                                <p><?php echo $error; ?> </p>
                                            </div><!--end alert-->
                                        
                                    <?php }}; ?>
                                    <?php echo validation_errors()?>          
                                            <?php
                                                $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-type-stage' ,'method'=>'post' );
                                                echo form_open_multipart('Work_item_stage_output/create_work_item_stage_output',$attributes);
                                             ?> 
                                        <div class="form-group">
                                            <input type="hidden" name="work-item-type-filter" id="work-item-type-filter" value="<?php echo $work_item->work_type ?>">
                                        </div>
                                        <div class="form-group">
	                                        <input type="hidden" name="work-item" id="work-item" value="<?php echo $work_item->work_item_id ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="reasons_for_submission" class="control-label col-lg-4">Reason for Submission</label>
                                            <div class="col-lg-4">
                                                <select id="reasons_for_submission" name="reasons_for_submission" class="form-control" required="required">
                                                        <option ></option>
                                                        <?php foreach ($reasons_for_submission as $reason):  ?>  
                                                            <option value="<?php echo $reason->id ?>"><?php echo $reason->description ?></option> 
                                                        <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Previous Stage</label>
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
                                            <label for="status" class="control-label col-lg-4">Person Submitting</label>
                                            <div class="col-lg-4">
                                                <select id="status" name="status" class="form-control" required="required">
                                                        <option ></option>
                                                        <?php foreach ($status as $state):  ?>  
                                                            <option value="<?php echo $state->status_id ?>"><?php echo $state->description ?></option> 
                                                        <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label col-lg-4">Output Description</label>
                                            <div class="col-lg-4">
                                                <input max-length="50"id="description" type="text" name="description" class="form-control" required="required" value="<?php echo set_value('description') ?>"/>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="comment" class="control-label col-lg-4">Comments</label>
                                            <div class="col-lg-4">
                                                <textarea id="comment" name="comment" cols="50" rows="4" required="required" value="<?php echo set_value('comment') ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Upload Output</label>
                                            <div class="col-lg-8">
                                                <input type="file" name="userfile" size="20" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="version"  class="control-label col-lg-4">Version</label>
                                            <div class="col-lg-4">
                                                <input min="0" max-length="50"id="version" type="number" name="version" class="form-control" required="required" value="<?php echo set_value('version') ?>"/>
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

