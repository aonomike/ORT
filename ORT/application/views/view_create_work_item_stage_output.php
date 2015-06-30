<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="col-lg-12">
                           <b> Ref No:</b> <?php echo $work_item->reference_number ?>   <br/>
                           <b> Work Item Name:</b> <?php echo $work_item->description ?><br/>
                           <b> Work Item Type:</b> <?php echo $work_item->Work_item_type ?>
                        </div>
                        <div class="toolbar">
                            <ul class="nav">
                                <li>
                                    <div class="btn-group">
                                        <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                            href="#">
                                            <i class=""></i>
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
                                            <input type="hidden" id="work-item-type-value" name="work-item-type-value" class="form-control" required="required" value="<?php echo htmlentities($work_item->work_type) ?>" />
                                        </div>
                                        <div class="form-group">
                                                <input type="hidden" id="work-item-value" name="work-item-value" class="form-control stage-output-item" required="required" value="<?php echo htmlentities($work_item->work_item_id) ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="stage" class="control-label col-lg-4">Received From</label>
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
                                            <label for="request" class="control-label col-lg-4">Action Request on Receipt</label>
                                            <div class="col-lg-4">
                                                <select id="request" name="request" class="form-control" required="required" >
                                                        <option ></option>
                                                        <?php foreach ($requests as $request):  ?>  
                                                            <option value="<?php echo $request->id ?>"><?php echo $request->description ?></option> 
                                                        <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="control-label col-lg-4">Status on Receipt</label>
                                            <div class="col-lg-4">
                                                <select id="status" name="status" class="form-control" required="required" >
                                                        <option ></option>
                                                        <?php foreach ($status as $state):  ?>  
                                                            <option value="<?php echo $state->status_id ?>"><?php echo $state->description ?></option> 
                                                        <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment" class="control-label col-lg-4">Remarks</label>
                                            <div class="col-lg-4">
                                                <textarea id="comment" name="comment" cols="50" rows="4"  value="<?php echo set_value('comment') ?>"><?php echo set_value('comment') ?></textarea>
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
                                                <input max-length="50"id="version" type="text" name="version" class="form-control" required="required" value="<?php echo set_value('version') ?>"/>
                                            </div>
                                        </div>
                                       
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg " />
                                            <input type="reset" id="btn-reset" value="Clear" class="btn btn-warning btn-lg " />
                                            <A href="#" id="btn-cancel" class="btn btn-danger btn-lg " />Back</a>
                                        </div>

                                    </form>
                                </div>
            </div>
        </div>
    </div>
</div>

