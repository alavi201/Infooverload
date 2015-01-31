<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
  

</script>

<link href="global.css" rel="stylesheet" type="text/css" />
<script>

	function tick(){
		$('#ticker li:first').slideUp( function () { $(this).appendTo($('#ticker')).slideDown(); });
	}
	setInterval(function(){ tick () }, 3000);


</script>

<title>Info Overload</title>
    <script src="https://www.google.com/jsapi"></script>
	<style>
	img{border:none, outline: none;}
	</style>
    <script type="text/javascript">
      
      // This code generates a "Raw Searcher" to handle search queries. The Raw 
      // Searcher requires you to handle and draw the search results manually.
      google.load('search', '1');

	  
	  				 
      var newsSearch;
	  var newsSearch1;
	  
	  var y = 1;

      function searchCompleteBBC() {
document.getElementById("one").innerHTML = " ";
        // Check that we got results
        document.getElementById('content').innerHTML = '';
		
		
        if (newsSearch.results && newsSearch.results.length > 0) {
          for (var i = 0; i < newsSearch.results.length; i++) {

            // Create HTML elements for search results
			var d = document.getElementById('image');
           
			var node = newsSearch.results[i].html.cloneNode(true);

// attach the node into my dom

			
var b= newsSearch.results[i].image.url;
				d.src=b ;
				//e.src=b;
			// Append search results to the HTML nodes
           
			
            document.getElementById("one").appendChild(node);
			
          }
        }
	  
	  
	  
	  }
	  
	  function searchCompleteCNN() {

        // Check that we got results
		document.getElementById("two").innerHTML = " ";
        //document.getElementById('content').innerHTML = '';
		
		
        if (newsSearch1.results && newsSearch1.results.length > 0) {
          for (var i = 0; i < newsSearch1.results.length; i++) {

            // Create HTML elements for search results
			var d = document.getElementById('image2');
           
			var node = newsSearch1.results[i].html.cloneNode(true);

// attach the node into my dom

			
var b= newsSearch1.results[i].image.url;
				d.src=b ;
				//e.src=b;
			// Append search results to the HTML nodes
           
			
            document.getElementById("two").appendChild(node);
          }
        }
		else 
	  document.getElementById("two").innerHTML = "<p>No news on CNN</p>";
	  
	  }
	  
//	  var btn = document.getElementById("btn").onclick= function 
	  
	 function BBC(x){
	  
	  // Create a News Search instance.
        newsSearch = new google.search.NewsSearch();
  
        // Set searchComplete as the callback function when a search is 
        // complete.  The newsSearch object will have results in it.
        newsSearch.setSearchCompleteCallback(this, searchCompleteBBC, null);
		
		newsSearch.setResultSetSize(1); 
		
		newsSearch.setSiteRestriction("BBC");

        // Specify search quer(ies)
        newsSearch.execute(x);

        // Include the required Google branding
        google.search.Search.getBranding('branding');
	  }
	  
	  function CNN(x){
	  
	  // Create a News Search instance.
        newsSearch1 = new google.search.NewsSearch();
  
        // Set searchComplete as the callback function when a search is 
        // complete.  The newsSearch object will have results in it.
        newsSearch1.setSearchCompleteCallback(this, searchCompleteCNN, null);
		
		newsSearch1.setResultSetSize(1); 
		
		newsSearch1.setSiteRestriction("CNN");

        // Specify search quer(ies)
        newsSearch1.execute(x);

        // Include the required Google branding
        google.search.Search.getBranding('branding');
	  }
	  
	  
	  
    </script>
    <body style="font-family: Arial;border: 0 none;">


	
Search: <input type="text" id="txt" name="search"  required><br>
<input type="submit" id="but2" onkeydown="if (event.keyCode == 13) document.getElementById('but2').click();">

    <div id="branding"  style="float: left;"></div><br />
    <div id="content"></div>
	
<ul id="ticker">


</ul>

	<div>
	<img id="image" height="400" width="400" border="0"/>
	<div id="one"></div>
	<img id="image2" height="400" width="400" border="0" />
	<div id="two"></div>
	
	
	
	</div>
  </body>
  
  <script>

     $("#but2").click(function(){ //Common Pitfall: Registering click handler as soon as the document loads
	var someInput = document.getElementById('txt').value;
	  BBC(someInput);
	  CNN(someInput);
        $.ajax({
	  url: "twitterajax.php?q="+someInput //script to call
	})
	.done(function(data) {
                              obj = JSON.parse(data);
                              //alert(data);
                              $("#ticker").empty();
                              for (var i = 0; i <obj.statuses.length ; i++ ){
//<a href="https://twitter.com/'.$reply->statuses[$j]->user->screen_name.'/status/'.$reply->statuses[$j]->id.'" ><img src="'.$reply->statuses[$j]->user->profile_image_url.'" /></a> @'.$reply->statuses[$j]->user->name.': '.$reply->statuses[$j]->text.'
                              $("#ticker").append("<li><a href ='https://twitter.com/"+obj.statuses[i].user.screen_name+"/status/"+obj.statuses[i].id+"'><img src='"+obj.statuses[i].user.profile_image_url+"' /></a> @"+obj.statuses[i].user.screen_name+":"+obj.statuses[i].text+"</a></li>");
                               }
                              });
              });

</script>


</html>	