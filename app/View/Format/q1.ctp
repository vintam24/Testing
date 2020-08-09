
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new = array(
 		'Type1' => __('<span class="showDialog" data-id="dialog_1" style="color:blue" data-toggle="tooltip">Type1</span><div id="dialog_1" title="Type 1" style="display:none;">
 				<span style="display:inline-block"><ul><li>Description .......</li>
 				<li>Description 2</li></ul></span>
 				</div>'),
		'Type2' => __('<span class="showDialog" data-id="dialog_2" style="color:blue" data-toggle="tooltip2">Type2</span><div id="dialog_2" title="Type 2" style="display:none;">
 				<span style="display:inline-block"><ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul></span>
 				</div>')
		);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>

<?php echo $this->Form->submit(); ?>

<?php echo $this->Form->end();?>

</div>

<style>
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}
.showDialog + .tooltip > .tooltip-inner {
	background-color: #FFFFFF; 
	color: #000000; 
	border: 1px solid; 
}
.test + .tooltip.right > .tooltip-arrow {
	border-right: 5px solid white;
}
</style>

<?php $this->start('script_own')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip({
		title:`<div id="dialog_1" title="Type 1" style="display:none;">
 				<span style="display:inline-block"><ul><li>Description .......</li>
 				<li>Description 2</li></ul></span>
 				</div>`,
		html: true,
		placement: "right",
	});  
	$('[data-toggle="tooltip2"]').tooltip({
		title:`<div id="dialog_2" title="Type 2" style="display:none;">
 				<span style="display:inline-block"><ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul></span>
 				</div>`,
		html: true,
		placement: "right",
	});  

})


</script>
<?php $this->end()?>