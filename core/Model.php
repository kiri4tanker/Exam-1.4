<?php
	class Model {
		protected $db;

		public function __construct() {
			require $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';
			$this->db = $db;
		}

		public function redirect($path) {
			header("Location: /$path");
		}
	}