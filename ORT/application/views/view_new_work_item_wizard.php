<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Status </h5>
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <label id="banner" > cghfhfhfghfhg</label> 
                    </div>
                    <div class="panel-body">
                        <div id="wizard" >
                            <h2> Work Item </h2>
                            <section>
                                <?php echo validation_errors()?>          
                                <?php
                                    $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-items' ,'method'=>'post','role'=>'form' );
                                    echo form_open('Work_Item/create_work_items',$attributes);
                                 ?> 
                                    <div class="form-group">
                                        <label for="title" class="control-label col-lg-4">Work Item Title</label>
                                        <div class="col-lg-4">
                                            <input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title') ?>" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" for="work-item-type">Work Item Type</label>
                                        <div class="col-lg-4">
                                            <select id="work-item-type" name="work-item-type" class="form-control" required="required">
                                               <option ></option>
                                                <?php foreach ($work_item_type as $s):  ?>  
                                                    <option value="<?php echo $s->work_type_id ?>"><?php echo $s->description ?></option> 
                                                <?php endforeach; ?> 
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <input type="hidden" id="selected-tab" name="selected-tab" class="form-control" value="work_item" required="required" />
                                        </div>
                                    </div>            
                                </form> 
                             </section>

                <h2> Authors </h2>
                <section>
                        <?php echo validation_errors()?>          
                            <?php
                                $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-author' ,'method'=>'post', 'role'=>'form' );
                                echo form_open('Work_item_author/create_work_item_author',$attributes);
                             ?>
                            <div class="form-group">
                                    <div class="col-lg-4">
                                        <input type="hidden" id="selected-tabs" name="selected-tabs" class="form-control" value="authors" />
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <input type="hidden" id="work-item-id" name="work-item-id" class="form-control" required="required" />
                                </div>
                            </div> 
                            <div id="clone"> 
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
                                    <button id="btn-author" class="btn btn-primary btn-sm add-author" value="Add Another">Add Another</button>
                                </div> 
                            </div>
                            <div id="append_div">
                                
                            </div>                           
                            
                </section>

                <h2> Work Item Status </h2>
                <section>
                      <?php echo validation_errors()?>          
                        <?php
                                $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-type-stage' ,'method'=>'post', 'role'=>'form' );
                                echo form_open('Work_item_status/create_work_item_status',$attributes);
                             ?> 
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="work-item-type-filter">Work Item Type</label>
                            <div class="col-lg-4">
                                <select id="work-item-type-filter" name="work-item-type-filter" class="form-control" required="required">
                                        <option ></option>
                                        <?php foreach ($work_item_types as $work_item_type):  ?>  
                                            <option value="<?php echo $work_item_type->work_type_id ?>"><?php echo $work_item_type->description ?></option> 
                                        <?php endforeach; ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-lg-4" for="work-item">Work Item </label>
                        <div class="col-lg-4">
                            <select id="work-item" name="work-item" class="form-control" required="required">
                                    <option ></option>
                                    <?php foreach ($work_items as $work_item):  ?>  
                                        <option value="<?php echo $work_item->work_item_id ?>"><?php echo $work_item->description ?></option> 
                                    <?php endforeach; ?> 
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label col-lg-4">Status</label>
                            <div class="col-lg-4">
                            <select id="status" name="status" class="form-control" required="required">
                                    <option ></option>
                                    <?php foreach ($status as $state):  ?>  
                                        <option value="<?php echo $state->status_id ?>"><?php echo $state->description ?></option> 
                                    <?php endforeach; ?> 
                            </select>
                        </div>
                        </div>                        
                </section>

                                <h2></h2>
                                <section>
                                   
                                </section>
                            </div>
                                                 
                        </div>
                    </div>                
                 </div>
            </div>
        </div>
    </div>
</div>

