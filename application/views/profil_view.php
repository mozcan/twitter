<html>

  <body>
    <?php $this->load->view("header_view")  ?>
     
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
           <table class="table table-hover">
            <tr>
              <td colspan="3"><b><?php echo $username." ".$lastname; ?></b></td>
            </tr>
            <tr>
              <td><a class="btn" href="<?php echo site_url("profil_cnt")?>">Tweets</a></td>
              <td><a class="btn" href="<?php echo site_url("profil_cnt")?>">Followed</a></td>
              <td><a class="btn" href="<?php echo site_url("profil_cnt")?>">Followers</a></td>
            </tr>
            <tr>
              <td><?php echo $my_tweets['tweets_counts']; ?></td>
              <td><?php echo $my_tweets['followed_count']; ?></td>
              <td><?php echo $my_tweets['followers_count']; ?></td>
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
            <?php foreach($my_tweets['my_tweets'] as $tweet){
              ?>
              <tr>
                <td>
                 <?php 
                    echo "<b>".$username." ".$lastname."</b><br>";
                    echo $tweet->tweets;
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
