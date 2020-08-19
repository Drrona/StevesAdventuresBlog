<?php 

	if(null === session_id()){
		session_start();
	}

	require("navigation.inc");
 
	$navigation = new Navigation();

  echo $navigation;
  
  require("controllers/database.php");

  $server = $navigation->GetServer();

  if(isset($_GET["id"])){
	$id = $_GET["id"];
  } else $id = "";

  $server = $navigation->GetServer();

  $query = "select * from posts join authors where authors.idauthors = posts.authorid and authorid=" . $id . " order by postDate;" ;

  $results = mysqli_query($dbc, $query);

  if ($results->num_rows != 0) {
	$row = mysqli_fetch_assoc($results);
	echo "<section class=\"mb-30px\">" . 
		"<div class=\"container\">" .
			"<div class=\"hero-banner hero-banner--sm\">" . 
			"<div class=\"hero-banner__content\">" . 
				"<h1>" . $row["displayName"] . "</h1>" .
				"<nav aria-label=\"breadcrumb\" class=\"banner-breadcrumb\">" . 
				"</nav>" .
			"</div>" .
			"</div>" . 
		"</div>" .
		"</section>";
  }

  echo "<section class=\"blog-post-area section-margin\">
		<div class=\"container\">
			<div class=\"row\">
			<div class=\"col-lg-12\">";

  while ($row = mysqli_fetch_assoc($results)) {
	echo "<div class=\"col-md-12\">
			<div class=\"single-recent-blog-post card-view\">
				<div class=\"thumb\">
				<img class=\"card-img rounded-0\" src=\"" . $row["mediaLink"] . "\"  height = \"400\" alt=\"\">
				</div>
				<div class=\"details mt-20\">
				<a>
					<h3>" . $row["title"] . "</h3>
				</a>
				<p>" . substr($row["contentText"], 0, 200) . "</p>
				<a class=\"button\" href=\"$server/postDetails.php?postid=" . $row["idposts"] . "\">Read More <i class=\"ti-arrow-right\"></i></a>
				</div>
			</div>
			</div>";
  }
  
?>