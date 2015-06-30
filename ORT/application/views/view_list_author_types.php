   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Author Types</h2>



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
		                Manage Author Types
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Author_type/create_new_author_type_form" class="btn btn-primary btn-line">Add New Author Type</a>							                   
							                                   
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Description</th>		                                
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($author_type)){ ?>
			                        	    <?php foreach ($author_type as $s): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $s->descriptions; ?></td>				                           			
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