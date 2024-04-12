<?php

class UserModel extends BaseModel
{
    const TABLE = 'users';

    // ---CÁC PHƯƠNG THỨC CƠ BẢN--- 
    public function mAlls($select = ['*'])
    {
        return $this->bmAlls(self::TABLE, $select);
    }
    public function mFind($id)
    {
        return $this->bmFind(self::TABLE, $id);
    }
    public function mUpdate($id, $data)
    {
        return $this->bmUpdate(self::TABLE, $id, $data);
    }
    public function mDelete($id)
    {
        return $this->bmDelete(self::TABLE, $id);
    }

    // ---CÁC PHƯƠNG THỨC BỔ SUNG---
    // Phương thức để thiết lập mật khẩu
    private function setPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    // Phương thức để kiểm tra mật khẩu
    public function checkPassword($pass, $decodePass)
    {
        return password_verify($pass, $decodePass);
    }

    // thêm tài khoản mới 
    public function mInsert($data)
    {
        $data['pass'] = $this->setPassword($data['pass']);
        return $this->bmInsert(self::TABLE, $data);
    }

    // cập nhật thông tin User 
    public function updateU($data)
    {
        $id = $_COOKIE['user_id'];
        $user = [
            'user' => $data['user'],
            'pass' => $data['currentpass']
        ];
        if (!$this->isValidUser($user)) return False;
        $data['pass'] = $this->setPassword($data['newpass']);

        $user = [
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'user'  =>  $data['user'],
            'pass'  =>  $data['pass']
        ];

        $this->bmUpdate(self::TABLE, $id, $user);
        return True;
    }

    // Phương thức để kiểm tra vai trò của người dùng
    public function checkUserRole()
    {
        $user = $this->mFind($_COOKIE['user_id']);

        return $user;
    }

    // Kiểm tra username tồn tại hay chưa
    public function checkuser_name($user)
    {
        $sql = "SELECT `user` FROM `users` WHERE user = '$user'";
        $check = mysqli_fetch_assoc($this->_query($sql));
        return (isset($check) ? False : True);
    }

    // Kiểm tra tính hợp lệ tài khoản
    public function isValidUser($data)
    {
        $user = $data['user'];
        $pass = $data['pass'];

        $table = self::TABLE;
        $sql = "SELECT * FROM `$table` WHERE user = '$user' LIMIT 1";
        $user = mysqli_fetch_assoc($this->_query($sql));
        if (!isset($user)) return False;
        if (!$this->checkPassword($pass, $user['pass'])) return False;

        setcookie("user_id", $user['id'], time() + 3600, "/");
        return True;
    }
}
