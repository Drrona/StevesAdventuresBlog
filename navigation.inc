<?php

/*
*
* Author: Suraj Pai
* This include file creates the navigation component for the entire site and is loaded on every page.
*/

session_start();

class Navigation {
    protected $title = "Steve's Adventures";
    protected $keywords = "Steve, Adventures, Blog, Avengers, Writing";

    public function __construct() {
        //$this->server = 'http://'.$_SERVER["SERVER_NAME"].'/StevesAdventures';    
        $this->server = 'http://'.$_SERVER["SERVER_NAME"].'/~ics325su2022'.'/StevesAdventures';		// domain name for school server

        #this -> SetServer($this->server);
    }

    public function __toString() {
        return $this -> DisplayHeader() . 
               $this -> DisplayMenu();
    }

    public function GetServer() {
  	    return $this->server;
    }
   
    public function SetServer($server){
  	    $this->server = $server;
    }

    public function DisplayHeader(){
        return //"<!DOCTYPE html> \n" .
                "<html lang=\"en\"> \n" . 
                "<head> \n" . 
                "<meta charset=\"UTF-8\"> \n" . 
                "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"> \n" .
                "<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\"> \n" . 
                "<title>".$this->title."</title> \n" . 
                "<link rel=\"icon\" href=\"img/logo.png\" type=\"image/png\"> \n" . 
                "<link rel=\"stylesheet\" href=\"vendors/bootstrap/bootstrap.min.css\"> \n" .
                "<link rel=\"stylesheet\" href=\"vendors/fontawesome/css/all.min.css\"> \n" . 
                "<link rel=\"stylesheet\" href=\"vendors/themify-icons/themify-icons.css\"> \n" . 
                "<link rel=\"stylesheet\" href=\"vendors/linericon/style.css\"> \n" . 
                "<link rel=\"stylesheet\" href=\"vendors/owl-carousel/owl.theme.default.min.css\"> \n" . 
                "<link rel=\"stylesheet\" href=\"vendors/owl-carousel/owl.carousel.min.css\"> \n" . 
                "<link rel=\"stylesheet\" href=\"css/style.css\"> \n" . 
                "</head>";
    }

    public function DisplayMenu(){

        $loggedIn = "<a href=\"$this->server/login.php\">Login</a>";
        if(isset($_SESSION['uname'])) {
            $loggedIn = "Welcome, " . $_SESSION['uname'] . " | 
                            <a href=\"$this->server/logout.php\">Logout</a>";
        }
        
        if(isset($_SESSION['adminFlag'])){
            if ($_SESSION['adminFlag'] == 1) {
                $adminLink =  "| <a href=\"$this->server/admin.php\"> Admin </a>"; 
            } 
            else
            {
                $adminLink = "";
            }
        }else $adminLink = "";

        if(isset($_SESSION['uname']))
        {
            $registerLink = "";
            $createPost = "| <a href=\"$this->server/createPost.php\">Create Post</a>";
        }else 
        {
            $registerLink = "| <a href=\"$this->server/register.php\">Register</a>";
            $createPost = "";
        }


        require("controllers/database.php");

        $query = "select * from authors";
        $results = mysqli_query($dbc, $query);

        $authors = "";
        while($row = mysqli_fetch_assoc($results)) {
            $authors .= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"$this->server/userarchive.php?id=" . $row["idauthors"] . "&author=" . 
            $row["username"] . "\">" . $row["displayName"] . "</a></li> \n";
        }


        return "<body> \n" .
                "<header class=\"header_area\"> \n" . 
                    "<div class=\"main_menu\"> \n" . 
                    "<nav class=\"navbar navbar-expand-lg navbar-light\"> \n" .
                        "<div class=\"container box_1620\"> \n" . 
                        "<a class=\"navbar-brand logo_h\" href=\"index.php\"><img src=\"img/logo.png\" alt=\"AvengerLogo\" width = \"100\"></a> \n" . 
                        "<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"> \n" . 
                            "<span class=\"icon-bar\"></span> \n" . 
                            "<span class=\"icon-bar\"></span> \n" . 
                            "<span class=\"icon-bar\"></span> \n" . 
                        "</button> \n" . 
                        "<div class=\"collapse navbar-collapse offset\" id=\"navbarSupportedContent\"> \n" . 
                            "<ul class=\"nav navbar-nav menu_nav justify-content-center\">\n" . 
                            "<li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php\">Home</a></li> \n" . 
                            $authors . 
                            "</ul> \n" . 
                        "</div> \n" . 
                        "<div> \n" .
                        "<ul class=\"nav navbar-nav navbar-right navbar-social\"> \n" . 
			                    $loggedIn .
			                    $registerLink .
			                    $adminLink .
                                $createPost .
		                    "</ul> \n" .
                        "</div> \n" .
                        "</div> \n" . 
                    "</nav> \n" . 
                    "</div> \n" . 
                "</header>";

    }


}



?>