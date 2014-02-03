<html>
  <body>
  	<?php $this->load->view("header_view")	?>
     
      
      <div class="row-fluid">
        <div class="span3">
        	<div class="well sidebar-nav">
        	 <table class="table table-hover">
                    <tr>
                        <?php if($user_photo===''): ?>
                           <td colspan="3"><center><img style="height:100%;" src='<?php echo base_url('img/profile.jpg'); ?>' /></td>
                        <?php else: ?>
                           <td colspan="3"><center><img src='<?php echo base_url('img/'.$user_photo); ?>' /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td colspan="3"><b><center><?php echo $username; ?></b></td>
                    </tr>
                    <tr>
                      <td><a class="btn" href="<?php echo site_url("profil")?>">Tweets</a></td>
                      <td><a class="btn" href="<?php echo site_url("following")?>">Followed</a></td>
                      <td><a class="btn" href="<?php echo site_url("followers")?>">Followers</a></td>
                    </tr>
                    <tr>
                      <td><?php echo $tweets_details['tweets_counts']; ?></td>
                      <td><?php echo $tweets_details['followed_count']; ?></td>
                      <td><?php echo $tweets_details['followers_count']; ?></td>
                    </tr>
        	 </table>  
        </div>
        </div>
      
      <div class="span4">
          <div class="well sidebar-nav">
             <table class="table table-striped">
                 <tr>
                    <td colspan="3"><b><?php echo $username; ?></b></td>
                </tr>
                <?php
                    foreach($list as $lists):
                ?>
                <!--
                        <tr>
                            <td><?php echo $lists->namesurname; ?></td>
                            <td> <a href='<?php echo site_url('follow_info/unfollow/'.$lists->user_id.'/'.$user_id); ?>' class='btn btn-info'>Takibi Birak</a></td>
                        </tr>
                -->
                <?php
                    endforeach;
                ?>
             </table>  
        </div>
     </div>
  </body>
</html>