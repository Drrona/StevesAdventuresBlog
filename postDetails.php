<?php 

	if(null === session_id()){
		session_start();
	}

	require("navigation.inc");
 
	$navigation = new Navigation();

  echo $navigation;
  
  require("controllers/database.php");

  if(isset($_GET["postid"])){
      $id = $_GET["postid"];
  } else $id = "";

  $server = $navigation->GetServer();


	
?>  

<section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="main_blog_details col-lg-12">

                <?php
                    $query = "select * from posts where idposts=" . $id;

                    $results = mysqli_query($dbc, $query);

                    while($row = mysqli_fetch_assoc($results))
                    {
                        echo "<img class=\"img-fluid\" src=\"" . $row["mediaLink"] . "\" alt=\"\">" . 
                        "<br /> <a href=\"#\"><h4>" . $row["title"] . "</h4></a>" . 
                        "<p>" . $row["contentText"] . "</p>";
                    }
                    
                    
                ?>
             </div>
            </div>
        </div>
          

          <div class="navigation-area">

                <div class="comments-area">

                    <?php
                        $query = "select * from comments join authors where comments.userId = authors.idauthors and postId=" . $id;

                        $results = mysqli_query($dbc, $query);

                        echo "<h4>" . $results->num_rows . " Comments</h4>" .
                        "<div class=\"reply-btn\">" . 
                                        "<a href=\"$server/createComment.php?id=" . $id . "\"class=\"btn-reply text-uppercase\">Post a Comment!</a> " .
                        "</div><br>";
                        while($row = mysqli_fetch_assoc($results)) {
                            echo "<div class=\"comment-list\">" . 
                            "<div class=\"single-comment justify-content-between d-flex\">" . 
                                "<div class=\"user justify-content-between d-flex\">" . 
                                    "<div class=\"thumb\">" . 
                                        "<img src=\"" . $row["profilePictureId"] . "\" height = \"50\" alt=\"\"/>" .
                                    "</div>" . 
                                    "<div class=\"desc\">" .
                                        "<h5><a href=\"#\"></a></h5>" .
                                        "<p class=\"date\">" . $row["timestamp"] . "</p>" .
                                        "<p class=\"comment\">" .
                                            $row["commentText"] .
                                        "</p>" .
                                    "</div>" . 
                                "</div>" . 
                                "<div class=\"reply-btn\">" . 
                                        "<a href=\"$server/createComment.php?id=" . $id . "\"class=\"btn-reply text-uppercase\">reply</a> " .
                                "</div>" .
                            "</div>" .
                        "</div>";
                        }
                        
                        

                    ?>                                      				
                </div>
        </div>
      </div>
  </section> 

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>