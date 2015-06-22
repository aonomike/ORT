<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Staff Contact</h5>
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
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-staff' ,'method'=>'post' );
                                                echo form_open('Staff_controller/update_staff_contact',$attributes);
                                             ?> 
                                        <div class="form-group">
                                            <label for="contact-id" class="control-label col-lg-4"></label>
                                            <div class="col-lg-4">
                                                <input type="hidden" value="<?php echo $contacts->contact_id; ?>" id="contact-id" name="contact-id" class="form-control"  required="required" />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="contact-value" class="control-label col-lg-4">Contact Value</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo $contacts->contact_value; ?>" id="contact-value" name="contact-value" class="form-control"  required="required" />
                                            </div>
                                        </div> 
                                       
                                       
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="contact-type" >Contact Type</label>
                                            <div class="col-lg-4">
                                                <select id="contact-type" value="<?php echo set_value($contacts->contact_type);?>" name="contact-type" class="form-control" required="required">
                                                    <option></option>
                                                     <?php foreach ($contact_type as $type):  ?> 
                                                        <option value="<?php echo $type->contact_type_id ?>" 
                                                            <?php 
                                                                if (is_array($contacts))
                                                                {
                                                                    if($type->contact_type_id==$contacts->contact_type)
                                                                    {
                                                                         echo 'selected="selected"';
                                                                    }
                                                                }
                                                            ?>
                                                            >
                                                            <?php echo $type->descriptions ?> 
                                                        </option> 
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

