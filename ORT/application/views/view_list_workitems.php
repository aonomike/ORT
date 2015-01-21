<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Work Items </h2>



            </div>
        </div>

        <hr />
	
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                Manage Work Items
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Work_item/create_work_items_form" class="btn btn-primary btn-line">New</a>		
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                            	<th>Title</th>
		                                <th>Author</th>
		                                <th>Author Type</th>
		                                <th>Work Item Type</th>
		                                <th>Submission Deadline</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tfoot>
		                        	<tr>
		                            	<th>Title</th>
		                                <th>Author</th>
		                                <th>Author Type</th>
		                                <th>Work Item Type </th>
		                                <th>Submission Deadline</th>
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody id="table-body">
		                        	<form>
		                        	    <?php 
			                        	    if(is_array($work_item))
			                        	    {
				                        	    foreach ($work_item as $work): ?>
					                           		<tr class="gradeA">
					                           			
					                           			<td><?php echo $work->description; ?></td>
					                           			<td><?php echo $work->first_name.' '.$work->second_name.' '.$work->last_name; ?></td>
					                           			<td><?php echo $work->author_type; ?></td>
					                           			<td><?php echo $work->Work_item_type; ?></td>
					                           			<td><?php echo substr($work->submission_deadline, 0,10); ?></td>
					                           			<td>
				                           			    		<div class="btn-group">
																	<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
																	<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																		<ul class="dropdown-menu">
																			<li>
											                    				<a href="<?php echo base_url();?>Work_item/view_work_item/<?php echo $work->work_item_id; ?>"><i class="icon-eye-open"></i> View </a>
									                            			</li>
									                            			<li>
											                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $work->work_item_id; ?>"><i class="icon-edit"></i> Edit </a>
											                           		</li>												                           												                            
											                           		<li>
											                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $work->work_item_id; ?>"><i class="icon-remove-circle"></i> Delete </a>
											                            	</li>
																  </ul>
																</div>
												        </td>									                    
													</tr>
					                           <?php endforeach ;
				                         	} ?>
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