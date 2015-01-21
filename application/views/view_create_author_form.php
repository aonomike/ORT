<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Author </h5>
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
                                    <form action="<?php echo base_url();?>Authors/create_new_author" class="form-horizontal" id="block-validate" method="post">
                                        <?php echo validation_errors()?>
          
                                            <?php
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'create-author' ,'method'=>'post' );
                                                echo form_open('Authors/create_new_author',$attributes);
                                             ?> 
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="staff-id">Select Staff</label>
                                            <div class="col-lg-4">
                                                <select id="staff-id" name="staff-id" class="form-control">
                                                    <option ></option>
                                                    <?php foreach ($staff as $s):  ?>  
                                                        <option value="<?php echo $s->staff_id ?>"><?php echo $s->first_name." ".$s->second_name." ".$s->last_name."-".$s->payroll_number ?></option> 
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

