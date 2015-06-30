   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Authors </h2>
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
		                Linked Research Items
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Authors/create_new_author_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-success btn-line">View</a>
							                    <a href="<?php echo base_url();?>Authors/edit_work_item_type" class="btn btn-warning btn-line">Edit</a>
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>ID</th>
		                                <th>Author Name</th>		                                
		                                <th>Actions</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($author)){ ?>
			                        	    <?php foreach ($author as $a): ?>
				                           		<tr class="gradeA">
				                           			<td>
				                           				<?php echo $a->author_id; ?>
				                           				<input type="checkbox" id="checkbox_<?php echo $a->author_id; ?>" name="checkbox_<?php echo $a->author_id; ?>">
				                           			</td>
				                           			<td><?php echo $a->first_name.' '.$a->second_name.' '.$a->last_name; ?></td>
				                           			<td></td>
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