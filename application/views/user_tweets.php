<?php $this->load->view("header_view")	?>
<html>
    <head>
        <script>
          function newTweet()
          {
              var character_count= 140 - $('#new_tweet').val().length;
              
              $('#costLabel').text(character_count);
              
              if(character_count < 0 || character_count == 140)
              {
                  $("input[type=submit]").attr("disabled", "disabled");
              }
              else
              {
                   $("input[type=submit]").removeAttr("disabled");
              }
              
          }
        </script>
    </head>
  <body>
      <div class="row-fluid">
        <div class="span3">
        	<div class="well sidebar-nav">
        	 <table class="table table-hover">
        	 	<tr>
        	 		<td colspan="3"><b><?php echo $username; ?></b></td>
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
              <td colspan='3'><textarea class="form-control" onkeyup="newTweet()" rows="2" id="new_tweet" placeholder='Yeni Tweet Olustur' name='new_tweet'></textarea></td>
            </tr>
             <tr>
                 <td colspan='3'><input type='submit' disabled='disabled' class='btn btn-primary' id='firstbtn' value='Tweet' />
                <label id="costLabel" name="costLabel"> 140 </label>
                </td>
            </tr>
          </form>
        	 </table>  
        </div>
        </div>

        <div class="span4">
          <div class="well sidebar-nav">
           <table class="table table-hover">
           <?php
                foreach($tweets as $tweet):
           ?>
                <tr>
                        <?php if($tweet->photo===''): ?>
                        <td rowspan="2"><img style="width:100%;height:100%;" src='<?php echo base_url('img/profile.jpg'); ?>' /></td>
                        <?php else: ?>
                        <td rowspan="2"><img src='<?php echo base_url('img/'.$tweet->photo); ?>' /></td>
                        <?php endif; ?>
                    <td><b><?php echo $tweet->namesurname; ?></b>&nbsp;&nbsp;<?php echo $tweet->day_number; ?>&nbsp;<?php echo $tweet->day_name; ?></td>
                </tr>
                <tr>
                    <td><?php echo $tweet->tweets; ?></td>
                </tr>
           <?php
                endforeach;
           ?>
           </table>  
        </div>
        </div>
        </div>
  </body>
</html>
