<?php
//GWMFile
/**
* @copyright (C) 2015 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
defined('_JEXEC') or die();
$gotahit = false;
?>

 <?php if ($schedule) {  ?>   
    <div class="joms-blankslate"><?php echo 'Group Invitation RSVP' ?> <img src="/images/info_3-512.png" width="20" height="20" title="These are invites to golf from other members in your groups."></div>

    <ul class="joms-list--event">
    	<div class="joms-media__body">
    <?php foreach ($schedule as $row) { 
        $gotahit = true;
        $gsid=$row->gsid;
        //group schedule
        $gsModel = CFactory::getModel('groupschedule');
        $gsData = $gsModel->getScheduleDetails($gsid);
        //echo $gsData->needCount . " - " . $gsModel->getGroupScheduleAcceptedCount($gsid);
        if ((trim($gsData->needCount) == "") || ($gsData->needCount > $gsModel->getGroupScheduleAcceptedCount($gsid))) {
        ?>
            <small style="font-weight:bold"><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&gsid='.$gsid); ?>"><?php echo $gsData->CourseName; ?></a></small>
            <br />
        <?php } 
        
    } ?>
    </div>
</ul>
<small><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&task=recresponse'); ?>"><?php echo 'Show All'; ?></a></small>
<?php } //else { ?>
    <!-- <small>Nothing Waiting For Your Response</small>
    <br /><br /> -->
<?php //} ?>

           
    <?php if ($pendingRequests) {  ?>   
    
    <div class="joms-blankslate"><?php echo 'Your Open Requests' ?> <img src="/images/info_3-512.png" width="20" height="20" title="These are invites you have sent to your groups that have not yet been fnalized."></div>

    <ul class="joms-list--event">
    	<div class="joms-media__body">
    <?php foreach ($pendingRequests as $row) { 
    	$gotahit = true; 
        //print_r($row);
        $gsid=$row->selcourse;
        //group schedule
        $gsModel = CFactory::getModel('groupschedule');
        $gsData = $gsModel->getCourseDetails($gsid);
        //print_r($gsData);
        //echo $gsData->needCount . " - " . $gsModel->getGroupScheduleAcceptedCount($gsid);
        ?>
            <small style="font-weight:bold"><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&gsid='.$gsid); ?>"><?php echo $gsData->Name; ?></a></small>
            <br />
        <?php  
    } ?>
    </div>
</ul>
   <small><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&Itemid=131'); ?>"><?php echo 'Show All'; ?></a></small>
<?php } //else { ?>
    <!-- <small>You have no open requests</small>
    <br /><br /> -->
<?php //} ?>
    
    
    <?php if ($useraccept || $useracceptfg) {  ?>   
   
        <div class="joms-blankslate"><?php echo 'Your Schedule' ?> <img src="/images/info_3-512.png" width="20" height="20" title="This is your golfing schedule."></div>
    
        <ul class="joms-list--event">
        <div class="joms-media__body">
    <?php foreach ($useraccept as $row) { 
            $gotahit = true;
            $gsid=$row->id;
            //group schedule
            $gsModel = CFactory::getModel('groupschedule');
            $gsData = $gsModel->getScheduleDetails($gsid);
            //print_r($gsData);
            
            $accbutton=0;
            $scheduleDate = $gsModel->getGroupScheduleDate($gsid);
            foreach ( $scheduleDate as $rowdate ) {
                    //members request sent
                    //$smem= $gsModel->getGroupScheduleMemberCount($gsid);
                    //$accmem= $gsModel->getGroupScheduleAcceptCount($gsid,$rowdate->id,2);
                    //$acctotmem= $gsModel->getGroupScheduleAcceptCount($gsid,$rowdate->id);
                    $accda= $gsModel->getDateAcceptCount($gsid,$rowdate->id);

                    if($accda->actmem>0) { 
                    ?>
                    	<small style="height:15px; font-weight:bold"><?php echo $gsData->teetime; ?> - <a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&gsid='.$gsid.'&did='.$rowdate->id); ?>"><?php echo $gsData->CourseName; ?></a></small>
                        <br />
              	<?php } ?>
           <?php } ?>
            
    <?php } ?>
                        
    <?php foreach ($useracceptfg as $row) { 
            $gotahit = true;
            $gsid=$row->id;
            //group schedule
            $gsModel = CFactory::getModel('groupschedule');
            $gsData = $gsModel->getScheduleDetails($gsid);
            //print_r($gsData);
            
            $accbutton=0;
            $scheduleDate = $gsModel->getGroupScheduleDate($gsid);
            foreach ( $scheduleDate as $rowdate ) {
                    //members request sent
                    //$smem= $gsModel->getGroupScheduleMemberCount($gsid);
                    //$accmem= $gsModel->getGroupScheduleAcceptCount($gsid,$rowdate->id,2);
                    //$acctotmem= $gsModel->getGroupScheduleAcceptCount($gsid,$rowdate->id);
                    $accda= $gsModel->getDateAcceptCount($gsid,$rowdate->id);

                    if($accda->actmem>0) { 
                    ?>
                    	<small style="height:15px; font-weight:bold"><?php echo $gsData->teetime; ?> - <a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&gsid='.$gsid.'&did='.$rowdate->id); ?>"><?php echo $gsData->CourseName; ?></a></small>
                        <br />
              	<?php } ?>
           <?php } ?>
            
    <?php } ?>
    </div>
</ul>
   <small><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=groupschedule&Itemid=131'); ?>"><?php echo 'Show All'; ?></a></small>
<?php } //else { ?>
    <!-- <small>You have nothing upcoming</small>
    <br /><br /> -->
<?php //} ?>


    
<?php if ($mightbeschedule) {  ?>  
    <div class="joms-blankslate"><?php echo 'You Might Be Interested' ?> <img src="/images/info_3-512.png" width="20" height="20" title="These are people looking for people to golf with"></div>

    <ul class="joms-list--event">
            <div class="joms-media__body">
    <?php foreach ($mightbeschedule as $row) { 
            $gotahit = true;
            $gsid=$row->id;
            //group schedule
            $gsModel = CFactory::getModel('findgolfers');
            $gsData = $gsModel->getScheduleDetails($gsid);
            ?>
                <small style="height:15px; font-weight:bold"><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=findgolfers&task=recresponse&gsid='.$gsid); ?>"><?php echo $gsData->CourseName; ?></a></small>
                <input type="button" onclick="window.location='<?php echo CRoute::_('index.php?option=com_community&view=findgolfers&task=recresponse&stepset=cancel&reqid='.$gsid); ?>';" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "x";?>">
                <br />
<?php } ?>
        </div>
    </ul>
<small><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=findgolfers&task=recresponse&Itemid=101'); ?>"><?php echo 'Show All'; ?></a></small>
    <?php } //else { ?>
        <!-- <small>Your List Is Currently Empty</small>
        <br /><br /> -->
    <?php //} ?>
    <?php /* ?><small><a class="joms-button--link" href="<?php echo CRoute::_('index.php?option=com_community&view=findgolfers&task=closerequest'); ?>"><?php echo 'Show All'; ?></a></small><?php */ ?>

  
 <?php if ($pending || $pendingfg) {  
     $cnt = 0; 
     $headershown=false; ?>   
     
    
    <?php foreach ($pending as $row) { 
            
            $gsid=$row->gsid;
            //print_r($row);
            //echo "gsid: " . $row->gsid;
            //group schedule
            //$gsModel = CFactory::getModel('groupschedule');
            //$gsData = $gsModel->getScheduleDetails($gsid);
            //echo $gsdata;
            if (strtotime($row->sdate) >= time()) {
                ++$cnt;
                if ($headershown == false) {
                    $headershown = true;
                    $gotahit = true; ?>
                    <div class="joms-blankslate"><?php echo 'Pending Tee Times' ?> <img src="/images/info_3-512.png" width="20" height="20" title="These are events where you said you were available to golf but are not in your schedule because they have not yet been finalized by the organizer."></div>
                    <ul class="joms-list--event">
                    <div class="joms-media__body">
              <?php  }
            ?>
            <small style="font-weight:bold"><?php echo $row->sdate . "-" . $row->Name; ?></small>
            <!--// <a class="joms-button--link" href="<?php //echo CRoute::_('index.php?option=com_community&view=groupschedule&gsid='.$gsid); ?>"> -->
            <br />
    <?php   } //else { echo "removed because date is old<br>"; }
        
        
            }
        //if ($cnt == 0) { ?>
            <!-- <small>No Pending Events</small> -->
        <?php //}?>
            
    <?php foreach ($pendingfg as $row) { 
            
            $gsid=$row->gsid;
            //print_r($row);
            //echo "gsid: " . $row->gsid;
            //group schedule
            //$gsModel = CFactory::getModel('groupschedule');
            //$gsData = $gsModel->getScheduleDetails($gsid);
            //echo $gsdata;
            if (strtotime($row->sdate) >= time()) {
                ++$cnt;
                if ($headershown == false) {
                    $headershown = true;
                    $gotahit = true; ?>
                    <div class="joms-blankslate"><?php echo 'Pending Tee Times' ?> <img src="/images/info_3-512.png" width="20" height="20" title="These are events where you said you were available to golf but are not in your schedule because they have not yet been finalized by the organizer."></div>
                    <ul class="joms-list--event">
                    <div class="joms-media__body">
              <?php  }
            ?>
            <small style="font-weight:bold"><?php echo $row->sdate . "-" . $row->Name; ?></small>
            <!--// <a class="joms-button--link" href="<?php //echo CRoute::_('index.php?option=com_community&view=groupschedule&gsid='.$gsid); ?>"> -->
            <br />
    <?php   } //else { echo "removed because date is old<br>"; }
        
        
            }
        //if ($cnt == 0) { ?>
            <!-- <small>No Pending Events</small> -->
        <?php //}?>
    </div>
</ul>

<?php } //else { ?>
    <!-- <small>No Pending Events</small> -->
<?php //} ?>
   
                   
<?php if ($gotahit == false) {  ?>  

    <ul class="joms-list--event">
        <div class="joms-media__body">
            <small style="height:18px; font-weight:bold">Keep an eye out here for New Requests, Your Schedule and more.</small>
            <br />
        </div>
    </ul>
                    
    <div class="joms-blankslate"><?php echo 'Learn Golf With Me' ?> </div>

    <ul class="joms-list--event">
        <div  align="center">  
            <center><a href="index.php?option=com_community&amp;view=videos&amp;task=display&amp;catid=2&amp;Itemid=101"><img src="http://dev.golfwithme.biz/images/button-watch-the-videos.png"></a></center>
        </div>
    </ul>

    <?php } ?>