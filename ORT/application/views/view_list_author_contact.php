   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> 
                	<?php if (isset($page_heading))
                			{
                				echo($page_heading);
                			} ?>
                 </h2>



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
		                Manage Author Contacts
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Staff_controller/create_staff_contact_form/<?php echo $author->staff_id ?>" class="btn btn-primary btn-line">Add New Contact</a>							                   
							                </div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Name</th>
		                                <th>Contact Type</th>
		                                <th>Contact Value</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tfoot>
		                        	<tr>
		                                <th>Name</th>
		                                <th>Contact Type</th>
		                                <th>Contact</th>
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($author_contacts)){ ?>
			                        	    <?php foreach ($author_contacts as $s): ?>
				                           		<tr class="gradeA">
				                           			<td>
					                           		<?php echo $s->first_name." ".$s->second_name; ?></td>
					                           		<td><?php echo  $s->descriptions; ?></td>
				                           			<td><?php echo $s->contact_value; ?></td>	                           			
				                           			<td>				                           				
												        <div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
															<ul class="dropdown-menu">
						                            			<li>  
								                            		<a href="<?php echo base_url();?>Staff_controller/edit_staff_contact/<?php echo $s->contact_id; ?>"><i class="icon-edit"></i>  Edit Contact</a>
								                           		</li>												                           												                            
								                           		<li>
								                            		<a href="<?php echo base_url();?>Staff_controller/delete_staff_contact/<?php echo $s->contact_id; ?>"><i class="icon-remove-circle"></i> Delete Contact </a>
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