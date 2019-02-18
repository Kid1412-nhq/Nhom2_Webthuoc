<?php
class BaseController{
	protected $folder;

	public function render($file, $data = array()){
		$view_file = 'views/'.$this->folder.'/'.$file.'.php';

		//Kiểm tra sự tồn tại của file đã có trong thư mục chưa
		if(is_file($view_file)){
			
			extract($data);
			
			ob_start();
			require $view_file;
			
			$content = ob_get_clean();

			require_once 'views/layouts/application.php';
		}else{
			header("location:index.php?controller=pages&action=error");
		}
	}
}