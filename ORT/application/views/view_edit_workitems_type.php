<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
            	<div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Create Work Item Type</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li>
                                    <div class="btn-group">
                                        <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                            href="#collapseOne">
                                            <i class="icon-chevron-up"></i>
                                        </a>
                                        
                                    </div>
                                </li>                
                            </ul>
                        </div>
                    </header>
                </div>
                 <div id="collapseOne" class="accordion-body collapse in body">
                                     <?php echo validation_errors()?>          
                                        <?php
                                            $attributes = array('class' =>'form-horizontal', 'id'=>'block-validate','name'=>'edit-work-item-type' ,'method'=>'post' );
                                            echo form_open('Work_item_type/create_work_item_type',$attributes);
                                         ?>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" for="work-item-type">Work Item Type</label>
                                        <div class="col-lg-4">
                                            <select id="work-item-id" name="work-item-id" class="form-control">
                                                <option selected="selected" value="8">Work Item 1</option>
                                                <option value="9">Work Item Type 1</option>
                                                <option value="10">Work Item Type 1</option>
                                                <option value="11">Work Item Type 1</option>
                                                <option value="12">Work Item Type 1</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label col-lg-4">Description</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="description" name="description" class="form-control" />
                                            </div>
                                        </div> 
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg " />
                                            <input type="reset" id="btn-reset" value="Clear" class="btn btn-warning btn-lg " />
                                            <input type="button" id="btn-cancel" value="Cancel" class="btn btn-danger btn-lg " />
                                        </div>

                                    </form>
                                </div>
            </div>
        </div>
    </div>
</div>

