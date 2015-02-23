   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> <?php //if (isset($))
                            //{
                             //   echo($page_heading);
                           // } ?>
                           

                </h2>
               <b> Ref No:</b> <?php echo $work_item->reference_number ?>	<br/>
               <b> Work Item Name:</b> <?php echo $work_item->description ?><br/>
                <b> Work Item Type:</b> <?php echo $work_item->Work_item_type ?>




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
		                Work Item Author
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Work_item_author/create_work_items_author_form/<?php echo $work_item_id ?>" class="btn btn-primary btn-line">New</a>							                   
							                </div>
	                   					</td>
		                            </tr>
		                            <tr>		                
		                                <th>Author Name</th>
		                                <th>Author Type</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tfoot>
		                        	<tr>                       
		                                <th>Author Name</th>
		                                <th>Author Type</th>
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>
		                        		<input type="hidden" name="work-item-id" id="work-item-id" value="<?php echo $work_item_id ?>" />
		                        		<?php if (is_array($work_item_author)){ ?>
			                        	    <?php foreach ($work_item_author as $a): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $a->first_name.' '.$a->second_name.' '.$a->last_name; ?></td>
				                           			<td><?php echo $a->author_type_description; ?></td>
				                           			<td>
				                           				<div class="btn-group">
																	<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
																	<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																		<ul class="dropdown-menu">
																			<li>
											                    				<a href="<?php echo base_url();?>Work_item_author/create_work_items_author_form/<?php echo $a->id; ?>"><i class="icon-eye-open"></i> View Details</a>
									                            			</li>
									                            			<li>
											                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $a->id; ?>"><i class="icon-edit"></i> Add Contact </a>
											                           		</li>												                           												                            
											                           		<li>
											                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $a->id; ?>"><i class="icon-remove-circle"></i> Retire Author </a>
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
</div>