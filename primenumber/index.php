<?php
	use google\appengine\api\users\User;
	use google\appengine\api\users\UserService;
?>

<?php
function GoogleAuthentication()
{
$userDetails = UserService::getCurrentUser(); 
	if (isset($userDetails)) {
		echo sprintf('<div class="Details BlackText">Welcome, %s! (<a href="%s">sign out</a>)</div>',
				   $userDetails->getNickname(),UserService::createLogoutUrl('/'));
	} else {
		echo sprintf('<a href="%s">Sign in </a>',UserService::createLoginUrl('/'));
	}
}

function isPrime($num) {
	$memcache = new Memcache;
    $key = htmlspecialchars($num);
    $cachedVal = $memcache->get($key);

	
	if($cachedVal === false)
	{
		
		$n = 2;
        while ($n < $num) {
            if ($num%$n) {
                $n++;
                continue;
            }

            return false;
        }
		
		$memcache->set($key,$num);
        return true;

		
	}
    else
        return true;

}
?>


<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="Sreekhar Ale">
  <meta name="Description" content="String search project, Database">
  <title>Basic database application</title>

  <style>
html, body {
  margin: 0 auto;
  background-color: #FAFAFA;
  font-family: sans-serif;
  
}

.Details {
	float: right;
}

.BlackText {
	font-size: 175%;
	color: #000000;
}

.title {
	margin: 0 auto;
	padding-top: 2%;
	height: 40%;
	background-color: #000000;
	color: #000000;
	text-align: center;
    font-size: 300%;
	font-weight: bold;
	z-index: 10;
	box-shadow: 0px 10px 5px grey;
	background: url("images/teaching_village_wordle.png");
	background-repeat: no-repeat;
	background-size: 100% 100%;
}

.BoxShadow {
	background-color: #FFFFFF;
}

.container {
	position: absolute;
	top: 20%;
	left: 25%;
	height: 55%;
	width: 50%;
	border-style: solid;
	box-shadow: 10px 10px 10px -2px grey;
	border-color: #FFFFFF;
	background-color: #000000;
	z-index: 100;	
}


.FormStyle {
	text-align: center;
    margin-top: 5%;
}


  </style>

 </head>

<body>
	<?php echo GoogleAuthentication(); ?>

	<div class="title">
		<div class="BoxShadow">This application allows you to find whether a number is prime or not.</div>
	</div>


	<form class="FormStyle" action = "" method="post">
		Enter the number  <br/>
		<input type="number" name="num" id="num" maxlength="4" autofocus required/>
		<input type="submit" name="submit" value="Submit" />
	</form>

<?php
if(isset($_POST['submit']) and $_POST['submit'] == "Submit")
{
	
    if(isset($_POST['num']) and is_numeric($_POST['num']))
    {
		$timeIntial = microtime(true);
		if(isPrime($_POST['num'])) {
			echo 'Entered number: <strong>'.$_POST['num'].' is Prime</strong><br/>';
		}
		else {
			echo 'Entered number: <strong>'.$_POST['num'].' is not Prime</strong><br/>';
		}
         
		$timeFinal = microtime(true);
		echo 'Execution time: ' . ($timeFinal - $timeIntial);
    }
}

?>

</body>
</html>