<?php 
	
	function registerReview($review){
		//Öppnar textfilen 
		$reviews = fopen("reviews.txt", "a");
		//låser filen för att undvika krock
		if(flock($reviews, LOCK_EX)){
			fwrite($reviews, $review);
			fflush($reviews);
			flock($reviews, LOCK_UN);
		}

		fclose($reviews);
	}


	function retrieveReview(){
		$data = $_POST;
		$keys = array_keys($data);

		$review = "";

		foreach ($keys as $key) {
			$str = "$key: $data[$key]\n";
			$review .= $str;
		}

		return $review;
	}

	//Denna metod skickar tillbaka vad användaren har matat in, en alert med javascript visas. 
	function showSite(){
		header("Content-type: text/html");

		$name = $_POST["customer-name"];
		$message = $_POST["review-message"];
		$stars = $_POST["stars"];

		$delimiter = "<!-- EXPLODE -->";
		$markup = "<p style='font-size:30px;color:white;line-height: 1.4em;'>REPLACE</p>";
		$response = "Thank you $name!<br>Your review has been made, your review is: $message and you gave us $stars stars! Thank you!";

		$response = str_replace("REPLACE", $response, $markup);

		$html = file_get_contents("aboutus.html");
		$explode = explode($delimiter, $html);

		$explode[1] = $response;

		foreach ($explode as $str) {
			echo $str;
		}
	}

	function handleReview(){
		$vSpace = "\n\n\n";
		$res = retrieveReview();
		$res .= $vSpace;
		registerReview($res);
		showSite();
	}

	handleReview();

 ?>