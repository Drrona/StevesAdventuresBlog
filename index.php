<?php 

/*

Author: Suraj
Class: ICS 325 Project Final Phase
Credit: While I did do the majority of this, the intial template was found on colorlib.com Sensive. 
Reason: I know I am not a very creative person, so when it comes to layout, I'm lacking. 
However, it takes a lot of work to hook up everything to the backend and that is my strength. 
In addition, I made some creative changes myself to make this all work and look appealing. 

I also want to give credit to the pictures I used of Marvel characters. These are NOT my art, and I do
not own them. They are owned by Marvel and I am solely using them as demonstration to fit the theme. 
*/


	if(null === session_id()){
		session_start();
	}

	require("navigation.inc");
 
	$navigation = new Navigation();

  echo $navigation;
  
  require("controllers/database.php");

  $server = $navigation->GetServer();
	
?>  
  <main class="site-main">

    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <h1>Steve's (and Friends) Adventures</h1>
          </div>
        </div>
      </div>
    </section>  
    <section>
      <div class="container">
        <div class="owl-carousel owl-theme blog-slider">

          <?php
            $query = "select * from posts join authors where posts.authorid = authors.idauthors order by postDate desc LIMIT 6";

            $results = mysqli_query($dbc, $query);

            while($row = mysqli_fetch_assoc($results)) {
              echo "<div class=\"card blog__slide text-center\">
              <div class=\"blog__slide__img\">
                <img class=\"card-img rounded-0\" src=\"" . $row["mediaLink"] . "\" alt=\"\">
              </div>
              <div class=\"blog__slide__content\">
                <a class=\"blog__slide__label\" href=\"$server/userArchive.php?id=" . $row["idauthors"] . "&author=" . $row["username"] . "\">" . $row["displayName"] . "</a>
                <h3><a href=\"$server/postDetails.php?postid=" . $row["idposts"] . "\">" . $row["title"] . "</a></h3>
                <p>" . $row["postDate"] . "</p>
              </div>
            </div>";

            }
          ?>
        </div>
      </div>
    </section>

  </main>

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>