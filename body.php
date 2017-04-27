<?php
include "includes/simple_html_dom.php";

if(isset($_POST['songname']) && isset($_POST['fbuserid']) )
{
	$search =$_POST['songname'];
	$fbuserid=$_POST['fbuserid'];
	 $fix_file_name_fisrt = str_replace('%20', '', $search);
	
	$pattern = "/[^\w.-]/";
	 $fix_all_invalied_chars = preg_replace($pattern,'_',$fix_file_name_fisrt); 
    
	 $fix_all_words_to_lower_case= strtolower($fix_all_invalied_chars);
	
    $fix_file_name = str_replace('_', ' ', $fix_all_words_to_lower_case);
	
     $fix_file_name1 = str_replace('-', ' ', $fix_file_name);
	
	 
	 $fix_all_words_frist_letter_to_cap = ucwords($fix_file_name1);
    $trim = trim($fix_all_words_frist_letter_to_cap);
	 $fix_file_name2 = str_replace(' ', '', $trim);
	 preg_match_all('/[A-Z][^A-Z]*/', $fix_file_name2, $matches, PREG_SET_ORDER);
$parts = 0;

$word1 = "0";
$word2 = "0";
$word3 = "0";
$word4 = "0";
$word5 = "0";
$word6 = "0";
$word7 = "0";
$word8 = "0";
$word9 = "0";
$word10 = "0";
$word11 = "0";
$word12 = "0";
foreach ($matches as $val) {
    
   $parts++;
   if($parts == 1)
   {
	 $word1 = $val[0];
   }
   if($parts == 2)
   {
	 $word2 = $val[0];
	   
   }
   if($parts == 3)
   {
	 $word3 = $val[0];
   }
   if($parts == 4)
   {
	   $word4 = $val[0];
   }
   if($parts == 5)
   {
	  $word5 = $val[0];
   }
   if($parts == 6)
   {
	$word6 = $val[0];
   }
   if($parts == 7)
   {
	   $word7 = $val[0];
   }
   if($parts == 8)
   {
	   $word8 = $val[0];
   }
   if($parts == 9)
   {
	  $word9 = $val[0];;
   }
   if($parts == 10)
   {
	  $word10 = $val[0];
   }
   if($parts == 11)
   {
	 $word11 = $val[0];
   }
   if($parts == 12)
   {
	  $word12 = $val[0];
   }
}

if($word1 != "0")
{
	$search_youtube_queue = $word1;
	
}
if($word2 != "0")
{
	$search_youtube_queue = $word1."%20".$word2;
	
}
if($word3 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3;
	
}
if($word4 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4;
	
}
if($word5 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5;
	
}
if($word6 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6;
	
}
if($word7 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6."%20".$word7;
	
}
if($word8 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6."%20".$word7."%20".$word8;
	
}
if($word9 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6."%20".$word7."%20".$word8."%20".$word9;
	
}
if($word10 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6."%20".$word7."%20".$word8."%20".$word9."%20".$word10;
	
}
if($word11 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6."%20".$word7."%20".$word8."%20".$word9."%20".$word10."%20".$word11;
	
}
if($word12 != "0")
{
	$search_youtube_queue = $word1."%20".$word2."%20".$word3."%20".$word4."%20".$word5."%20".$word6."%20".$word7."%20".$word8."%20".$word9."%20".$word10."%20".$word11."%20".$word12;
	
}

$bing_url_search = "https://www.youtube.com/results?search_query=$search_youtube_queue";
	$html = file_get_html( $bing_url_search );
   
    sleep(3);
	$tagids = $html->find('<a');
	
	
	
	
	?>
    
    
  
    
  
    
    <?php
	
	
//$j=0;
foreach ($tagids as $tagid) 
{
	
	$getat = $tagid->getAttribute('aria-describedby');
	if($getat)
	{
		//echo "FIND THIS PLEASE";
	
		
	$title = $tagid->getAttribute('title');
	$pattern = "/[^\w.-]/";
	$fix_all_invalied_chars = preg_replace($pattern,'_',$title); 
    
	$fix_all_words_to_lower_case= strtolower($fix_all_invalied_chars);
	
   $fix_file_name = str_replace('_', ' ', $fix_all_words_to_lower_case);
    $fix_file_name1 = str_replace('-', ' ', $fix_file_name);
	$fix_file_name3 = str_replace('official', ' ', $fix_file_name1);
	$fix_file_name4 = str_replace('lyrics', ' ', $fix_file_name3);
	$fix_file_name5 = str_replace('video', ' ', $fix_file_name4);
	 $fix_file_name6 = str_replace('music', ' ', $fix_file_name5); 
	 $fix_file_name7 = str_replace('cover', ' ', $fix_file_name6); 
	 $fix_file_name8 = str_replace('lyric', ' ', $fix_file_name7);
	 
	 $fix_file_name9 = str_replace('quot', ' ', $fix_file_name8);
	 $fix_file_name10 = str_replace('.', ' ', $fix_file_name9);
	 $fix_file_name11 = str_replace('amp', ' ', $fix_file_name10);
	 
	$fix_all_words_frist_letter_to_cap = ucwords($fix_file_name11);
    $trim = trim($fix_all_words_frist_letter_to_cap);
	$fix_file_name2 = str_replace(' ', '', $trim);
	
	$tagit = $tagid->getAttribute('href');
	$fix_tagit = str_replace('/watch?v=', '', $tagit);
	

    
   if (strpos($fix_tagit,'/user/') !== false)
   {
	   
     }
	 else
	 {
	if (strpos($fix_tagit,'list=') !== false)
        {
         
        }
		else
		{
			if (strpos($fix_tagit,'/channel/') !== false)
        {
         
        }
		else
		{
	$myimg = "<img src='//i.ytimg.com/vi/".$fix_tagit."/mqdefault.jpg' width=\"250px\" height=\"140px\" />";
	$newmyimg = "//i.ytimg.com/vi/".$fix_tagit."/mqdefault.jpg";
	      if(!file_exists($myimg))
          {
			  
		  if(!$fix_tagit == '')
		  {
			 //echo $j++;
			  ?>
              
              
              
              
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2"> 
                                     
                                     <div class="item"> 
                                     
                                     <div class="pos-rlt"> 
                                     
                                  
                                     
                                     <div class="item-overlay opacity r r-2x bg-black" > 
                                    
                                    
                                     
                                     <div  class="center text-center m-t-n"> 
                                     <a href="#"  data-toggle="class" onclick="play_audio_file('<?php echo $fix_tagit ?>','<?php echo $trim ?>' ,'<?php echo $fix_file_name2 ?>' ,'<?php echo $newmyimg ?>')" class="active">
                                     <i class="icon-control-play i-2x text-active"></i> 
                                    <i class="icon-control-pause i-2x text"></i> 
                                     </a>
                                      </div> 
                                      
                                      <div id="<?php echo $fix_tagit ?>" class="bottom padder m-b-sm" style="display:none; cursor:pointer; z-index:1; width:20px;" > 
                                      <a href="#" class="pull-left active" onclick="Add_To_Playlist('<?php echo $fix_tagit ?>')" data-toggle="class"> 
                                      <i class="fa fa-plus-circle text-active"></i> 
                                      <i class="fa fa-check-circle text text-info"></i> 
                                      </a>
                                      
                                        
                                      </div> 
                                      
                                       <div class="bottom padder m-b-sm"> 
                                      
                                      
                                      <a href="#" class="pull-right active" onclick="playvideo('<?php echo $fix_tagit ?>','<?php echo $fix_file_name2 ?>')" data-toggle="class" style="cursor:pointer; z-index:2; width:20px;"> 
                                      <i class="fa fa-video-camera text"></i> 
                                      <i class="fa fa-video-camera text-active text-danger"></i> 
                                      </a>  
                                      </div>
                                      
                                      
                                     
                                      
                                      </div> 
                                      
                                      <a href="#">
                                      <img src="<?php echo $newmyimg; ?>" alt="" class="r r-2x img-full">
                                      </a> 
                                      
                                      </div> 
                                      
                                      
                                      <div class="padder-v"> 
                                      <a href="#" class="text-ellipsis"><?php echo $trim; ?></a> 
                                      <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $fix_tagit; ?></a> 
                                      </div> 
                                      
                                      </div> 
                                      
                                      </div> 
              
              
              
              
			
    
   
    
	
	
			 <?php
		  }
		  }
		  }
		  }
		  } 
	
	
    }
	   
}
?>

<script>
var is_loaded = false;
var beenplayed = false;
function play_file()
{
	//console.log("IS THIS PLAYING? "+is_playing);
	
	myMedia.play();
	
	$("#videoplayercontaner").fadeOut("fast");
	$("#videoplayeriframe").attr("src","");
		
			//console.log("IS THIS PLAYING PAUSE FUCKER? "+is_playing);
			//myMedia.pause();
			//if(beenplayed == false && is_playing==false)
			//{
			//  beenplayed = true;
			//  console.log("HAS IT PLAYED? "+beenplayed );
			//}
		
		
}

function pause_file()
{
	//console.log("IS THIS PLAYING? "+is_playing);
	
	
		
			//console.log("IS THIS PLAYING PAUSE FUCKER? "+is_playing);
			myMedia.pause();
			//if(beenplayed == false && is_playing==false)
			//{
			//  beenplayed = true;
			//  console.log("HAS IT PLAYED? "+beenplayed );
			//}
		
		$('.musicbar').removeClass('animate');
    $('.jp-play-me').removeClass('active');
    $('.jp-play-me').parent('li').removeClass('active');
	myPlaylist.pause();
}


function playvideo(id,cleanname)
{
	
	if(is_playing == true)
	{
		pause_file();
	}
	
	var url = 'includes/watch.php?ytid='+id;
	$("#videoplayercontaner").fadeIn("fast");
	$("#videoplayeriframe").attr("src",url);
	video_time = 0;
	isplayingvideo = true;
	
	$(".loader").fadeIn("fast");
		 $(".message").html('Searching For '+cleanname+' One Moment Please.');
}
var beenpaused = false;
function play_audio_file(ytid,ytname,cleanname,img)
	{
		if(is_loaded == true && is_playing == true && beenplayed == true && ytid == getYtId )
		{
		 console.log("IS LOADED SECOND CLICK == "+is_loaded+" AND IS PLAYING "+is_playing+ "AND BEEN PLAYED =" +beenplayed +" AND YTID == "+getYtId);
		 if(beenpaused == false)
		 {
		 pause_file();
		 beenpaused = true;
		 }
		 else
		 {
			 play_file(); 
			 beenpaused = false;
		 }
		 return;
		}
		is_playing = false;
		myMedia.pause();
		myMedia.src = "";
		header_loader = 0;
		 getYtId = ytid;
		 getcleanytname =cleanname;
		 getMcFileUrl = 'http://serve-skull.su/direct/?yt=https://www.youtube.com/watch?v='+ytid;//result.link;
		 userid = '<?php echo $fbuserid; ?>';
		 Copy_File_To_DB(getYtId);
		 $(".loader").fadeIn("fast");
		 $(".message").html('Searching For '+cleanname+' One Moment Please.');
		 is_loaded = true;
		 console.log("IS LOADED == "+is_loaded);
	}

function Add_To_Playlist(id)
{
	
	$.post('includes/myplaylist.php',{
		    filename:getcleanytname,
			filelocation:getMcFileUrl,
			fbuserid:userid, 
			ytid:getYtId
		},function(data){
			
			
			console.log(data);
			
			$('#'+id).fadeOut("fast");
			
		
			
			
		
		
		
		
		});
	
}

function Copy_File_To_DB(id)
{
	
	
	
	$.post('includes/copy_file.php',{
		    filename:getcleanytname,
			filelocation:getMcFileUrl,
			fbuserid:userid, 
			ytid:getYtId
		},function(data){
			
			
			console.log(data);
			
		var str = data;
var n = str.includes("<br />");

          if(n)
          {
	          $(".message").html('Stream Error For '+getcleanytname+' Sorry Please Try Again.');
				 is_playing = false;
				has_error = true;
	           
           }
		   else if(data == 0)
			{
				 $(".message").html('Stream Error For '+getcleanytname+' Sorry Please Try Again.');
				 is_playing = false;
				has_error = true;
			}
			else
			{
			$('#'+id).fadeIn("fast");
			 $(".loader").fadeOut("fast");
		myMedia.src = data;
		getMcFileUrl = data;
		  is_playing = true;
		  beenplayed = true;
		  has_error = false;
		  myMedia.play();
		  
		  $('.musicbar').removeClass('animate');
    $('.jp-play-me').removeClass('active');
    $('.jp-play-me').parent('li').removeClass('active');
	myPlaylist.pause();
	
			}
			
			 //window.location.href = 'index.php';
		
			
			
		
		
		
		
		});
}

</script>
    

<?php





//END
return;
}
?>