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
                                                echo form_open('Work_item_author/create_work_item_author_two',$attributes);
                                             ?> 
                                         
                                        <div class="form-group">                                            
                                                <input type="hidden" id="work-item-id" name="work-item-id" value="<?php echo $work_item->work_item_id ?>" class="form-control" required="required"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="author">Author Name</label>
                                            <div class="col-lg-4">                                                
                                                <select id="author" name="author" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($authors as $author):  ?>  
                                                        <option value="<?php echo $author->author_id ?>"><?php echo $author->first_name.' '.$author->second_name  ?></option> 
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                 <a href="#" type="submit" title="click to add new author" class="btn btn-info" name="create-new" id="create-new" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span></a>
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

                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="organisation">Institution of Affiliation</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="organisation" name="organisation" class="form-control" required="required">
                                            </div>  
                                                                                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="designation">Designation</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="designation" name="designation" class="form-control" required="required">
                                            </div>  
                                                                                                
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="country">Country</label>
                                            <div class="col-lg-4">
                                                <select id="country" name="country" class="form-control" required="required">
                                                    <option></option>
                                                    <?php foreach ($countries as $country):  ?>  
                                                        <option value="<?php echo $country->id ?>"><?php echo $country->Name ?></option> 
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>  
                                                                                                
                                        </div>
                                                                              

                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg " />
                                            <input type="button" id="btn-add-another" value="Add Another" class="btn btn-warning btn-lg " />
                                            <a href="#"  id="btn-cancel"  class="btn btn-danger btn-lg " />Back</a>
                                        </div>

                                    </form>

                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Create New Author Window</h4>
                                          </div>
                                          <div class="modal-body">
                                              <div class="row">
                                                    <?php echo validation_errors()?>
          
                                                    <?php
                                                    $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create_users' ,'method'=>'post' );
                                                        echo form_open('Authors/Create_missing_authors',$attributes);
                                                     ?> 
                                                    <input type="hidden" id="work-items-id" value="<?php echo $work_item->work_item_id;?>" />
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-4" for="title" >Title</label>
                                                        <div class="col-lg-4">
                                                            <select id="title" value="<?php echo set_value('title');?>" name="title" class="form-control" required="required">
                                                                <option>  </option>
                                                                <?php 
                                                                    if(is_array($titles))
                                                                    {
                                                                        foreach ($titles as $title):  ?>  
                                                                   
                                                                    <option value="<?php echo $title->id ?>"><?php echo $title->description ?></option> 
                                                                <?php endforeach;  }
                                                                ?>                                                 
                                                            </select>
                                                        </div> 
                                                        <label id="title-error" class="error">*</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="first-name" class="control-label col-lg-4">First Name</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="First Name" value="<?php echo set_value('first-name');?>" id="first-name" name="first-name" class="form-control"  required="required" />
                                                        </div>  
                                                         <label id="first-name-error" class="error">*</label>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="second-name" class="control-label col-lg-4">Other Names</label>
                                                        <div class="col-lg-4">
                                                            <input type="Text" value="<?php echo set_value('second-name');?>" placeholder="Other Names" class="form-control" name="second-name" id="second-name" required="required"/>
                                                        </div>
                                                        <label id="second-name-error" class="error">*</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telephone" class="control-label col-lg-4">Telephone</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Telephone" value="<?php echo set_value('telephone');?>" id="telephone" name="telephone" class="form-control"  />
                                                        </div>  
                                                        <label id="email-error" class="error"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="control-label col-lg-4">Email</label>
                                                        <div class="col-lg-4">
                                                            <input type="email" placeholder="Primary Email" value="<?php echo set_value('email');?>" id="email" name="email" class="form-control"  required="required" />
                                                        </div> 
                                                        <label id="email-error" class="error">*</label> 
                                                    </div>
                                                   
                                                   
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" id="btn-submit-staff_modal" value="Submit" class="btn btn-primary btn-lg " />
                                            <input type="reset" id="btn-resetstaff_modal" value="Clear" class="btn btn-warning btn-lg " />
                                            <input type="button" id="btn-cancel-staff_modal"  value="Cancel" class="btn btn-danger btn-lg " />
                                        </div>

                                    </form>
                                              </div> 
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                 </div>
            </div>
        </div>
    </div>
</div>

