<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Example</title>
</head>

<body>
<div class="col-sm-8 text-left">
<h1 align="center">C Form</h1>
<?php if (validation_errors()) : ?>
	<?php echo validation_errors() ; ?>
<?php endif; ?>

<?php echo form_open('mvc/contact', $form['attributes']) ; ?>

<table>
<tr>
<td><?php echo form_label($form['contact_name']['label']['text'], $form['contact_name']['label']['for']); ?></td> 
<td><?php echo form_input($form['contact_name']['field']); ?></td>
</tr>

<tr>
<td><?php echo form_label($form['contact_email']['label']['text'], $form['contact_email']['label']['for']); ?></td> 
<td><?php echo form_input($form['contact_email']['field']); ?></td>
</tr>

<tr>
<td><?php echo form_label($form['contact_message']['label']['text'], $form['contact_message']['label']['for']); ?></td> 
<td><?php echo form_textarea($form['contact_message']['field']); ?></td>
</tr>

<tr>
<td colspan="3"><?php echo form_submit('mysubmit', 'Send'); ?></td>
</tr>
 
</table>

<?php echo form_close() ; ?>
</div>
</body>
</html>