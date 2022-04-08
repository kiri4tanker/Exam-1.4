<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';

	class AppModel extends Model {
		/* == Заявка == */

		// Выбрать всё

		public function getAll() {
			return $this->db->query('select * from apps')->fetchAll();
		}

		// Выбрать Решенные заявки

		public function getApproved() {
			return $this->db->query('select * from apps where status = "Решена" order by id desc limit 4')->fetchAll();
		}

		// get field

		public function getField($field, $id) {
			$query = $this->db->prepare("select $field from apps where id = :id");
			$query->execute(['id' => $id]);

			return $query->fetchColumn();
		}

		// Добавить

		public function addApp($userId, $catId, $name, $text, $photo, $created) {
			return $this->db->prepare('insert into apps (user_id, cat_id, name, text, photo, created) values (:userId, :catId, :name, :text, :photo, :created)')->execute(['userId' => $userId, 'catId' => $catId, 'name' => $name, 'text' => $text, 'photo' => $photo, 'created' => $created]);
		}

		// Удалить

		public function delApp($id) {
			return $this->db->prepare('delete from apps where id = :id')->execute(['id' => $id]);
		}

		// Подтвердить

		public function approveApp($id, $photoAfter) {
			return $this->db->prepare('update apps set status = "Решена", photo_after = :photoAfter where id = :id')->execute(['id' => $id, 'photoAfter' => $photoAfter]);
		}

		// Отменить

		public function cancelApp($id, $reason) {
			return $this->db->prepare('update apps set status = "Отклонена", reason = :reason where id = :id')->execute(['id' => $id, 'reason' => $reason]);
		}

		// Статус Решена

		public function approvedCount() {
			return $this->db->query('select count(*) as counter from apps where status = "Решена"')->fetch();
		}

		/* == Категории == */

		// Выбрать всё

		public function getCats() {
			return $this->db->query('select * from app_cats')->fetchAll();
		}

		// Выбрать

		public function getCat($id) {
			$query = $this->db->prepare('select name from app_cats where id = :id');
			$query->execute(['id' => $id]);

			return $query->fetchColumn();
		}

		// Добавить

		public function addCat($name) {
			$query = $this->db->prepare('insert into app_cats (name) values (:name)');
			
			return $query->execute(['name' => $name]);
		}

		// Уадлить

		public function delCat($id) {
			return $this->db->prepare('delete from app_cats where id = :id')->execute(['id' => $id]);
		}
	}