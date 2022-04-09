<?php
	function fillDatabase($db) {
		$db->query('insert ignore into users (id, name, login, email, password, admin) values (1, "Админ", "admin", "admin@admin.admin", "adminWSR", 1)');
		$db->query('insert ignore into app_cats (id, name) values (1, "Разное")');
	}