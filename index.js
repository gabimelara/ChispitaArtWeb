$("#alertPic" ).click(function() {
    alert( "Added to shopping cart!" );
  });



  $("#alertPic1" ).click(function() {
    alert( "Added to shopping cart!" );
  });

  function formFunction() {
    alert("Your details were submitted, We will contact you soon!");
  }

  function  reviewFunction() {
    alert("Your review were submited, Thank you!");
  }

  if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
  }