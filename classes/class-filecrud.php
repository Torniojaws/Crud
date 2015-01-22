<?php

	class FileCrud {
		private $path;
		private $data;
		private $separator;
		
		public function __construct($path, $separator) {
			$this->path = $path;
			$this->separator = $separator;
			$this->data = file($this->path, FILE_IGNORE_NEW_LINES);
		}
		
		public function createRow($data) {
			$fp = fopen($this->path, 'a');
			fwrite($fp, $data);
			fclose($fp);
		}
		
		public function readRow($id) {
			foreach($this->data as $row) {
				list($index) = explode($this->separator, $row);
				if($index == $id) {
					$result = $row;
					break;
				}
			}
			return $result;
		}
		
		public function updateRow($id, $newData) {
			array_splice($this->data, $id, 1, $newData);
			file_put_contents($this->path, join("\n", $this->data));
		}
		
		public function deleteRow($id) {
			$toDelete = $this->readRow($id);
			$contents = file_get_contents($this->path);
			$contents = str_replace($toDelete, '', $contents);
			file_put_contents($this->path, $contents);
		}
	}
	
?>