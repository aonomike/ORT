<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Users </h5>
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
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create_users' ,'method'=>'post' );
                                                echo form_open('Users/',$attributes);
                                             ?> 
                                         <div class="form-group">
                                            <label class="control-label col-lg-4" for="staff" >Staff</label>
                                            <div class="col-lg-4">
                                                <select id="staff" value="<?php echo set_value('staff');?>" name="staff" class="form-control" required="required">
                                                    <?php 
                                                        if(is_array($staff))
                                                        {
                                                            foreach ($staff as $s):  ?>  
                                                       
                                                        <option value="<?php echo $s->staff_id?>"><?php echo $s->first_name." ".$s->second_name." ".$s->last_name ?></option> 
                                                    <?php endforeach;  }
                                                    ?>                                                 
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="control-label col-lg-4">Username</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo set_value('username');?>" id="username" name="username" class="form-control"  required="required" />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="password" class="control-label col-lg-4">Password</label>
                                            <div class="col-lg-4">
                                                <input type="password" value="<?php echo set_value('password');?>" placeholder="password" class="form-control" name="password" id="password" required="required"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cof-pass" class="control-label col-lg-4">Confirm Password</label>
                                            <div class="col-lg-4">
                                                <input type="password" value="<?php echo set_value('cof-pass');?>" name="cof-pass" id="cof-pass" placeholder="Re type password" class="form-control" required="required"  />
                                            </div>
                                        </div> 
                                       
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="user-type">User Type</label>
                                            <div class="col-lg-4">
                                                <select id="user-type" name="user-type" class="form-control" required="required">
                                                    <?php 
                                                        if(is_array($user_type))
                                                        {
                                                            foreach ($user_type as $u):  ?>  
                                                        <option value="<?php echo $u->user_type_id ;?>"><?php echo $u->Description ?></option> 
                                                    <?php endforeach;
                                                   } ?> 
                                                    
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

