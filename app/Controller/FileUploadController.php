<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
		if($this->request->is('post')){
			$file = fopen($this->request->data['FileUpload']['file']['tmp_name'], "r");
			$path = pathinfo($this->request->data['FileUpload']['file']['name']);
			if($path['extension'] !== 'csv'){
				$this->setFlash('File not supported, only CSV file.');
			}else{
				$file2 = file($this->request->data['FileUpload']['file']['tmp_name']);
				fclose($file);
				$ar = [];
				$a2= [];
				foreach($file2 as $key=>$row){
					if($row !== 'Nama' || $row !== 'Email'){
						if(!strpos($row, 'Email ')|| !strpos($row, ' Email')){
							$ar = explode(",",$row);
							$a2[$key]['FileUpload']['name'] = $ar[0];
							$a2[$key]['FileUpload']['email'] = $ar[1];
						}
					}
				}
				if($this->FileUpload->saveMany($a2)){
					$this->setFlash('File successfully uploaded');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
	}
}