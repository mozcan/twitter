<html>
  <body>
  	<?php $this->load->view("header_view")	?>
     
      <div class="row-fluid">
        <div class="span3">
        	<div class="well sidebar-nav">
        	 <table class="table table-striped">
        	 	<tr>
        	 		<td colspan="3"><b><?php echo $username." ".$lastname; ?></b></td>
        	 	</tr>
            <?php for($i=0;$i<count($search);$i=$i+2) { ?>
        	 	<tr>
        	 		<td><?php echo $search[$i]->username." ".$search[$i]->lastname; ?></td>
              <td>
                <?php
                  if($search[$i+1]==1)
                  {
                  ?>
                    <a href='<?php echo site_url('follow_info/unfollow/'.$search[$i]->user_id.'/'.$user_id.'/'.$post_search); ?>' class='btn btn-info'>Unfollow</a>
                  <?php
                  }
                  else
                  {
                  ?>
                     <a href='<?php echo site_url('follow_info/follow/'.$search[$i]->user_id.'/'.$user_id.'/'.$post_search); ?>' class='btn btn-info'>follow</a>
                  <?php
                  }
                ?>
              </td>
              <td></td>
        	 	</tr>
            <?php } ?>
        	 </table>  
        </div>
        </div>
        </div>
  </body>
</html>