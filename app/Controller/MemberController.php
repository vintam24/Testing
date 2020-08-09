<?php
	class MemberController extends AppController{
		
		public function q1(){
			
			$this->setFlash('Question: Migration of data to multiple DB table');
			
			$this->loadModel('Transaction');
			$transactions = $this->Transaction->find('all',array('conditions'=>array('Transaction.valid'=>1),'recursive'=>2));
			// debug($transactions);exit;
			
			$this->loadModel('TransactionItem');
			$transactionitems = $this->TransactionItem->find('all',array('conditions'=>array('TransactionItem.valid'=>1),'recursive'=>2));
			// debug($transactionitems);exit;
			
			$members = $this->Member->find('all');
			$this->set(compact('members'));
			$this->set(compact('transactions'));
			$this->set(compact('transactionitems'));
			
			if($this->request->is('post')){
				App::import('Lib', 'excel_reader2');
				App::uses('SpreadsheetReader', 'Lib/spreadsheet-reader-master');
				$file = fopen($this->request->data['Member']['file']['tmp_name'], "r");
				$reader = new SpreadsheetReader($this->request->data['Member']['file']['tmp_name']);
				debug($reader);
				exit;
				// $path = pathinfo($this->request->data['Member']['file']['name']);
				// if($path['extension'] !== 'xlsx'||$path['extension'] !== 'xls'){
				// 	$this->setFlash('File not supported, only Excel file.');
				// }else{
				// 	$file2 = file($this->request->data['Member']['file']['tmp_name']);
				// 	fclose($file);
				// 	$ar = [];
				// 	$a2= [];
				// 	foreach($file2 as $key=>$row){
				// 		if($row !== 'Nama' || $row !== 'Email'){
				// 			if(!strpos($row, 'Email ')|| !strpos($row, ' Email')){
				// 				$ar = explode(",",$row);
				// 				$a2[$key]['Member']['name'] = $ar[0];
				// 				$a2[$key]['Member']['email'] = $ar[1];
				// 			}
				// 		}
				// 	}
				// 	if($this->FileUpload->saveMany($a2)){
				// 		$this->setFlash('File successfully uploaded');
				// 		$this->redirect(array('action'=>'index'));
				// 	}
				// }
			}
				
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
	}