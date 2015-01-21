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
                                     <b><?php echo $work_item->description. ' ('.$work_item->Work_item_type.')'; ?></b>
                                </div>
                                <div class="panel-body">                                    
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-success"><b>Work Item Name: </b> <?php echo $work_item->description ?></li>
                                            <li class="list-group-item list-group-item-info"><b>Work Item Type: </b> <?php echo $work_item->Work_item_type ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Submission Deadline: </b> <?php echo $work_item->submission_deadline ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Date Created: </b> <?php echo $work_item->creation_date ?></b></li>
                                        </ul>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title"><?php echo 'Authors for '.$work_item->description. ' ('.$work_item->Work_item_type.')'; ?></h3>
                                </div>
                                <div class="panel-body">                                    
                                         <ul class="list-group">
                                          <?php
                                           foreach ($work_item_author as $a) {
                                            echo '<li class="list-group-item list-group-item-success"><b>'.$a->first_name.' '.$a->last_name.' '.$a->second_name.' - '.$a->author_type.' </b></li>';  
                                          } ?>
                                        </ul>                                    
                                </div>
                            </div>
                        </div>

                    </div> 

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <b><?php echo $work_item->description. ' ('.$work_item->Work_item_type.')'; ?></b>
                                </div>
                                <div class="panel-body">                                    
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-success"><b>Work Item Name: </b> <?php echo $work_item->description ?></li>
                                            <li class="list-group-item list-group-item-info"><b>Work Item Type: </b> <?php echo $work_item->Work_item_type ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Submission Deadline: </b> <?php echo $work_item->submission_deadline ?></b></li>
                                            <li class="list-group-item list-group-item-info"><b>Date Created: </b> <?php echo $work_item->creation_date ?></b></li>
                                        </ul>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title"><?php echo $work_item->description. ' Stage Status History'; ?></h3>
                                </div>
                                <div class="panel-body">      
                                           <?php //print_r( $work_item_stage); ?>                       
                                         <ul class="list-group">
                                          <?php
                                           foreach ($work_item_stage as $wis) {
                                                $string= '<li class="list-group-item list-group-item-success"><b> Stage : </b>'.$wis->stage.'<b> Status: </b>';
                                                 if (is_null($wis->stage_status))
                                                    { 
                                                        $string.='Not Recorded';
                                                     }
                                                else 
                                                    {
                                                        $string.= $wis->stage_status;
                                                    }
                                                $string.='</li>';  

                                                echo $string;
                                          } ?>
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

