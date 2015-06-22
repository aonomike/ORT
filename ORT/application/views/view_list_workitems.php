   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> <?php if (isset($page_heading))
                			{
                				echo($page_heading);
                			} ?></h2>
            </div>
        </div>

        <hr />
		<?php if (isset($success)) { ?>
			<?php if (isset($error_message)) { ?>
				<div class="alert alert-danger alert-block fade in" id="success-alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Error</h4>
						<p><?php echo $success; ?> </p>
				</div>
				<?php }
				else{ ?>
				<div class="alert alert-success alert-block fade in" id="success-alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Success</h4>
						<p><?php echo $success; ?> </p>
				</div><!--end alert-->
		<?php }}; ?>

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <?php if (isset($page_sub_heading))
                			{
                				echo($page_sub_heading);
                			} ?>
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">

		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Work_item/create_work_items_form_two" class="btn btn-primary btn-line">Add New Item</a>
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Reference Number</th>
		                            	<th>Title</th>
		                                <th>Work Item Type</th>
		                                <th>Submission Deadline</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                         <tfoot>
		                        	<tr>                                
		                                <th>Reference Number</th>
		                            	<th>Title</th>
		                                <th>Work Item Type</th>
		                                <th>Submission Deadline</th>
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>

		                        		<?php if (is_array($work_item)){ ?>
			                        	    <?php foreach ($work_item as $work): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $work->reference_number; ?></td>
				                           			<td><?php echo $work->description; ?></td>					                           		
				                           			<td><?php echo $work->Work_item_type; ; ?></td>
				                           			<td><?php echo substr($work->submission_deadline, 0,10); ?></td>
				                           		    <td>
		                           			    		<div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li>
									                    				<a href="<?php echo base_url();?>Work_item/view_work_item/<?php echo $work->work_item_id; ?>"><i class="icon-eye-open"></i> View Details </a>
							                            			</li>

							                            			<li>
									                    				<a href="<?php echo base_url();?>Work_item_author/list_work_item_author_by_work_item_id/<?php echo $work->work_item_id; ?>"><i class="glyphicon glyphicon-font"></i> View Authors </a>
							                            			</li>
							                            			<li> 
									                            		<a href="<?php echo base_url();?>Work_item_stage_output/list_work_item_stage_output_with_workitem_id/<?php echo $work->work_item_id; ?>"><i class="icon-edit"></i> View Documents </a>
									                           		</li>
									                           		<li>
									                            		<a href="<?php echo base_url();?>Work_item/list_related_work_item/<?php echo $work->work_item_id; ?>"><i class="glyphicon glyphicon-retweet"></i> Link Work Items </a>
									                            	</li>												                           												                            
									                           		<li>
									                            		<a href="<?php echo base_url();?>Work_item/void_work_items_by_id/<?php echo $work->work_item_id; ?>"><i class="glyphicon glyphicon-trash"></i> Recycle Bin </a>
									                            	</li>
														  		</ul>
														</div>
												    </td>						                           			
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