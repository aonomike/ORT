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
							                    <a href="<?php echo base_url();?>Relate_work_items/create_work_item_relation_form/<?php echo $work_item_id; ?>" class="btn btn-primary btn-line">Add New Relation</a>
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Related To</th>	
		                                <th>Related To Ref</th>	
		                                <th>Related To Item Type</th> 
		                                <th>Relation Type</th>                            	
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                         <tfoot>
		                        	<tr>                                
		                                <th>Related To</th>
		                                <th>Related To Ref</th>
		                                <th>Related To Item Type</th> 
		                                <th>Relation Type</th> 
		                            	<th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>

		                        		<?php if (is_array($relations)){ ?>
			                        	    <?php foreach ($relations as $r): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $r->related_to_item; ?></td>
				                           			<td><?php echo $r->related_to_ref_no; ?></td>
				                           			<td><?php echo $r->related_to_work_item_type; ?></td>
				                           			<td><?php echo $r->relation_type; ?></td>
				                           			<td>
		                           			    		<div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li> 
									                            		<a href="<?php echo base_url();?>Relate_work_items/edit_related_work_items/<?php echo $r->relation_id; ?>"><i class="icon-edit"></i> Edit </a>
									                           		</li>
									                           		<li>
									                            		<a href="<?php echo base_url();?>Relate_work_items/delete_relation/<?php echo $r->relation_id; ?>"><i class="glyphicon glyphicon-trash"></i> Recycle Bin </a>
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