<?php
abstract class baseModel
{
    private static $instance=NULL;
    public $db;
    public function __construct()
    {
        $this->db=self::dbInstance();
    }
    /**
     * 
     * @global array $config
     * @return object database instance
     */
    public static function dbInstance()
    {
        global $config;
        
       if(self::$instance===NULL)
        {
            self::$instance = new PDO("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}", "{$config['db']['username']}", "{$config['db']['password']}", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$instance;
    }
    
    /**
     * Metoda za dobavljanje podataka
     * @param type $fields
     * @param type $filter
     * @return type
     */
    public function getAll($fields = "*", $filter = "") {

        try {
            $sql = "SELECT " . $fields . " FROM " . static::$table . " " . $filter;
            $res = $this->db->query($sql);
            return $res->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    /**
     * Dobavaljanje po id-u
     * @param int $id
     * @param string $fields
     * @return array
     */
    public function get($id, $fields="*") {
        try {
            $sql = "SELECT ".$fields." FROM " . static::$table . " WHERE " . static::$key . "='" . $id."'";
            
            $rez = $this->db->query($sql);
            return $row = $rez->fetchObject(get_called_class());
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function insert() {
        try {
            $q = "INSERT INTO " . static::$table . " ";
            //$q.= static::$table;
            $polja_arr = get_object_vars($this);
            unset($polja_arr['db']);
            $polja = array_keys($polja_arr);
            $q.= "(" . implode(",", $polja) . ") VALUES ";
            $q.= "('";
            $q.= implode("','", array_values($polja_arr));
            $q.="')";
            if ($this->db->exec($q) > 0) {
                return $this->db->lastInsertId();
            }else
                return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
   }
   
   public function update() {
       $keyString = static::$key;
       
       if(!isset($this->$keyString) || !is_int($this->$keyString) || empty($this->$keyString))
           throw new Exception('Primary is not set or not Integer or empty');
       
       try {
            $q = "UPDATE " . static::$table . " SET ";
            $polja_arr = get_object_vars($this);
            unset($polja_arr['db']);
            foreach ($polja_arr as $key => $value) {
                if ($key == static::$key)
                    continue;
                $q.= $key . "='" . $value . "',";
            }
            $q = rtrim($q, ",");
            
            $q.= " WHERE " . $keyString . " = " . $this->$keyString;
             if($this->db->exec($q) > 0){
               return true;   
             }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete($id){
        try {
            $query = "DELETE from " . static::$table . " WHERE " . static::$key . "='{$id}'";
            return $this->db->exec($query);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
  /**
     * 
     * @return boolean
     */
    public function join() {
        $fields = isset($this->select) ? $this->select : "*";
        $join_table = $this->join;
        
        $query = "SELECT " . $fields . " FROM " . static::$table;
        foreach($join_table as $table){
            $join = (array_key_exists("join",$table)) ? $table['join'] : "INNER";
            $query .=" ".$join." JOIN " . $table['table'] . " ON " . $table['realtion'];
          }
          
        if (isset($this->where))
            $query .= " WHERE " . $this->where;
        if (isset($this->orderBy))
             $query .= " ORDER BY " . $this->orderBy;
        if (isset($this->limit))
            $query .= " LIMIT " . $this->limit;
       
        try {
            $res = $this->db->query($query);
            $datas = $res->fetchAll(PDO::FETCH_CLASS, "stdClass");
            foreach ($datas as $data) {
                unset($data->db);
            }
          return $datas;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
