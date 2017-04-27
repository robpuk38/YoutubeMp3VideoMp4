<?php



include "../dbconfig.php";



if(isset($_POST['filelocation'])&&isset($_POST['fbuserid'])&&isset($_POST['filename'])&&isset($_POST['ytid']))

{

 

$filename =$_POST['filename'];

$ytid = $_POST['ytid'];	

 $fbuserid = $_POST['fbuserid'];

$thaturl = $_POST['filelocation'];







$sql = "SELECT * FROM mp3_tmp  

    WHERE ytid = '" . $ytid  . "' ORDER BY id DESC LIMIT 1"; 

  $query = mysqli_query($conn,$sql) or trigger_error("Query Failed: " . mysqli_error()); 

 

  

  if (mysqli_num_rows($query) == 1) 

  { 

  $row = mysqli_fetch_assoc($query);

  $fileurl =$row['filelocation'];

  echo $fileurl;

			return;

  }

  else

  {



 preg_match_all('/[A-Z][^A-Z]*/', $filename, $matches, PREG_SET_ORDER);

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

	$name_change = $word1;

	

}

if($word2 != "0")

{

	$name_change = $word1." ".$word2;

	

}

if($word3 != "0")

{

	$name_change = $word1." ".$word2." ".$word3;

	

}

if($word4 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4;

	

}

if($word5 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5;

	

}

if($word6 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6;

	

}

if($word7 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6." ".$word7;

	

}

if($word8 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6." ".$word7." ".$word8;

	

}

if($word9 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6." ".$word7." ".$word8." ".$word9;

	

}

if($word10 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6." ".$word7." ".$word8." ".$word9." ".$word10;

	

}

if($word11 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6." ".$word7." ".$word8." ".$word9." ".$word10." ".$word11;

	

}

if($word12 != "0")

{

	$name_change = $word1." ".$word2." ".$word3." ".$word4." ".$word5." ".$word6." ".$word7." ".$word8." ".$word9." ".$word10." ".$word11." ".$word12;

	

}





$users = "../users/";



	if(!file_exists($users))

    {

		mkdir($users,0777);

	 chmod($users,0777);

	}

$usersid = $users .$fbuserid."/";

if(!file_exists($usersid))

    {

		mkdir($usersid,0777);

	 chmod($usersid,0777);

	}

$userstemplocation =$users .$fbuserid."/temp/";

if(!file_exists($userstemplocation))

    {

		mkdir($userstemplocation,0777);

	 chmod($userstemplocation,0777);

	}



	

	





set_time_limit(0);





$newfname = $userstemplocation.$name_change.".mp3";











sleep(2);




$countit = 0;
$file = fopen ($thaturl, "rb");

$file_headers = @get_headers($file);

if($file_headers[0] == 'HTTP/1.0 404 Not Found')
{
      echo 0;
} 
else if 
($file_headers[0] == 'HTTP/1.0 302 Found' && $file_headers[7] == 'HTTP/1.0 404 Not Found')
{
    echo 0;
} 
else
{
 


echo $thaturl;




return;
}




}



  

}

 

 ?>

 

