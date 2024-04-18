<?php
class Category{
    private $conn;
    private $table_name = "categories";
    public $id;
    public $name;
    public function __construct($db){
        $this->conn = $db;
    }
    public function read(){
        $query = "SELECT * FROM `categories` ORDER by `name`";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function readName(){
        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
    }
    public function getAllOrdered()
    {
        $query = "SELECT id, name FROM " . $this->table_name . " ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function create($name)
    {
    $query = "INSERT INTO " . $this->table_name . " (name, created) VALUES (:name, :created)";
    $timestamp = date('Y-m-d H:i:s');
    $stmt = $this->conn->prepare($query);
    return $stmt->execute(['name' => $name, 'created' => $timestamp]);
    }

  public function delete($id)
  {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = " . $id;
    $stmt = $this->conn->query($query);
    return $stmt->execute();
  }

  public function update($id, $name)
  {
    $query = "UPDATE " . $this->table_name . " SET name = :name WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute(['id' => $id, 'name' => $name]);
  }
  public function getById($id)
  {
    $sql = "SELECT * FROM " . $this->table_name . " WHERE id = " . $id;
    $stmt = $this->PDO->query($sql);
    $stmt->execute();
    return $stmt->fetch()['name'];
  }
}