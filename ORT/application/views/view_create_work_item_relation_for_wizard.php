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
                                                echo form_open_multipart('Relate_work_items/create_related_work_items_wizard',$attributes);
                                             ?> 
                                         <div class="form-group">
                                            <div class="col-lg-4">
                                                <input type="hidden" value="<?php echo $work_item->work_item_id ?>" name="current-work-item" id="current-work-item" />
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="work-item-type-filter" class="control-label col-lg-4">Link With Other Work Item</label>
                                            <div class="col-lg-4">
                                               <input type="radio" name="relation-radio" id="relation-radio-1" value="1"  required="required"> Yes <br/>
                                               <input type="radio" name="relation-radio" id="relation-radio-2" value="2"  required="required"> No
                                            </div>
                                        </div>
                                        <div id="relation-container">
                                            <div class="form-group">
                                                <label for="work-item-type-filter" class="control-label col-lg-4">Work Item Type</label>
                                                <div class="col-lg-4">
                                                    <select id="work-item-type-filter" name="work-item-type-filter" class="form-control" required="required" value="<?php echo set_value('work-item-type-filter') ?>">
                                                            <option ></option>
                                                            <?php foreach ($work_item_types as $work_item_type):  ?>  
                                                                <option value="<?php echo $work_item_type->work_type_id ?>"><?php echo $work_item_type->description ?></option> 
                                                            <?php endforeach; ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="work-item" class="control-label col-lg-4">Select Work Item</label>
                                                <div class="col-lg-4">
                                                    <select id="work-item" name="work-item" class="form-control" required="required" value="<?php echo set_value('work-item') ?>">
                                                            <option ></option>
                                                            <?php foreach ($work_items as $work_item_type):  ?>  
                                                                <option value="<?php echo $work_item_type->work_item_id ?>"><?php echo $work_item_type->description ?></option> 
                                                            <?php endforeach; ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="relation-type" class="control-label col-lg-4">Relation Type</label>
                                                <div class="col-lg-4">
                                                    <select id="relation-type" name="relation-type" class="form-control" required="required" >
                                                            <option ></option>
                                                            <?php foreach ($relation_types as $relation_type):  ?>  
                                                                <option value="<?php echo $relation_type->relation_type_id ?>"><?php echo $relation_type->Description ?></option> 
                                                            <?php endforeach; ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg " />
                                            <a href="#" class="btn btn-success btn-lg" id ="link-add-another" >Add Another</a>
                                            <input type="reset" id="btn-reset" value="Clear" class="btn btn-warning btn-lg " />
                                             <a href="<?php echo base_url()?>Work_item/edit_work_item_wizard_form/<?php echo $work_item->work_item_id ?>"  id="btn-cancel"  class="btn btn-danger btn-lg " />Back</a>
                                        </div>

                                    </form>
                                </div>
            </div>
        </div>
    </div>
</div>

