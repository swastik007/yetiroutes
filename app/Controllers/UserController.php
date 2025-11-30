<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * List all users
     */
    public function index(): void
    {
        $this->requireAuth();

        $page = $_GET['page'] ?? 1;
        $users = $this->userModel->paginate(20, (int)$page);

        $this->view('admin.users.index', [
            'users' => $users,
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Show create user form
     */
    public function create(): void
    {
        $this->requireAuth();

        $this->view('admin.users.create', [
            'csrf_token' => $this->generateCsrf(),
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Store new user
     */
    public function store(): void
    {
        $this->requireAuth();

        $data = [
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'full_name' => $_POST['full_name'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'role_id' => $_POST['role_id'] ?? 1,
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        if ($this->userModel->createUser($data)) {
            $_SESSION['success'] = 'User created successfully!';
        } else {
            $_SESSION['error'] = 'Failed to create user';
        }

        $this->redirect('/admin/users');
    }

    /**
     * Delete user
     */
    public function delete(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;

        if ($this->userModel->delete((int)$id)) {
            $_SESSION['success'] = 'User deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete user';
        }

        $this->redirect('/admin/users');
    }
}
