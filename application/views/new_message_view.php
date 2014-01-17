<html>

  <body>
  	<?php $this->load->view("header_view")	?>
     
      <div class="row-fluid">
        <div class="span4">
        	<div class="well sidebar-nav">
        	 <?php echo form_open("message_cnt/message_insert",array('class' => 'well','name' => 'myform'));  ?> 
           <label>To : 
           <select>
            <option value="0">--Choose--</option>
              <?php
                foreach($list as $lists)
                {
              ?>
                <option value="<?php echo $lists->user_id; ?>"><?php echo $lists->username." ".$lists->lastname; ?></option>
              <?php
                }
              ?>
           </select>
          </label>
          <label>
            About : <input type="text" placeholder="About">
          </label>
          <label>
            Message : 
          </label>
            <textarea rows="10" ></textarea><br>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
        </div>
        </div>
  </body>
</html>
