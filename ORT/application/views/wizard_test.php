 <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12" id="work-item-banner">


                <h2> New Work Item Wizard</h2>



            </div>
        </div>
	        <div id="rootwizard">
			    <div class="navbar">
				    <div class="navbar-inner">
					    <div class="container">
						    <ul>
							    <li><a href="#tab1" data-toggle="tab">Work Item</a></li>
							    <li><a href="#tab2" data-toggle="tab">Add Authors</a></li>
							    <li><a href="#tab3" data-toggle="tab">Work Item IDs</a></li>
						    </ul>
				    	</div>
			    	</div>
				</div>
				<div id="bar" class="progress progress-striped active">
					<div class="bar"></div>
					</div>
				<div class="tab-content">
					<div class="tab-pane" id="tab1">
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
	                                    <label class="control-label col-lg-4" for="reference-number">Reference Number</label>
	                                    <div class="col-lg-4">
	                                        <input type="text" id="reference-number" name="reference-number" class="form-control" value="<?php echo set_value('reference-number') ?>" required="required" />
	                                    </div>
	                                </div> 
	                            </form> 
				</div>
			    <div class="tab-pane" id="tab2">
				    <?php echo validation_errors()?>          
	                        <?php
	                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-author' ,'method'=>'post', 'role'=>'form' );
	                            echo form_open('Work_item_author/create_work_item_author',$attributes);
	                         ?>
	                       
	                            <div class="form-group">
	                                <label class="control-label col-lg-4" for="author">Author</label>
	                                <div class="col-lg-4">                                                
	                                    <select id="author" name="author" class="form-control" required="required">
	                                    	<option ></option>
	                                        <?php foreach ($authors as $author):  ?>  
	                                            <option value="<?php echo $author->author_id ?>"><?php echo $author->first_name.' '.$author->second_name.' '.$author->last_name ?></option> 
	                                        <?php endforeach; ?> 
	                                    </select>
	                                </div>
	                            </div>
	                        
	                            <div class="form-group">
	                                <label class="control-label col-lg-4" for="author-type">Author Type</label>
	                                <div class="col-lg-4">
	                                	<option ></option>
	                                    <select id="author-type" name="author-type" class="form-control" required="required">
	                                        <?php foreach ($author_types as $author_type):  ?>  
	                                            <option value="<?php echo $author_type->author_type_id ?>"><?php echo $author_type->descriptions ?></option> 
	                                        <?php endforeach; ?> 
	                                    </select>                                    
	                                </div>
	                                <button id="btn-author" class="btn btn-primary btn-sm add-author" value="Add Another">Add Another</button>
	                            </div> 
	                       </form>
	                        <div id="append_div">
	                            
	                        </div>  
				</div>
			    <div class="tab-pane" id="tab3">
			    	 <?php echo validation_errors()?>          
	                        <?php
	                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-work-item-author' ,'method'=>'post', 'role'=>'form' );
	                            echo form_open('Work_item_author/create_work_item_author',$attributes);
	                         ?>
	                       
	                            <div class="form-group">
	                                <label class="control-label col-lg-4" for="author">Work Item ID</label>
	                                <div class="col-lg-4">                                                
	                                    <input type="text" class="form-control" required="required">
	                                </div>
	                            </div>
	                        
	                            <div class="form-group">
	                                <label class="control-label col-lg-4" for="author-type">ID Type</label>
	                                <div class="col-lg-4">
	                                    <select id="author-type" name="author-type" class="form-control" required="required">
	                                        <option></option>
	                                        <?php foreach ($author_types as $author_type):  ?>  
	                                            <option value="<?php echo $author_type->author_type_id ?>"><?php echo $author_type->descriptions ?></option> 
	                                        <?php endforeach; ?> 
	                                    </select>                                    
	                                </div>
	                                <button id="btn-author" class="btn btn-primary btn-sm add-work-item-id" value="Add Another">Add ID</button>
	                            </div> 
	                       </form>
	                  
			    </div>
				<ul class="pager wizard">
						<li class="previous first" style="display:none;"><a href="#">First</a></li>
				    <li class="previous"><a href="#">Previous</a></li>
				    <li class="next last" style="display:none;"><a href="#">Last</a></li>
				    <li class="next"><a href="#">Next</a></li>
				</ul>
			</div>	
		</div>
		<div id="for-data-table" class="row">
			<div class="col-lg-12" id="author_names">
				
			</div>			
		</div>
	</div>
</div>