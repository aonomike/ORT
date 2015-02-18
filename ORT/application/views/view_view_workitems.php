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
                                     <b><?php echo ($work_item->Work_item_type); ?></b>
                                </div>
                                <div class="panel-body">                                    
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-success"><b>Reference Number: </b> <?php echo $work_item->reference_number ?></li>
                                            <li class="list-group-item list-group-item-success"><b>Scientific Item Title: </b> <?php echo $work_item->description ?></li>
                                            <li class="list-group-item list-group-item-info"><b>Scientific Item Type: </b> <?php echo $work_item->Work_item_type ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Submission Deadline: </b> <?php echo $work_item->submission_deadline ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Description: </b> <?php echo $work_item->submission_deadline ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Date Created: </b> <?php echo $work_item->creation_date ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Date Last Updated: </b> <?php echo $work_item->date_last_updated ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Last Updated By: </b> <?php echo $work_item->last_updated_by_name ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Created By: </b> <?php echo $work_item->created_by_name ?></b></li>
                                        </ul>  

                                        <a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $work_item->work_item_id ?>" class="btn btn-primary btn-line">Edit</a>
                                                                              
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title"><?php echo 'Authors' ?></h3>
                                </div>
                                <div class="panel-body">                                    
                                         <ul class="list-group">
                                          <?php
                                          if (is_array($work_item_author))
                                              {
                                               foreach ($work_item_author as $a) {
                                                echo '<li class="list-group-item list-group-item-success"><b>'.$a->first_name.' '.$a->last_name.' '.$a->second_name.' - '.$a->author_type.' </b></li>';  
                                              }
                                          } 

                                          else
                                          {
                                            echo 'No author for this item has been added. Click <a href="Authors/create_new_authors_form">here</a> to add author';
                                          }

                                          ?>
                                        </ul>                                    
                                </div>
                            </div>
                        </div>

                    </div> 

                                             
                </div>
            </div>
        </div>
    </div>
</div>

