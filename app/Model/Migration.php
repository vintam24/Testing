<?php
	class Migration extends AppModel{
		
		var $belongsTo = array('Member','Transaction', 'TransactionItem');

	}