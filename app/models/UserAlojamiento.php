<?php
require_once BASE_PATH . '/core/Model.php';
class UserAlojamiento extends Model {
    public function add($user_id,$aloj_id) {
        $stmt = $this->db->prepare("SELECT id FROM user_alojamientos WHERE user_id=? AND alojamiento_id=? LIMIT 1");
        $stmt->bind_param('ii',$user_id,$aloj_id);
        $stmt->execute();
        $r = $stmt->get_result();
        if ($r && $r->fetch_assoc()) return false;
        $stmt = $this->db->prepare("INSERT INTO user_alojamientos (user_id,alojamiento_id) VALUES (?,?)");
        $stmt->bind_param('ii',$user_id,$aloj_id);
        return $stmt->execute();
    }
    public function remove($user_id,$aloj_id) {
        $stmt = $this->db->prepare("DELETE FROM user_alojamientos WHERE user_id=? AND alojamiento_id=?");
        $stmt->bind_param('ii',$user_id,$aloj_id);
        return $stmt->execute();
    }
    public function getByUser($user_id) {
        $stmt = $this->db->prepare("SELECT a.id,a.title,a.description,a.price,a.image FROM alojamientos a JOIN user_alojamientos ua ON a.id=ua.alojamiento_id WHERE ua.user_id=?");
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
