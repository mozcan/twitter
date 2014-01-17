<html lang="en">
<head>
<title>User Page</title>
<link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">

    <script src="<?php echo base_url("js/jquery-1.9.1.min.js");?>"></script>
    <script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>


</head>
<body>
          <div class="navbar">
            <div class="navbar-inner">
              <p class="brand"><?php echo $username; ?></p>
              <ul class="nav">
                <li>
                  <a href="<?php echo site_url("home_cnt") ?>">Home</a>
                </li>
                <li>
                  <a href="<?php echo site_url("profil_cnt") ?>">Profil</a>
                </li>
                 <li class="dropdown">

                <a  data-toggle="dropdown" href="#">
                  Message
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">

                  <li><a href="message_cnt/new_message" class="btn">New Message</a></li>
                  <li><a href="#" class="btn">Incoming Box</a></li>
                  <li><a href="#" class="btn">Archiv</a></li>
                  <li><a href="#" class="btn">Outgoing Box</a></li>
                </ul>

                </li>
                <li>
                  <a href="<?php echo site_url("header/logout")?>">Logout</a> 
                </li> 
                <li>
                  <form action='search' method='post'>
                 <input type="text" class="input-medium search-query" name='search' id='search'>
                 <button type="submit" class="btn" id='button'><i class="icon-search"></i></button>
                  </form>            
                </li>                                               
              </ul>
            </div>
          </div>   
</body>
</html>