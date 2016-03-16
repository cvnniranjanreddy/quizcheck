<?php
require_once('../../config.php');
global $CFG,$DB,$USER;

require_once $CFG->dirroot.'/local/lib.php';
require_once($CFG->dirroot.'/lib/enrollib.php');
$PAGE->requires->jquery();
$PAGE->requires->js('/mod/facetoface/js/custom.js');
$page = required_param('page',PARAM_INT);
$id = required_param('id',PARAM_INT);
$userid = optional_param('userid',$USER->id,PARAM_INT);
$userid10 = optional_param('userid10',0,PARAM_INT);
$sessiontype=optional_param('sessiontype','all',PARAM_RAW);
$PAGE->set_context(context_system::instance());
$output = $PAGE->get_renderer('quiz');

switch($page){
      case 4:
/*==========================Started by rajut for dispaly assigned users and assigne users (date:16-11-2015)==========*/     
	  
	  $user_toggle='<span class="create_feedback" style=Width:100%;text-align:center;border:none !important;>
	  <ul style="display: inline-table;list-style-type: none;float: right;">
	  <li class="add_users">
	  <a href="'.$CFG->wwwroot.'/mod/quiz/users_assign.php?id='.$id.'&sessiontype='.$sessiontype.'" class="show">Add Users</a>
	  </li>
	  </ul>
	  </span>';
	  
	  $user_toggle.= "<div id='dialoguser$id'>";
	  if(is_supervisor_dashboard()) {
	  if($userid10!=0)
	  $user_toggle .= $output->assign_quizusers($id,0,$USER->id);
	  }else{
	   $user_toggle .= $output->assign_quizusers($id,$userid10,0);
	  }
	  $user_toggle .="</div>";
	  echo $user_toggle;

     /*==========================Started by rajut for dispaly assigned users and assigne users (date:16-11-2015)==========*/       
      
    break;
	 

   
}
