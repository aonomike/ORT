   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Users </h2>



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
		                Manage Users
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Users/create_new_users_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-success btn-line">View</a>
							                    <a href="<?php echo base_url();?>Authors/edit_work_item_type" class="btn btn-warning btn-line">Edit</a>
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>ID</th>
		                                <th>Staff Name</th>
		                                <th>User Name</th>
		                                <th>User Type </th>
		                                <th>Active</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($users)){ ?>
			                        	    <?php foreach ($users as $s): ?>
				                           		<tr class="gradeA">
				                           			<td>
				                           				<?php echo $s->user_id; ?>
				                           				<input type="checkbox" id="checkbox_<?php echo $s->user_id; ?>" value="<?php echo $s->user_id; ?>" name="checkbox">
				                           			</td>
				                           			<td><?php echo $s->first_name.' '.$s->second_name.' '.$s->last_name; ?></td>
				                           			<td><?php echo $s->username; ?></td>
				                           			<td><?php echo $s->user_type_description; ?></td>
				                           			<td><?php  if($s->is_deleted==1)
				                           							{
				                           								echo "No";
				                           								}
				                           							elseif ($s->is_deleted==0) {
				                           								# code...
				                           								echo "Yes";
				                           							}?></td>
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