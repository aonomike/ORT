   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Users Types</h2>



            </div>
        </div>

        <hr />
		<?php if (isset($success)) { ?>
			<div class="alert alert-success alert-block fade in" id="success-alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Success</h4>
					<p><?php echo $success; ?> </p>
				</div><!--end alert-->
		<?php }; ?>
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                Manage User Types
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>User_type_controller/create_new_user_type_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-success btn-line">View</a>
							                    <a href="<?php echo base_url();?>Authors/edit_work_item_type" class="btn btn-warning btn-line">Edit</a>
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>User Type ID</th>
		                                <th>Description</th>		                                
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($user_type)){ ?>
			                        	    <?php foreach ($user_type as $s): ?>
				                           		<tr class="gradeA">
				                           			<td>
				                           				<?php echo $s->user_type_id; ?>
				                           				<input type="checkbox" id="checkbox_<?php echo $s->user_type_id; ?>" value="<?php echo $s->user_type_id; ?>" name="checkbox">
				                           			</td>
				                           			<td><?php echo $s->Description; ?></td>				                           			
				                           		</tr>
				                           <?php  endforeach ; ?>
			                           <?php } ?>
			                        </form>
		                        </tbody>
		                    </table>
		                </div>		               
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>