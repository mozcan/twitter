<html lang="en">
<head>
<title><?php echo $this->lang->line('title')?></title>

<link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">
<link href="<?php echo base_url("css/deneme.css");?>" rel="stylesheet">

<script src="<?php echo base_url("js/jquery-1.9.1.min.js");?>"></script>
<script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>

</head>

 <body> 
 <div class='header'>
 	<div class='bird'><img src='<?php echo base_url('img/twitter_bird.png'); ?>' /></div>
 </div>

 <?php echo form_open('login_cnt/check',array('class' => 'well')); ?>

<div class="container">
	<div class="row">
        <div class="span12">



 <?php if ($this->session->flashdata('err_message')) {?>
  	<div class="alert alert-error"><?php echo $this->session->flashdata('err_message')?></div>
 <?php }?>

 <?php if ($this->session->flashdata('succ_message')) {?>
  	<div class="alert alert-info"><?php echo $this->session->flashdata('succ_message')?></div>
 <?php }?>
        
    		<div class="" id="loginModal">
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab"><?php echo $this->lang->line('twitter_login')?></a></li>
                    <li><a href="#create" data-toggle="tab">Create Account</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                       <?php echo form_open('login_cnt/check',array('class' => 'well')); ?>
                        <fieldset>
                          <div id="legend">
                            <legend class=""><?php echo $this->lang->line('twitter_login')?></legend>
                          </div>    
                          <div class="control-group">
                            <!-- Email -->
                            <label class="control-label"><b><?php echo $this->lang->line('e_mail')?>:</b></label>
                            <div class="controls">
                              <input type="text" name="mail" title="E-Mail Address" placeholder="E-Mail Address" class="input-xlarge"/>
                            </div>
                          </div>
     
                          <div class="control-group">
                            <!-- Password-->
                            <label class="control-label"><b><?php echo $this->lang->line('password')?>:</b></label>
                            <div class="controls">
                              <input type="password" name="pass" title="Password"  placeholder="Password" class="input-xlarge" />
                            </div>
                          </div>
                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button type='submit' class="btn btn-success"><?php echo $this->lang->line('Sign_up')?></button>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
                    <div class="tab-pane fade" id="create">
                   		 <div id="legend">
                            <legend class="">Create Account</legend>
                         </div>
                      <?php echo form_open('login_cnt/sign_up',array('class' => 'well', 'id' => 'tab')); ?>
                      <div class="control-group">
                        <label class="control-label"><b><?php echo $this->lang->line('namesurname')?>:</b></label>
                        <div class="controls">
                       		<input type="text" name="namesurname" placeholder="<?php echo $this->lang->line('namesurname'); ?>"/>
                       	</div>
                      </div>
                      <div class="control-group">
                        <label class="control-label"><b><?php echo $this->lang->line('e_mail_address')?>:</b></label>
                        <div class="controls">
                       		<input type="text" name="mail" title="E-Mail Address"  placeholder="E-Mail Address"/>
                       	</div>
                      </div>
                      <div class="control-group">
                        <label class="control-label"><b><?php echo $this->lang->line('pass')?>:</b></label>
                        <div class="controls">
                        	<input type="password" name="pass" title="Password"  placeholder="Password"/>
                        </div>
                      </div>
                        <div>
                          <button class="btn btn-primary">Create Account</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>

 </body>
</html>