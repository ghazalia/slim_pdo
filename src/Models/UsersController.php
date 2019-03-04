<?php
namespace App\Models;

/*
 * users table id (autonumber), username, password
 */

class UsersController extends Mapper {

    public function getAllUsers() {
        $sql = 'Select * from `users`';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUser($id) {
        $sql = 'Select * from `users` where `id` = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

}