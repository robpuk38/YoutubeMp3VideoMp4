

<header class="bg-white-only header header-md navbar navbar-fixed-top-xs"> 

<div class="navbar-header aside bg-info nav-xs">

  

   <a href="index.php" class="navbar-brand text-lt">

    

    <img src="<?php echo $mywwwsite_logo;?>"> 

    

    </a> 

   

   

</div> 



<ul class="nav navbar-nav"> 

<li> 

<a class="active text-muted" data-toggle="class" onclick="load_searchsystem()" style="margin-left:15px;"> 

<i class="fa fa-search-plus text"> Search</i> <i class="fa fa-search-minus text-active"> Search</i> 

</a>

</li> 

</ul> 



<div class="navbar-form navbar-left input-s-lg m-t m-l-n-xs" id="showshearch" role="search" style="display:none;"> 

<div class="form-group">

 <div class="input-group"  style="width:350px;"> 

 <span class="input-group-btn"> 

 <button type="submit" onclick="Search_For_The_File()" id="submitit" class="btn btn-sm bg-white btn-icon rounded">

 <i class="fa fa-search"></i>

 </button> 

 </span> 

 <input  type="text" id="infield" class="form-control input-sm no-border rounded" style="border:dashed; border-color:#09C;" onKeyUp="Get_Text_Field_Value(this.value)" placeholder="Search songs, albums..."> 

 </div> 

 </div> 

 </div> 

 

 <?php

 $sql = "SELECT * FROM  mp3_tmp WHERE fbuserid = $myfbuserid  ORDER BY id DESC LIMIT 1"; 

  $query = mysqli_query($conn,$sql) or trigger_error("Query Failed: " . mysqli_error()); 

 

  

  if (mysqli_num_rows($query) == 1) 

  { 

  $row = mysqli_fetch_assoc($query);

  $lastsearch =$row['songname'];

  

  }

  else

  {

	  $lastsearch = "2016 music";

  }



 ?>

 

 <script>

 var searching_time = 0;

 var searching = false;

 var video_time = 0;

 var isplayingvideo = false;

 var serchval = '<?php echo $lastsearch;  ?>';

 myMedia = new Audio();

 myMedia.id = "myMedia";

 var is_playing =false;

 var userid = '<?php echo $myfbuserid;  ?>';

 var header_loader =0;

var getYtId ="null";

var getcleanytname = "null";

var getMcFileUrl = "null";

var has_error = false;

var fadein = false;



function update_page_header()

{

	//console.log("fadin: "+ fadein)

	video_time++;

	searching_time++;

	

	if(searching_time > 10 && searching == true)

	{

		$(".loader").fadeOut("fast");

		searching = false;

	}

	if(video_time > 2 && isplayingvideo == true)

	{

		$(".loader").fadeOut("fast");

		isplayingvideo = false;

	}

	header_loader++;

	if(header_loader > 5 && is_playing == true )

	{

		console.log("TIMER "+header_loader);

		$(".loader").fadeOut("fast");

	

		header_loader = 0;

		

	}

	if(has_error == true && is_playing == false && header_loader > 5)

	{

		$(".loader").fadeOut("fast");

		header_loader = 0;

	}



	



	



	

	

}

setInterval(function(){ update_page_header() }, 1000);



 

 

 function Get_Text_Field_Value(value)

{

	if(value!='')

	{

		console.log(value);

		serchval=value;

		$("#infield").css("border-color","#09C");

		return;

	}

	else

	{

		serchval= null;

		$("#infield").css("border-color","#F00");

	}

}





function Search_For_The_File()

{

	if(serchval == null)

	{

		$("#infield").css("border-color","#F00");

	console.log("Search is null");

		return;

	}

	

	if(is_playing == true)

	{

		console.log("IS PLAYING TURN IT OFF");

		myMedia.pause();

		myMedia.src = "";

		

		

		is_playing = false;

		

		$('.musicbar').removeClass('animate');

    $('.jp-play-me').removeClass('active');

    $('.jp-play-me').parent('li').removeClass('active');

	myPlaylist.pause();

		

	}

	fadein = false;

	$(".message").html('Searching For '+serchval+' One Moment Please.');

		$(".loader").fadeIn("fast");

		$("#videoplayercontaner").fadeOut("fast");

	$("#videoplayeriframe").attr("src","");

	  searching_time = 0;

searching = true;

	$.post("body.php",{

			songname:serchval,

			fbuserid:userid

			

		},function(data){

			console.log(data);

				

			$("#search_results").fadeIn("fast");

			$("#search_results").html(''+data+'');

			$(".loader").fadeOut("fast");

			$("#infield").css("border-color","#09C");

			$("#showshearch").fadeOut("fast");

		

		

		

		});

	

	

}



function load_searchsystem()

{

	console.log("Loading Serach System");

	

	if(fadein == true)

	{

		$("#showshearch").fadeOut("fast");

		fadein = false;

	}

	else

	{

	

	if(fadein == false)

	{

	    $("#showshearch").fadeIn("fast");

		fadein = true;

	}

	else

	{

		$("#showshearch").fadeOut("fast");

		fadein = false;

	}

	}

		

		

		

		

	

	

}







 </script>



 </header> 