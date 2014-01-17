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
            <?php for($i=0;$i<count($list);$i=$i+1) { ?>
        	 	<tr>
        	 		<td><?php echo $list[$i]->username." ".$list[$i]->lastname; ?></td>
              <td>
                  <a href='<?php echo site_url('follow_info/unfollow/'.$list[$i]->user_id.'/'.$user_id.'/'.$post_search); ?>' class='btn btn-info'>Unfollow</a>
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