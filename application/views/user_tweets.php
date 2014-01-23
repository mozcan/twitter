<html>

  <body>
  	<?php $this->load->view("header_view")	?>
     
      <div class="row-fluid">
        <div class="span3">
        	<div class="well sidebar-nav">
        	 <table class="table table-hover">
        	 	<tr>
        	 		<td colspan="3"><b><?php echo $username." ".$lastname; ?></b></td>
        	 	</tr>
        	 	<tr>
        	 		<td><a class="btn" href="<?php echo site_url("profil_cnt")?>">Tweets</a></td>
              <td><a class="btn" href="<?php echo site_url("follow_info/followed")?>">Followed</a></td>
              <td><a class="btn" href="<?php echo site_url("follow_info/followers")?>">Followers</a></td>
        	 	</tr>
            <tr>
              <td><?php echo $tweets_details['tweets_counts']; ?></td>
              <td><?php echo $tweets_details['followed_count']; ?></td>
              <td><?php echo $tweets_details['followers_count']; ?></td>
            </tr>
            <?php echo form_open('home_cnt/new_tweet',array('class' => 'well','name' => 'myform')); ?>
            <tr>
              <td colspan='3'><textarea rows="2" placeholder='New Tweet' name='new_tweet'></textarea></td>
            </tr>
             <tr>
              <td colspan='3'><button type='submit' class='btn btn-primary' id='firstbtn'>Tweet</button></td>
            </tr>
          </form>
        	 </table>  
        </div>
        </div>

        <div class="span3">
          <div class="well sidebar-nav">
           <table class="table table-hover">
            <?php for ($i=0;$i<count($tweets);$i=$i+3){
              ?>
              <tr>
                <td>
                 <?php 
                    echo "<b>".$tweets[$i+2]."</b><br>";
                    echo $tweets[$i];
                 ?>
                </td>
              </tr>
              <?php
            }
            ?>
           </table>  
        </div>
        </div>
        </div>
  </body>
</html>
