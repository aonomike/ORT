   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Staff </h2>



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
		                Manage Staff
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Staff_controller/create_new_staff_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-success btn-line">View</a>
							                    <a href="<?php echo base_url();?>Authors/edit_work_item_type" class="btn btn-warning btn-line">Edit</a>
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>ID</th>
		                                <th>Staff Name</th>
		                                <th>Designation</th>
		                                <th>Program </th>
		                                <th>Station</th>
		                            </tr>
		                        </thead>
		                        <tfoot>
		                        	<tr>
		                                <th>ID</th>
		                                <th>Staff Name</th>
		                                <th>Designation</th>
		                                <th>Program </th>
		                                <th>Station</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($staff)){ ?>
			                        	    <?php foreach ($staff as $s): ?>
				                           		<tr class="gradeA">
				                           			<td>
				                           				<?php echo $s->staff_id; ?>
				                           				<input type="checkbox" id="checkbox_<?php echo $s->staff_id; ?>" value="<?php echo $s->staff_id; ?>" name="checkbox">
				                           			</td>
				                           			<td><?php echo $s->first_name.' '.$s->second_name.' '.$s->last_name; ?></td>
				                           			<td><?php echo $s->designation_name; ?></td>
				                           			<td><?php echo $s->program_name; ?></td>
				                           			<td><?php echo $s->station_name; ?></td>
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