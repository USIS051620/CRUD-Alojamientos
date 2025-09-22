<?php
require_once BASE_PATH . '/core/Model.php';
class Alojamiento extends Model {
    public function getAll() {
        $res = $this->db->query("SELECT id,title,description,price,image FROM alojamientos ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id) {
        $stmt = $this->db->prepare("SELECT id,title,description,price,image FROM alojamientos WHERE id=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function create($title,$description,$price,$image=null) {
        $stmt = $this->db->prepare("INSERT INTO alojamientos (title,description,price,image) VALUES (?,?,?,?)");
        $stmt->bind_param('ssds',$title,$description,$price,$image);
        return $stmt->execute();
    }
    public function update($id,$title,$description,$price,$image=null) {
        $stmt = $this->db->prepare("UPDATE alojamientos SET title=?,description=?,price=?,image=? WHERE id=?");
        $stmt->bind_param('ssdsi',$title,$description,$price,$image,$id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM alojamientos WHERE id=?");
        $stmt->bind_param('i',$id);
        return $stmt->execute();
    }
}
