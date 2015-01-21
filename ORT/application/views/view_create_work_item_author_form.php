<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5><?php if (isset($page_heading))
                            {
                                echo($page_heading);
                            } ?></h5>
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
                                                $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-author' ,'method'=>'post' );
                                                echo form_open('Work_item_author/create_work_item_author',$attributes);
                                             ?> 
                                         
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="work-item-type-filter">Work Item Type</label>
                                            <div class="col-lg-4">
                                                <select id="work-item-type-filter" name="work-item-type-filter" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($work_item_types as $work_item_type):  ?>  
                                                        <option value="<?php echo $work_item_type->work_type_id ?>"><?php echo $work_item_type->description ?></option> 
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="work-item">Work Item</label>
                                            <div class="col-lg-4">                                                
                                                <select id="work-item" name="work-item" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($work_items as $work_item):  ?>  
                                                        <option value="<?php echo $work_item->work_item_id ?>"><?php echo $work_item->description ?></option> 
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="author">Author</label>
                                            <div class="col-lg-4">                                                
                                                <select id="author" name="author" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($authors as $author):  ?>  
                                                        <option value="<?php echo $author->author_id ?>"><?php echo $author->first_name.' '.$author->second_name.' '.$author->last_name ?></option> 
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="author-type">Author Type</label>
                                            <div class="col-lg-4">
                                                <select id="author-type" name="author-type" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($author_types as $author_type):  ?>  
                                                        <option value="<?php echo $author_type->author_type_id ?>"><?php echo $author_type->descriptions ?></option> 
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

