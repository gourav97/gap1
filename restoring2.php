<html>
<head>



  <style>
  #backgroundImage{z-index: 1;}

#backgroundImage:before {
   content: "";
   position: absolute;
   z-index: -1;
   top: 0;
   bottom: 0;
   left: 0;
   right: 0;
   background-image: url(hack.jpg);

    background-repeat: no-repeat;
    background-size: 100%;
    opacity: 0.1;
    filter:alpha(opacity=50);
    height:100%;
    width:100%;
 }

  .vr {
    width:5px;
    background-color:white;
    position:absolute;
    top:0;
    bottom:0;
    left:210px;
   
}
  body{

  text-align: center;
  background-color: grey;
    color:darkblue;
  font-size: 20px;


  }
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</head>
<body>
<div id="backgroundImage">

    <h1><center><u>OUTPUT</u></center></h1>

</div>

<ul>
  <li><a class="active" href="html.html">Home</a></li>
  <li><a href="flowchart.html">Flowchart</a></li>
  <li><a href="video.html">Video</a></li>

  <li><a href="re.html">Calculator</a></li>
  <li><a href="about.html">About</a></li> 
</ul>
 <div class="vr">&nbsp;</div>
<?php
  $a;
  $b; $c; $com=array(1,0,0,0,0);
  $s;
  $anum=array(0,0,0,0,0); $anumcp=array(0,0,0,0,0); $bnum=array(0,0,0,0,0);
  $acomp=array(0,0,0,0,0); $bcomp=array(0,0,0,0,0); $quo=array(0,0,0,0,0);
  $res=array(0,0,0,0,0);$rem=array(0,0,0,0,0);

 if(isset($_POST['submit']))
 {
   $a=$_POST['no1'];
   $b=$_POST['no2'];
   main();
 }


  function main()
  {
      global $a,$b,$c,$s,$anum,$anumcp,$bnum,$acomp,$bcomp,$quo,$res,$com,$rem; 
       $i;
  	echo"<br> Expected quotient is ".($a/$b);
  	echo"<br>Expected remainder is ".($a%$b);
  	binary();
  	echo"<br>unsigned binary equivalent are ";
  	echo"<br>A=";
  	for($i=4;$i>=0;$i--)
  	{
  		echo"$anum[$i]";
  	}
  	echo"<br>B=";
  	for($i=4;$i>=0;$i--)
  	{
  		echo"$bnum[$i]";
  	}
    
    echo"<br> B+1=";
    for($i=4;$i>=0;$i--)
    {
    	echo"$bcomp[$i]";
    }
    echo"<br><br>-->";
    shl();
    for($i=0;$i<5;$i++)
    {
    	echo"<br>-->";
    	echo"<br> SUB B:";
    	add($bcomp);
      if($rem[4]==1)
      {
        echo"<br>-->RESTORE";
        echo"<br>ADD B:";
        $anumcp[0]=0;
        add($bnum);

      }
    	else

      {
        $anumcp[0]=1;
      }
      if($i<4)
      {
        shl();
      }
    }

    echo"<br>-------------------------";
    echo"<br> sign of the result $s";
    echo"<br> Remainder is =";
    for($i=4;$i>=0;$i--)
    {
      echo"$rem[$i]";
    }
    echo"<br> Quotient is = ";
    for($i=4;$i>=0;$i--)
    {
      echo"$anumcp[$i]";
    }
  }

function binary()
{

	global $a,$b,$c,$s,$anum,$anumcp,$bnum,$acomp,$bcomp,$quo,$res,$com,$rem;    
  $r;$r2;$i;$temp;
	for($i=0;$i<5;$i++)
	{
		$r=$a%2;
		$a=$a/2;
		$r2=$b%2;
    $b=$b/2;
		$anum[$i]=$r;
		$anumcp[$i]=$r;
    $bnum[$i] = $r2;
		if($r2==0)
		{


	   		$bcomp[$i]=1;

		}
        if($r==0)
        {

           $acomp[$i]=1;

        }


	}
	$c=0;

	for($i=0;$i<5;$i++)
	{   
    
       $res[$i]=$com[$i]+$bcomp[$i]+$c;
       if($res[$i]>=2)
       {

       	$c=1;
       }
        else{
        	$c=0;

        }
      $res[$i]=$res[$i]%2;
	}

	for($i=4;$i>=0;$i--)
	{

		$bcomp[$i]=$res[$i];
	}
}


function add($num)
{
  global $a,$b,$c,$s,$anum,$anumcp,$bnum,$acomp,$bcomp,$quo,$res,$com,$rem;    
  $i;
  $c=0;
  for($i=0;$i<5;$i++)
  {
  	$res[$i]=$rem[$i]+$num[$i]+$c;
  	if($res[$i]>=2)
  	{

  		$c=1;

  	}
  	else
    {
  		$c=0; 
    }
     $res[$i]=$res[$i]%2;

  }
   for($i=4;$i>=0;$i--)
   {

   	$rem[$i]=$res[$i];
   	echo"$rem[$i]";

   }
   echo":";
   for($i=4;$i>=0;$i--)
   {
      echo"$anumcp[$i]";
   }
   
}
 
function shl()
{
	global $a,$b,$c,$s,$anum,$anumcp,$bnum,$acomp,$bcomp,$quo,$res,$com,$rem; 
  $i;
	for($i=4;$i>0;$i--)
	{
		$rem[$i]=$rem[$i-1];
	}
  $rem[0] = $anumcp[4];

	for ($i=4; $i>0 ; $i--) 
  { 
	    $anumcp[$i]=$anumcp[$i-1];
	}

	$anumcp[0]=0;

	echo"<br>Shift left";
	for($i=4;$i>=0;$i--)
	{
		echo"$rem[$i]";
	}
    echo":";
    for($i=4;$i>=0;$i--)
    {
    	echo"$anumcp[$i]";
    }
}
    

?>


</body>

</html>