<html lang="en">
<head>
<title><?php echo $this->lang->line('title')?></title>

<link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">

<script src="<?php echo base_url("js/jquery-1.9.1.min.js");?>"></script>
<script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>

</head>

 <body> 
 <div class='container'>
<div class='row'>
<div class='span4 offset4'>
	<?php if ($this->session->flashdata('err_message')) {?>
  <div class="alert alert-error"><?php echo $this->session->flashdata('err_message')?></div>
 <?php }?>

 <?php if ($this->session->flashdata('succ_message')) {?>
  <div class="alert alert-info"><?php echo $this->session->flashdata('succ_message')?></div>
 <?php }?>
 <?php echo form_open('login_cnt/check',array('class' => 'well')); ?>
  
	<table align="center">
	   <tr>
		 <td colspan="2" align="center"><label><b><?php echo $this->lang->line('twitter_login')?></b></label></td>
	   </tr>
	   <tr>
		 <td><label><b><?php echo $this->lang->line('e_mail')?>:</b></label></td>
		 <td><input type="text" name="mail" title="E-Mail Address" placeholder="E-Mail Address"/></td>
	   </tr>
	   <tr>
		 <td><label><b><?php echo $this->lang->line('password')?>:</b></label></td>
		 <td><input type="password" name="pass" title="Password"  placeholder="Password"/></td>
	   </tr>
	   <tr>
		 <td align="center" colspan="2"><button type="submit" name="send" class="btn btn-primary"><?php echo $this->lang->line('Sign_in')?></button></td>
	   </tr>
	</table>
  </form>
</div>
</div>
</div>
  
  <div >

  <form method="post" action="login_cnt/sign_up" >
	<table align="center">
	   <tr>
		 <td colspan="2" align="center"><label><b><?php echo $this->lang->line('Twitter-Sign_up')?></b></label></td>
	   </tr>
	   <tr>
	     <td><label><b><?php echo $this->lang->line('namesurname')?>:</b></label></td>
		 <td><input type="text" name="namesurname" placeholder="<?php echo $this->lang->line('namesurname'); ?>"/></td>
	   </tr>
	   <tr>
		 <td><label><b><?php echo $this->lang->line('e_mail_address')?>:</b></label></td>
		 <td><input type="text" name="mail" title="E-Mail Address"  placeholder="E-Mail Address"/></td>
	   </tr>
	   <tr>
		 <td><label><b><?php echo $this->lang->line('pass')?>:</b></label></td>
		 <td><input type="password" name="pass" title="Password"  placeholder="Password"/></td>
	   </tr>
	   <tr>
		 <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-primary"><?php echo $this->lang->line('Sign_up')?></button></td>
	   </tr>
	</table>
  </form>
  </div>
 </body>
</html>