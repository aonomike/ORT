<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Work Item</h5>
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
                     <?php echo validation_errors()?>          
                        <?php
                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-items' ,'method'=>'post' );
                            echo form_open('Work_Item/create_work_items_two',$attributes);
                         ?> 
                        <div class="form-group">
                            <label for="title" class="control-label col-lg-4">Scientific Item Title</label>
                            <div class="col-lg-4">
                                <input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title') ?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="work-item-type">Scientific Item Type</label>
                            <div class="col-lg-4">
                                <select id="work-item-type" name="work-item-type" class="form-control" required="required" value="<?php echo set_value('work-item-type') ?>">
                                   <option ></option>
                                    <?php foreach ($work_item_type as $s):  ?>  
                                        <option value="<?php echo $s->work_type_id ?>"><?php echo $s->description ?></option> 
                                    <?php endforeach; ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reference-number" class="control-label col-lg-4">Reference Number</label>
                            <div class="col-lg-4">
                                <input type="text" id="reference-number" name="reference-number" class="form-control" value="<?php echo set_value('reference-number') ?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group" id="crucial-date">
                            <label id="crucial-date-label" for="submission-deadline" class="control-label col-lg-4">Deadline Date</label>

                            <div class="col-lg-4">
                                <input type="datetime" id="submission-deadline" name="submission-deadline" class="form-control"  data-date-format="yyyy-mm-dd" required="required" value="<?php echo set_value('submission-deadline') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details" class="control-label col-lg-4">Description</label>

                            <div class="col-lg-4">
                                <textarea name="details" id="details" cols="52" ><?php echo set_value('details') ?></textarea> 
                            </div>
                        </div>
                       <!--  <div class="form-group" id="div-relations">
                            <label for="enable_relation" class="control-label col-lg-4"></label>

                            <div class="col-lg-4">
                                <input type="checkbox" name="enable_relation" id="enable_relation" value="<?php echo set_value('enable_relation') ?>"/> Enable Relation
                            </div>
                        </div>  -->
                        <!-- <div class="form-group" id="relate_to_work_item" >
                            <label for="related-work-item" class="control-label col-lg-4">Relate To</label>

                            <div class="col-lg-4">
                                <select id="related-work-item" name="related-work-item" class="form-control" required="required" value="<?php echo set_value('related-work-item') ?>">
                                   <option ></option>
                                    <?php foreach ($work_items as $s):  ?>  
                                        <option value="<?php echo $s->work_item_id ?>"><?php echo $s->description ?></option> 
                                    <?php endforeach; ?> 
                                </select>
                            </div>
                        </div>  -->
                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                            <input type="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg " />
                            <input type="reset" id="btn-reset" value="Clear" class="btn btn-warning btn-lg " />
                            <a  id="cancel-work-item" value="Cancel" class="btn btn-danger btn-lg " href="<?php echo base_url()?>Home/load_home_page"> Back</a>
                        </div>

                    </form>                
            </div>
        </div>
    </div>
</div>

