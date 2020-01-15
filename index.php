<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ashish ChatBox</title>

    <link rel="stylesheet" href="style.css" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
      function name()
      {
            var firstname = ["Marquis", "Samir", "Adrien", "Joyce", "Pierce", "Juliette", "Kelton", "Jacob", "Isiah", "Lindsay", "Kian", "Jordyn", "Jaquan", "Anya", "Wayne", "Khalil"];
            var lastname= ["Mills", "Mercer", "Reeves", "Hines", "Sanford", "Irwin", "Koch", "Hinton", "Estes", "Jackson", "Lowe", "Guerra", "Pineda", "Franco", "Cowan", "Krause"];
            var rand_first = Math.floor(Math.random()*firstname.length);
            var rand_last = Math.floor(Math.random()*lastname.length);
            var final =firstname[rand_first]+" "+lastname[rand_last];
            console.log("current name may be :"+final);
            return final;
      }
       var defname=name();
        // ask user for name with popup prompt
        var name = prompt("Hello There ! May I Know Your Name ? ::", defname);
        //var name=defname;

        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = defname;
    	}

    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");


    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");

    	// kick off chat
        var chat =  new Chat();
    	$(function() {

    		 chat.getState();

    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {

                 var key = event.which;

                 //all keys including return.
                 if (key >= 33) {

                     var maxLength = $(this).attr("maxlength");
                     var length = this.value.length;

                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {
                         event.preventDefault();
                     }
                  }
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {

    			  if (e.keyCode == 13) {

                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");
                    var length = text.length;

                    // send
                    if (length <= maxLength + 1) {

    			        chat.send(text, name);
    			        $(this).val("");

                    } else {

    					$(this).val(text.substring(0, maxLength));

    				}


    			  }
             });

    	});
    </script>
    <style>
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color:#333;
      color: white;
      text-align: center;
    }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

</head>

<body onload="setInterval('chat.update()', 1000)">
<nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                ChatBOX!
                 </a>
            </div>
            <ul class="nav navbar-nav ">
            <li><button type="button" class="btn btn-success navbar-btn">Logout</button></li>
            </ul>
        </div>
</nav>
<font color ="black">
  <div id ='l' style="width:100%,height:100%;">
      <div id="page-wrap">
        <center>
          <h1>Anonymous Chatbox</h1>
          <h2 id="nm"></h2>
          <img src="a.jpg" style="border-radius:60%;border-width:10px;border-height:10px;border-color:black;width:100px;height:100px;border:5px;">
          </center>
          <p id="name-area"></p>

          <div id="chat-wrap"><div id="chat-area"></div></div>

          <form id="send-message-area">

              <textarea id="sendie" maxlength = '100' style="background:white;border:line;border-color:black;border-width:5px;" placeholder="Enter Your Message here !" required ></textarea>
          </form>
          <div class="counter">
            <center>
                        <!-- hitwebcounter Code START -->
            <a href="https://www.hitwebcounter.com" target="_blank">
            <img src="https://hitwebcounter.com/counter/counter.php?page=7168863&style=0010&nbdigits=8&type=page&initCount=1000" title="Counter For Website Hitwebcounter" Alt="hitwebcounter.com"   border="0" >
            </a>
            </center>
            <br>
            <br>
            <br>
          </div>
          <div class="footer">
            <p>Copyright (c) 2020 Anonymous Chatbox. All Rights Reserved.</p>
          </div>
      </div>
  </div>



</body>
<script>
    document.getElementById("nm").innerHTML = "For this Session,Your name is : <span style='color:green;'><b>"+name+"</b></span>";
    function generate()
    {

      var hexValues = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e"];

      function populate(a) {
        for ( var i = 0; i < 6; i++ ) {
          var x = Math.round( Math.random() * 14 );
          var y = hexValues[x];
          a += y;
        }
        return a;
      }

      var newColor1 = populate('#');
      var newColor2 = populate('#');
      var angle = Math.round( Math.random() * 360 );

      var gradient = "linear-gradient(" + angle + "deg, " + newColor1 + ", " + newColor2 + ")";



      document.getElementById("l").style.background = gradient;
      document.getElementById("l").style.background = gradient;
      document.getElementById("chat-area").style.background = gradient;
      document.getElementsByTagName("BODY")[0].style.background = gradient;

    }

    setInterval("generate()",10000);
  </script>

</html>
