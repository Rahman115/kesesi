<?php

class Model {

    public $db;
    protected $tableName;

    public function __construct() {
        $this->db = new Database();
    }

    public function model($modelName) {
        require_once ROOT . DS . 'modules' . DS . 'models' . DS . $modelName . 'Model.php';
        $className = ucfirst($modelName) . 'Model';
        $this->$modelName = new $className();
    }

    public function get($params = "") {

        $sql = "SELECT*FROM " . $this->tableName;

        if (is_array($params)) {
            if (isset($params["limit"])) {

                $sql .= " LIMIT " . $params["limit"];
            }
        }

        $this->db->query($sql);

        return $this->db->execute()->toObject();
    }
    
    public function query ($param = "") {
        
        $this->db->query($param);

        return $this->db->execute()->toObject();
    }

    public function rows() {
        return $this->db->getAll($this->tableName)->numRows();
    }

    public function getWhere($params) {

        return $this->db->getWhere($this->tableName, $params)->toObject();
    }

    public function delete($where = array()) {

        return $this->db->delete($this->tableName, $where);
    }

    public function getJoin($tableJoin, $params, $join = "JOIN", $where = "", $like = "") {



        $sql = "SELECT*FROM " . $this->tableName;

        if (is_array($tableJoin)) {

            foreach ($tableJoin as $table) {

                $sql .= " " . $join . " " . $table . " ";
            }
        } else {
            $sql .= " " . $join . " " . $tableJoin . " ";
        }

        if ($params && is_array($params)) {
            $sql .= " ON ";
            $j = 0;

            foreach ($params as $key => $value) {

                $sql .=" " . $key . " = " . $value . " ";
                $j++;
                if ($j < count($params)) {
                    $sql .= " AND ";
                }
            }
        }


        if ($where && is_array($where)) {

            $sql .= " WHERE ";
            $i = 0;

            foreach ($where as $key => $value) {

                $sql .= " " . $key . "='" . $value . "' ";

                $i++;
                if ($i < count($where)) {

                    $sql .=" AND ";
                }
            }
        }
        
        if ($like && is_array($like)) {

            $sql .= " WHERE ";
            $i = 0;

            foreach ($like as $key => $value) {

                $sql .= " " . $key . " LIKE '%" . $value . "%' ";

                $i++;
                if ($i < count($like)) {

                    $sql .=" AND ";
                }
            }
        }
        
//        var_dump($sql);
        
        $this->db->query($sql);

        return $this->db->execute()->toObject();
    }

    public function insert($data = array()) {

        $insert = $this->db->insert($this->tableName, $data);

        if ($insert) {
            return true;
        }

        return false;
    }

    public function update($data = array(), $where = array()) {

        $update = $this->db->update($this->tableName, $data, $where);

        if ($update) {
            return true;
        }

        return false;
    }

}

?>