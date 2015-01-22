<?php

	class Post {
		private $id;
		private $poster;
		private $message;
		private $tags;
		private $datePosted;
		private $separator;
	
		public function __construct($row, $separator) {
			$this->separator = $separator;
			list($id, $poster, $message, $tags) = explode($this->separator, $row);
			$this->id = $id;
			$this->poster = $poster;
			$this->message = $message;
			$this->tags = explode(',', $tags);
			$this->datePosted = date("Y-m-j", $this->id); // ID = Unix timestamp
		}

		public function display() {
			include('post.php');
		}
	}
	
?>