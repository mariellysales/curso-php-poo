<?php

class User extends Conn
{
    public object $conn;
    public array $formData;
    public int $id;

    public function list(): array
    {
        $this->conn = $this->connectDb();
        $query_users = "SELECT id, nome, email FROM users ORDER BY id DESC LIMIT 40";
        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        //var_dump($retorno);
        return ($retorno);
    }

    public function create()
    {
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO users (nome, email, created) VALUES (:nome, :email, NOW())";
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':nome', $this->formData['nome']);
        $add_user->bindParam(':email', $this->formData['email']);
        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function view()
    {
        $this->conn = $this->connectDb();
        $query_user = "SELECT id, nome, email, created, modified FROM users WHERE id =:id LIMIT 1";
        $result_user = $this->conn->prepare($query_user);
        $result_user->bindParam(':id', $this->id);
        $result_user->execute();
        $value = $result_user->fetch();
        return $value;
    }
    public function edit()
    {
        var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_user = "UPDATE users SET nome=:nome, email=:email, modified=NOW() WHERE id=:id";
        $edit_user = $this->conn->prepare($query_user);
        $edit_user->bindParam(':nome', $this->formData['nome']);
        $edit_user->bindParam(':email', $this->formData['email']);
        $edit_user->bindParam(':id', $this->formData['id']);
        $edit_user->execute();

        if ($edit_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $this->conn = $this->connectDb();
        $query_user = "DELETE FROM users WHERE id=:id";
        $delete_user = $this->conn->prepare($query_user);
        $delete_user->bindParam(':id', $this->id);
        if ($delete_user->execute()) {
            return true;
        }
        return false;
    }
}
