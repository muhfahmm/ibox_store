<?php
// admin/controllers/CategoryController.php
require_once __DIR__ . '/../models/CategoryModel.php';
require_once __DIR__ . '/../../core/Auth.php';
Auth::requireAdmin();

$model = new CategoryModel();

// very simple front-controller style using ?action=
$action = $_GET['action'] ?? 'index';

if ($action === 'index') {
    $categories = $model->all();
    require __DIR__ . '/../views/categories/list.php';
    exit;
}

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['category_name'] ?? '');
    $ok = $model->create($name);
    header('Location: /admin/controllers/CategoryController.php?action=index');
    exit;
}

if ($action === 'add') {
    require __DIR__ . '/../views/categories/add.php';
    exit;
}

if ($action === 'edit') {
    $id = intval($_GET['id'] ?? 0);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['category_name'] ?? '');
        $model->update($id, $name);
        header('Location: /admin/controllers/CategoryController.php?action=index');
        exit;
    }
    $cat = $model->find($id);
    require __DIR__ . '/../views/categories/edit.php';
    exit;
}

if ($action === 'delete') {
    $id = intval($_GET['id'] ?? 0);
    $model->delete($id);
    header('Location: /admin/controllers/CategoryController.php?action=index');
    exit;
}
