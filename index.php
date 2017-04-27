<?php
include "dbconfig.php";
//Set your own personal vars. these are set for defualt
$myfbprofilepic = "";
$myfbname = "Guest";
$myfbuserid  = 1;
$mywwwsite_logo = "";

?>
<!DOCTYPE html>

<html lang="en" class="app">

<head> 

<meta charset="utf-8" /> 

<title>Youtube Mp3 Application</title> 

<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" /> 

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

<link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" /> 

<link rel="stylesheet" href="css/app.v1.css" type="text/css" /> 

<link rel="stylesheet" type="text/css" href="css/loader.css">

<link rel="stylesheet" href="css/app_a1.css" type="text/css" /> 



<!--[if lt IE 9]> 

<script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> 

<script src="js/ie/excanvas.js"></script> 

<![endif]-->

</head>

<body class="" onLoad="Search_For_The_File();"> 



<div class="loader">

 <div id="fixit" align="center">

    <div class="mybox" align="center">

	<img src="<?php echo $myfbprofilepic;  ?>" width="60" height="45"/>

</div>

 <div class="myboxnametitle" align="center">

	<strong>Sponsor</strong>

</div>

<div class="myboxname" align="center">

	<?php echo $myfbname; ?>

</div>



</div>

<div class="spinner">





  <div class="dot1"></div>

  <div class="dot2"></div>



</div>

<div class="message" align="center">Hello <?php echo $myfbname; ?> </div>

</div>



<section class="vbox"> 

<?php 

include "header.php";

?>

 

 

 

 

 <section> 

 

 <section class="hbox stretch">

 

                                    

                                     

                                     

                                     <section id="content">

                                      

                                     <section class="hbox stretch"> 

                                     <section> <section class="vbox"> 

                                     

                                     <section class="scrollable padder-lg w-f-md" id="bjax-target"> 

                                     <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" >

                                     <i class="icon-refresh i-lg inline" id="refresh"></i>

                                     </a> 

                                     <h2 class="font-thin m-b">Discover 

                                     <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px"> 

                                     <span class="bar1 a1 bg-primary lter"></span> 

                                     <span class="bar2 a2 bg-info lt"></span> 

                                     <span class="bar3 a3 bg-success"></span> 

                                     <span class="bar4 a4 bg-warning dk"></span> 

                                     <span class="bar5 a5 bg-danger dker"></span> 

                                     </span>

                                     </h2> 

                                     

                                     <div class="row row-sm"> 

                                     

                                     <div id="videoplayercontaner" ><iframe id="videoplayeriframe" src="" frameborder="0"></iframe></div>

                                      <div id="search_results"></div> 

                                      

                                      

                                      

                                      

                                      <?php 

									  $youtubeid = 0;

									  ?>

                                      

                                      

                                    

                                    </section>

                                       

                                      <script src="js/app.v1.js"></script> 

<script src="js/app.plugin.js"></script> 

<script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script> 

<script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>  



                                        <script>

										



	

										

										

			var myPlaylist = "null";

			var is_focused = false;						   

									   $(document).ready(function(){

				



		$('#infield').focus(function() 

				{

					console.log("Is foucused");

					is_focused = true;	

				});

						   	

$(document).bind('keypress', function(e) {

            if(e.keyCode==13)

			{

				if(is_focused == true)

				{	

                $('#submitit').trigger('click');

				console.log("clicked");

				is_focused = false;

				}

                

                

             }

        });



 myPlaylist = new jPlayerPlaylist({

    jPlayer: "#jplayer_N",

    cssSelectorAncestor: "#jp_container_N"

  }, [

  

  <?php

  $sql = "SELECT * FROM mp3_playlist WHERE fbuserid = $myfbuserid ORDER BY id DESC LIMIT 100";



$result = mysqli_query($conn,$sql);

$countme =1;

while($row = mysqli_fetch_array($result))

{



     $ytid = $row['ytid'];

	  $youtubeid = $countme;

	 $songname = $row['songname'];

	 $filelocation = $row['filelocation'];

	 $newmyimg = "//i.ytimg.com/vi/".$ytid."/mqdefault.jpg";

	 ?>

	  {

      title:"<?php echo $songname ?>",

      artist:"<?php echo $ytid ?>",

      mp3: "<?php echo $filelocation?>",

      oga: "<?php echo $filelocation?>",

      poster: "<?php echo $newmyimg ?>"

      },

	 <?php

	 

}

  ?>

   

    

  ], {

    playlistOptions: {

      enableRemoveControls: true,

      autoPlay: false

    },

    swfPath: "js/jPlayer",

    supplied: "webmv, ogv, m4v, oga, mp3",

    smoothPlayBar: true,

    keyEnabled: true,

    audioFullScreen: false

  });

  

  $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer,  function(){

    $('.musicbar').removeClass('animate');

    $('.jp-play-me').removeClass('active');

    $('.jp-play-me').parent('li').removeClass('active');

	is_playing = false;

	console.log("IT IS NOT PLAYING ANY MORE");

  });



  $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer,  function(){

    $('.musicbar').addClass('animate');

	myMedia.pause();

	is_playing = true;

	console.log("IT IS PLAYING NOW");

	$("#videoplayercontaner").fadeOut("fast");

	$("#videoplayeriframe").attr("src","");

  });



  $(document).on('click', '.jp-play-me', function(e){

    e && e.preventDefault();

    var $this = $(e.target);

    if (!$this.is('a')) $this = $this.closest('a');



    $('.jp-play-me').not($this).removeClass('active');

    $('.jp-play-me').parent('li').not($this.parent('li')).removeClass('active');



    $this.toggleClass('active');

    $this.parent('li').toggleClass('active');

    if( !$this.hasClass('active') ){

      myPlaylist.pause();

	  console.log("IT IS NOT PLAYING ANY MORE 2");

    }else{

      var i = Math.floor(Math.random() * (1 + 7 - 1));

      myPlaylist.play(i);

	  

	  console.log("IT IS PLAYING NOW 2");

	  

    }

    

  });











});

									   

									   </script>

                                       

                                      

                                       

                                      <?php 

									  

									  if($youtubeid > 0)

									  {

									  include "footer.php";

									  }

									  ?>

                                        

                                        </section> 

                                        

                                        </section> 

                                        

                                        

                                        

                                        

                                        

                                        

                                        

                                        

                                        

                                        


                                     </section> 

                                     <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 

                                     </section> 

                                     </section> 

                                     </section> 

                                     </section> 

                                     <!-- Bootstrap --> 

                                     <!-- App --> 











</body>

</html>

