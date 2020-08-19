<?php   
 
    if(null === session_id()){
        session_start();
    }

    require("navigation.inc");
    $navigation = new Navigation();
    echo $navigation;
    
    require("controllers/database.php");
    
    if(isset($_POST['submitSearch'])) {
        
    $usernameSearch = $_POST['search'];
        
    $userQuery = "select * from authors where username='" . $usernameSearch . "'";
    
    $result = mysqli_query($dbc, $userQuery);
    
    if($result->num_rows ==0) 
    {
        echo "User not found. Try again.";
        exit; 
    }

    while($row = mysqli_fetch_assoc($result)) {
        
        $username = $row['username'];
        $age = $row['age'];
        $email = $row['email'];
        $profilePictureId = $row['profilePictureId'];
        $isAdmin = $row['isAdmin'];
        $displayName = $row['displayName'];
        
    }

  }
    
?>            
    <style>
        h1 {text-align: center;}
        form {text-align: center;}
    </style>

    <div class = "mainContent">
    	
    	<h1 class="indexH1">Edit User</h1>
        
        <form name="searchUser" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
            <fieldset id="field1">
                
              <label>Search for user:</label>
            
                   <input type="text" name="search" placeholder="Enter username to search" size="40">
                 
                   <input type="submit" name="submitSearch" value="Search">
            
            </fieldset>
                 
        </form>
        
        
        <?php if(isset($_POST['submitSearch'])) { ?>
            
        <form name="editUser" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
            <fieldset id = "fieldYN">
                
               <label>Username:</label>
                   <input type="text" name="userName" readonly="true" value = "<?php echo $username ?>" size="40"><br>
                   
               <label>Age:</label>
                   <input type="text" name="age" value = "<?php echo $age ?>" size="40"><br>
            
               <label>Email:</label>
                   <input type="text" name="email" value = "<?php echo $email ?>" size="40"><br>
                
               <label>Profile Picture Id:</label>
                   <input type="text" name="profilepictureid" value = "<?php echo $profilePictureId ?>" size="40"><br>
                   
               <label>Admin?:</label>
                   <input type="text" name="isadmin" value = "<?php echo $isAdmin ?>" size="15"><br>
                   
               <label>Display Name:</label>
                   <input type="text" name="displayname" value = "<?php echo $displayName ?>" size="40"><br>            
            </fieldset>
            
        </form>
        
        <?php } ?>
        
     </div>
        
    </body>
    
</html>