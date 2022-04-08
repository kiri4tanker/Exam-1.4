<?php
	function setupDatabase($db) {
		// Создание БД
	
		$db->query('create database if not exists wordskills_city');
		$db->query('use wordskills_city');

		// Таблица users

		$db->query('
			create table if not exists users (
				id int auto_increment primary key,
				name varchar(255),
				login varchar(255) unique,
				email varchar(255),
				password varchar(255),
				admin bit default 0
			)
		');

		// Таблица категорий

		$db->query('
			create table if not exists app_cats (
				id int auto_increment primary key,
				name varchar(255)
			)
		');

		// Таблица заявок

		$db->query("
			create table if not exists apps (
				id int auto_increment primary key,
				user_id int,
				cat_id int,
				name varchar(255),
				text varchar(255),
				status varchar(255) default 'Новая',
				reason varchar(255),
				photo longblob,
				photo_after longblob,
				created varchar(255),
				index (user_id),
				index (cat_id),
				foreign key (user_id) references users(id) on delete cascade on update cascade,
				foreign key (cat_id) references app_cats(id) on delete cascade on update cascade
			)
		");
	}
