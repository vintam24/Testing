<?php
	class FormatController extends AppController{
		
		public function q1(){
			
			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
			if($this->request->is('POST')){
				// $this->setFlash('success');
				$this->Session->write('val', $this->request->data['Type']['type']);
				var_dump($this->request_data);
				$this->redirect(array('action'=>'q1_save'));
			}
				
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}

		public function q1_save(){
			$val = $this->Session->read('val');
			$this->set('val',$val);
			$this->setFlash($val);
		}
		
		public function q1_detail(){

			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
	}