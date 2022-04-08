<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';

	class UserModel extends Model {

		// Начало сессии

		public function __construct() {
			parent::__construct();
			session_start();
		}

		// Регистрация

		public function register($name, $login, $email, $password) {
			$this->db->prepare('insert into users (name, login, email, password) values (:name, :login, :email, :password)')->execute(['name' => $name, 'login' => $login, 'email' => $email, 'password' => $password]);

			return $this->redirect('login.php');
		}

		// Логин

		public function login($login, $password) {
			$query = $this->db->prepare("select * from users where login = :login and password = :password");
			$query->execute(['login' => $login, 'password' => $password]);

			$user = $query->fetch();

			if ($user) {
				$_SESSION['user'] = $user;

				if ($this->isAdmin()) return $this->redirect('admin.php');
				if (!$this->isAdmin()) return $this->redirect('profile.php');
			}

			return false;
		}

		// Выход

		public function logout() {
			unset($_SESSION['user']);

			return $this->redirect('index.php');
		}

		// Если авторизован

		public function isLogged() {
			if (!empty($_SESSION['user'])) {
				return true;
			}

			return false;
		}

		// Админ

		public function isAdmin() {
			if ($this->isLogged() && !empty($_SESSION['user']['admin'])) {
				return true;
			}

			return false;
		}

		// Уникальный логин

		public function isLoginUnique($login) {
			$query = $this->db->prepare('select count(login) from users where login = :login');
			$query->execute(['login' => $login]);

			$count = $query->fetchColumn();

			return $count > 0 ? false : true; 
		}

		// get field

		public function get($field) {
			$userId = $_SESSION['user']['id'];

			$query = $this->db->prepare("select $field from users where id = :id");
			$query->execute(['id' => $userId]);

			return $query->fetchColumn();
		}

		// Добавление заявки

		public function getApps() {
			$userId = $_SESSION['user']['id'];

			$query = $this->db->prepare('select * from apps where user_id = :id');
			$query->execute(['id' => $userId]);

			return $query->fetchAll();
		}

		// Выбрать все по статусу

		public function getAppsWithStatus($status) {
			$userId = $_SESSION['user']['id'];

			$query = $this->db->prepare("select * from apps where user_id = :id and status = :status");
			$query->execute(['id' => $userId, 'status' => $status]);

			return $query->fetchAll();
		}
	}