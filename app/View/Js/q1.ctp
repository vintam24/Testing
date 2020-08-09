<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table id="tab_id" class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody id="table_body">
	<tr style="height: 30px">
		<td></td>
		<td class="txt editMe">
			<!-- <textarea name="data[1][description]" class="m-wrap txt description required" rows="2"></textarea> -->
		</td>
		<td class="qty editMe2">
			<!-- <input name="data[1][quantity]" class="qty"> -->
		</td>
		<td class="prc editMe3">
			<!-- <input name="data[1][unit_price]"  class="prc"> -->
		</td>
	</tr>

</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://raw.githack.com/unwild/SimpleTableCellEditor/master/SimpleTableCellEditor.es6.min.js"></script>
<script>
	var val = 1;
	$("#add_item_button").click(function(){
		val++;
		$("#table_body").append(`
		<tr style="height: 30px">
			<td></td>
			<td class="txt editMe">
			</td>
			<td class="qty editMe2">
			</td>
			<td class="prc editMe3">
			</td>
		</tr>
		`);
		

	});
	var simpleEditor = new SimpleTableCellEditor("tab_id");
	simpleEditor.SetEditableClass("editMe", {
		internals: {
			renderEditor: (elem, oldVal) => {
				$(elem).html(`<textarea id="txt`+val+`" name="data[`+val+`][description]" class="m-wrap editMe txt description required" rows="2">`+oldVal+`</textarea>`);

				$("textarea option").filter(function () {
					return $(this).val() == oldVal;
				}).prop('selected', true);
			
			},
			extractEditorValue: (elem) => { return $(elem).find('textarea').val(); },
		}
	});
	simpleEditor.SetEditableClass("editMe2", {
		internals: {
			renderEditor: (elem, oldVal) => {
				$(elem).html(`<input id="qty'+val+'" name="data[`+val+`][quantity]" class="editMe2" value="`+oldVal+`"></input>`);
			},
		}
	});
	simpleEditor.SetEditableClass("editMe3", {
		internals: {
			renderEditor: (elem, oldVal) => {
				$(elem).html(`<input id="qty`+val+`" name="data[`+val+`][quantity]" class="editMe3" value="`+oldVal+`"></input>`);
			
			},
		}
	});

	$('#simpleEditableTable').on("cell:edited", function (event) {
		console.log(`'${event.oldValue}' changed to '${event.newValue}'`);
	});
$(document).ready(function(){

});
</script>
<?php $this->end();?>

