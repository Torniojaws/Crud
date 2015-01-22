<?php
	include('classes/class-post.php');

	class Bulletin {
		private $datafile;
		private $separator;
		private $posts;
		
		public function __construct($datafile, $separator) {
			$this->datafile = $datafile;
			$this->separator = $separator;
			$this->posts = $this->generatePostList();
		}
		
		public function display() {
			foreach($this->posts as $post) {
				$post->display();
			}
		}
		
		private function generatePostList() {
			$rows = file($this->datafile);
			foreach($rows as $row) {
				$array[] = new Post($row, $this->separator);
			}
			return $array;
		}
	}
	
?>