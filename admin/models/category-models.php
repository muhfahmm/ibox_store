<?php
// admin/models/CategoryModel.php
require_once __DIR__ . '/../../db/db.php';

class CategoryModel {
    protected $db;
    public function __construct() {
        $this->db = getConnection();
    }
    public function all() {
        $res = $this->db->query("SELECT * FROM tb_admin_category ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_admin_category WHERE id = ? LIMIT 1");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $r = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $r;
    }
    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO tb_admin_category (category_name) VALUES (?)");
        $stmt->bind_param('s', $name);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
    public function update($id, $name) {
        $stmt = $this->db->prepare("UPDATE tb_admin_category SET category_name = ? WHERE id = ?");
        $stmt->bind_param('si', $name, $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tb_admin_category WHERE id = ?");
        $stmt->bind_param('i', $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
    public function __destruct() {
        $this->db->close();
    }
}
