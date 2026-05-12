<?php
session_start();
if(isset($_POST['check'])){
    include "./conxn.php";
    $myId = $_SESSION['id'];
    $sel_chatnotify = mysqli_query($link,"SELECT id,tags FROM  tag_interest WHERE user_id = '$myId' ");
    

				  
    if(mysqli_num_rows($sel_chatnotify)>0)
    {	
	echo '';
	}
    else
	{
	echo "tags_needed";
	}
}

else if(isset($_POST['user_tags'])){
    include "./conxn.php";
    $myId = $_SESSION['id'];
    $sel_chatnotify = mysqli_query($link,"SELECT id,tags FROM  tag_interest WHERE user_id = '$myId' ");
    

				  
    if(mysqli_num_rows($sel_chatnotify)>0)
    {	
//	echo '	<div id="tags_holder" class="row padding-10"></div>
				//  <ul class="list-inline">';
        while($while_notify = mysqli_fetch_assoc($sel_chatnotify))
		{
         $current_id = $while_notify['id'];
         $tags = $while_notify['tags'];
         $array_tag_array = 'News,Sports,Music,Health,Entertainment,Food,Movies,Events,Books,History,Internet,Business,Animals,Education,Photography,Travel,Buildings,Electrical,Celebrities,Cars,Technology,Automobile,Gadgets,Fashion,Art,Games,Science,Politics,Lifestyle';
		 $new_tags = explode(',', $tags);
		 $array_new_tags = explode(',', $array_tag_array);
        // $tag_one = $new_tags[6];
      if($tags != NULL)
	  {
		for( $i = 0; $i < count($array_new_tags); $i++) {
		  
		 switch($array_new_tags[$i])
		   {
			case "News":
                      if( in_array( "News", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden " id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"           style="color:red;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Sports":
                      if( in_array( "Sports", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  id="tag_interest("'.$array_new_tags[$i].'");"   type="submit" value="'.$array_new_tags[$i].'"    style="color:#63ba00;;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Music":
                      if( in_array( "Music", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:purple;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Health":
                      if( in_array( "Health", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#ffbd55;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Entertainment":
                      if( in_array( "Entertainment", $new_tags))
					  {
						echo '
						<li class="padding-5 " id="'.$array_new_tags[$i].'">
						  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
						</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 Hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:blue;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Food":
                      if( in_array( "Food", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"     style="color:#f615af;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Movies":
                      if( in_array( "Movies", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#f615af;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Events":
                      if( in_array( "Events", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:red;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Books":
                      if( in_array( "Books", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#0aa1ff;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "History":
                      if( in_array( "History", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#63ba00;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Beauty":
                      if( in_array( "Automobile", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"  style="color:#ff6666;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Home":
                      if( in_array( "Electrical", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"     style="color:#00aa1ff;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Internet":
                      if( in_array( "Internet", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#ff3300;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Business":
                      if( in_array( "Business", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden " id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"     style="color:black;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Animals":
                      if( in_array( "Animals", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"    style="color:#288a23;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Education":
                      if( in_array( "Education", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"    style="color:#f615af;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Photography":
                      if( in_array( "Photography", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"      style="color:red;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Buildings":
                      if( in_array( "Buildings", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"    style="color:#ffbd55;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Celebrities":
                      if( in_array( "Celebrities", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:indigo;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Cars":
                      if( in_array( "Cars", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#5bc0de;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Technology":
                      if( in_array( "Technology", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:blue;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Fashion":
                      if( in_array( "Fashion", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden " id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"    style="color:#007d88;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Art":
                      if( in_array( "Art", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:#0aa1ff;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Games":
                      if( in_array( "Games", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:indigo;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Gadgets":
                      if( in_array( "Gadgets", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:indigo;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Science":
                      if( in_array( "Science", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"   style="color:green;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			case "Politics":
                      if( in_array( "Politics", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"     style="color:#ff6666;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
						
						case "Lifestyle":
                      if( in_array( "Lifestyle", $new_tags))
					  {
						echo '
							<li class="padding-5 " id="'.$array_new_tags[$i].'">
							  <button class="btn btn-success" type="submit" value="'.$array_new_tags[$i].'"  style="color:white;">'.$array_new_tags[$i].' </button>
							</li>
						 ';
						 }
						 else{
						     echo '<li class="padding-5 hidden" id="'.$array_new_tags[$i].'"><button class="btn btn-default"  onclick="tag_interest('.$array_new_tags[$i].');"   type="submit" value="'.$array_new_tags[$i].'"     style="color:#ff6666;">'.$array_new_tags[$i].'</button></li>';
						 }
						break;
			}
		 }
		 	echo '<br><em class="text-muted font-xs">Retag button is used to empty your Interesting Tags list so you can choose a new set.</em>';
		 }
		else
	{
	echo "tags_needed";
	}
       }
	 //  echo ' </ul></div>';
	}
    else
	{
	echo "tags_needed";
	}
}
else if(isset($_POST['user_tags_continue'])){
    include "./conxn.php";
  //  include "./funcxn.php";
    $myId = $_SESSION['id']; 

    $sel_chatnotify = mysqli_query($link,"SELECT id,tags FROM  tag_interest WHERE user_id = '$myId' ");
  if(mysqli_num_rows($sel_chatnotify)>0)
    {	
	echo '	<div id="tags_holder" class="row padding-10"></div>
				  <ul class="list-inline">';
        while($while_notify = mysqli_fetch_assoc($sel_chatnotify))
		{
		$all_friends = connection_ids();
         //echo $all_friends_new = implode(',',$all_friends);
         $range =  implode(' ',$all_friends) ;
         $current_id = $while_notify['id'];
         $tags = $while_notify['tags'];
         $array_tag_array = 'News,Sports,Music,Health,Entertainment,Food,Movies,Events,Books,History,Internet,Business,Animals,Education,Photography,Buildings,Celebrities,Cars,Automobile,Technology,Gadgets,Fashion,Electrical,Art,Games,Science,Politics,Travel';
		 $new_tags = explode(',', $tags);
		 $array_new_tags = explode(',', $array_tag_array);
        // $tag_one = $new_tags[6];
         $new_tags2 = count($new_tags);
		for( $i = 0; $i < $new_tags2; $i++)
		{
		  echo '<h4 class="">'.$new_tags[$i].'</h4>';
				//AND user_id  LIKE '%".$range."%' 	  
			$sel_chatnotify = mysqli_query($link,"SELECT DISTINCT user_id FROM tag_interest WHERE  user_id != '$myId'   AND tags LIKE '%".$new_tags[$i]."%'   ORDER BY RAND() LIMIT 4 ");
			   if(mysqli_num_rows($sel_chatnotify)>0)
				{	
				 while($while_notify = mysqli_fetch_assoc($sel_chatnotify))
					{
					  $current_id = $while_notify['user_id'];
					   $querystmt2 = $link->prepare("SELECT con_req FROM user_pref WHERE user_id = ? ");
                       $querystmt2->bind_param('i',$current_id);
                       $querystmt2->execute() ;
                       $querystmt2->store_result();
                       $querystmt2->bind_result( $con_req);
                        if($querystmt2->fetch())
                          {
                      	  $row = array('con_req'=> $con_req);
                           $con_req = $row['con_req'];  
                           if( $con_req >= 1) 
						   {
						   conn_suggest_from_tags($current_id);
						   } 
						   else 
						   {
						   return;
						   }
					      } else  conn_suggest_from_tags($current_id);
				     
					 
					}
					
				}  
	    	}
				
			
       }
	   echo ' </ul></div>';
	}
    else
	{
	echo "tags needed";
	}
}
else if(isset($_POST['retag'])){
 include "./conxn.php";	
  $myId = $_SESSION['id']; 
$update = mysqli_query($link,"UPDATE tag_interest SET tags = NULL WHERE user_id = '$myId'");
Echo " Tags Removed";
 }
else
if(isset($_POST['tag'])){
    include "./conxn.php";
    $myId = $_SESSION['id'];
	 $old_tags =$_POST['tag'];
	
    $sel_chatnotify = mysqli_query($link,"SELECT id,tags FROM  tag_interest WHERE user_id = '$myId'  ");
	
     if(mysqli_num_rows($sel_chatnotify)>0)
    {
        while($while_notify = mysqli_fetch_assoc($sel_chatnotify))
		{
         $current_id = $while_notify['id'];
         $tags = $while_notify['tags'];
         $new_tags =$tags.','.$old_tags;
         $update = mysqli_query($link,"UPDATE tag_interest SET tags = '$new_tags' WHERE user_id = '$myId'");
         echo $old_tags;

	   }
	   //echo $friend_name.'+-'.$friend_id.'+-'.$text.'+-'.$chat_file;
	}
    else
	{
	   $chatinsert = "INSERT INTO tag_interest(user_id,tags) VALUES('$myId', '$old_tags') ";
        $query_chatinsert = mysqli_query($link, $chatinsert);
	 echo $old_tags;
	}
}
else{echo ' tag button Not set';}


function conn_suggest_from_tags($ids)
{
//collecting suggested friends by mykanta for first login 
 include "./conxn.php";	 
 //include "./funcxn.php";

$user_id  = $_SESSION['id'];
$main_user_id  = $_SESSION['id'];
 $all_friends = connection_ids();
 //echo $all_friends_new = implode(',',$all_friends);
 $range =  implode(',',$all_friends) ;
 //$range1 = explode(',',$all_friends);
$query1 = "SELECT * FROM registration WHERE id = '$ids' AND id LIMIT 1";
 
if ($query4user1 = mysqli_query($link,$query1))
{ 
 while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
	 {
	     $firstName  = $mysfrn['firstName'];
		 $username1  = $mysfrn['username'];
		 $friends_able_id  = $mysfrn['id'];
		 $username = substr($username1, 0, 8). '..';
		 if (get_friend_no_of_reev_proc($ids) >= 0 && !in_array( $ids, $all_friends) )
		 {
		  echo   '
				   <li class="padding-10" style="width:250px;">
					<ul class="list-inline " style="">
					  <li class="no-padding" style="">
						<ul class="list-inline">
						   <li> ',get_profile_pic_friend($friends_able_id),'</li>
						   <li><a class="" href="/connection_auth/'.$username1.'" title="'.$username1.'"> '.ucwords($username1).'</a></li>
						  <li id ="accept_friend_box'.$friends_able_id.'" class="padding-5">
						 <button type="" class="btn-default btn-disabled">
						 <div class=" no-padding" style="">
							   <span class="  text-default"title="Connections"> <i class="fa fa-group " ></i> ',get_friendnames_no_badge($friends_able_id),'</span>
							   <span class="padding-5  text-default"title="Connected">  <span style="font-style:bold;"> REEVS </span>',get_friend_no_of_reev($friends_able_id) ,'</span>
						 </div>
						  </button>
						 <input type="submit"  onClick="add_friend_sug('.$friends_able_id .');" value="Connect "class="btn-primary-lg-o">
						</input>
					  </li></ul>
					  </li>
					
					 </ul>
				</li>
			';
			 
		   }	
          
		   }		  
	  }
	}
function  get_friend_no_of_reev_proc($user_id)
{ 
include "./conxn.php";
//include "../funcxn.php";
$main_user_id  = $_SESSION['id'];

$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc != 'NULL' ";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

return $friend_count;
} 

function get_profile_pic_friend($friend_id)
{include "./conxn.php";
	$query = " SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

	$query4profilepic = mysqli_query($link,$query);	
	if(mysqli_num_rows($query4profilepic)==1)
	{
	  while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
		{   
		$profile_image = $profile_pic['image_loc'];
		echo'<img src="/img/avatars/'. $profile_image.'" class=" img-thumbnail img-circle" width="50px;" height="auto;"/>';			 
		}
	}
	else
	{
	   $profile_image = "/img/avatars/image1.jpg";
    	echo'<img src="/'. $profile_image.'" class="img-thumbnail  img-circle" width="50px;" height="auto;"/>';
	}
}
function  get_friendnames_no_badge($user_id)
{ include "./conxn.php";
$main_user_id  = $_SESSION['id'];

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
} 

function  get_friend_no_of_reev($user_id)
{ include "./conxn.php";
$main_user_id  = $_SESSION['id'];

$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc !='NULL' ";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
}

function connection_ids()
{include "./conxn.php";  	
$userThis_id = $_SESSION['id'];
$all_friends = array();

$sql = "SELECT DISTINCT account_id FROM friends WHERE friend_id ='$userThis_id'  AND value >= '0' ";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
array_push($all_friends, $row["account_id"]);
}
$sql2 = "SELECT DISTINCT friend_id FROM friends WHERE account_id ='$userThis_id' AND value >= '0'";
$queryq2 = mysqli_query($link,$sql2);
while ($row = mysqli_fetch_array($queryq2, MYSQLI_ASSOC))
{
 array_push($all_friends, $row["friend_id"]);
 
}
 return $all_friends;
 }