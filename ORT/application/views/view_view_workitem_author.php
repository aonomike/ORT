<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>View  <b><?php echo' '.$work_item->description. ' ('.$work_item->Work_item_type.')'; ?></b></h5>
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <b><?php echo ($work_item->description); ?></b>
                                </div>
                                <div class="panel-body">                                    
                                    <ul  class="list-group">
                                        <li class="list-group-item list-group-item-success"><b>Author Name: </b> <?php echo $work_item_author->first_name.' '.$work_item_author->second_name ?></li>
                                        <li class="list-group-item list-group-item-success"><b>Author Type: </b> <?php echo $work_item_author->author_type_description ?></li>
                                        <li class="list-group-item list-group-item-info"><b>Institution of Affiliation: </b> <?php echo $work_item_author->organisation ?></li>
                                        <li class="list-group-item list-group-item-info"><b>Designation: </b> <?php echo $work_item_author->designation ?></li>
                                        <li class="list-group-item list-group-item-info"><b>Country: </b> <?php echo $work_item_author->country ?></li>
                                    </ul>
                                    <a href="<?php echo base_url();?>Work_item_author/edit_work_items_author_form/<?php echo $work_item_author->id ?>" class="btn btn-primary btn-line">Edit</a>
                                 </div>
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>

