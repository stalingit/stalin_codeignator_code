<a href="<?php echo base_url();?>">
<img src="<?php echo base_url();?>assets/img/logo.jpg" border="0"/>
</a>

<div id='globalnav'>
<ul>
<?php
if ($this->uri->segment(2) != "index"){
	echo "<li>".anchor("welcomepage/index","home")."</li>";
}
?>
<li><?php echo anchor("welcomepage/pages/about_us","about us");?></li>
<li><?php echo anchor("welcomepage/pages/contact", "contact");?></li>
<?php 
if (isset($_SESSION['cart']) && count($_SESSION['cart'])){
	echo "<li>". anchor("welcomepage/cart", "view cart") . "</li>";
}
?>

<li>

<?php 
echo form_open("welcomepage/search");
$data = array(
  "name" => "term",
  "id" => "term",
  "maxlength" => "64",
  "size" => "15"
);
echo form_input($data);
echo form_submit("submit","search");
echo form_close();
?>
</li>
</ul>
</div>

