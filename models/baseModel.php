<?php
/**
 * 
 */
abstract class baseModel
{
    /**
     *
     * @var type 
     */
    private static $instance=NULL;
    
    /**
     *
     * @var type 
     */
    public $db;
    
    /**
     * WHERE clause 
     * Example "id=1"
     * @var string 
     */
    protected $where;
    
    /**
     * GROUP BY clause
     * @var string 
     */
    protected $groupBy;
    /**
     *ORDER BY clause
     * @var string 
     */
    protected $orderBy;
    
    /**
     * ASC or DESC
     * @var string 
     */
    protected $order;
    
    /**
     * LIMIT clause
     * @var int 
     */
    protected $limit;
    
    /**
     * OFFSET clause
     * @var int 
     */
    protected $offset;
    
    /**
     * array with table name and relation <br>
     * Example:<br>  $this->join = array( <br>
            array("table"=>"images","relation"=>"products.ID = images.product_id")<br>
        );
     * @var array 
     */
    protected $join;
    
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
     * get records from database 
     * @param string $fields fileds wrapper by comma  id,name...
     * @param string $filter
     * @return array On success return array of records
     */
    public function getAll($fields = "*", $filter = "") {
        
        $query = "SELECT " . $fields . " FROM " . static::$table;
        
        if($filter != '')
            $query .= " " . $filter;
        
        if(isset($this->where))
            $query .= " WHERE " . $this->where;
        
        if(isset($this->groupBy))
            $query .=" GROUP BY " . $this->groupBy;
        
        if (isset($this->orderBy))
             $query .= " ORDER BY " . $this->orderBy;
        
        if(isset($this->order)) 
            $query .= " " . $this->order . " ";
        
        if (isset($this->limit))
            $query .= " LIMIT " . $this->limit;
        
        if (isset($this->offset))
             $query .= " OFFSET " . $this->offset;
        
        try {
            $res = $this->db->query($query);
            $data =  $res->fetchAll(PDO::FETCH_CLASS, get_called_class());
            foreach($data as $record){
                unset($record->db);
            }
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    /**
     * Get records by primary key
     * @param int $id Prymary key
     * @param string $fields table fileds
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
    
    /**
     * Get last record from table
     * @return boolean Return object on success otherwise return false
     */
    public function last(){
        $this->orderBy = static::$key;
        $this->order = "DESC";
        $this->limit = 1;
        $data = $this->getAll("*");
        if(!empty($data))
            return $data[0];
        else
            return false;
    }
    /**
     * Insert record to database
     * @return boolean Return last insert id on succes or false on failed
     */
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
   
   /**
    * Update record to database
    * @return boolean
    * @throws Exception
    */
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
    
    /**
     * Delete record form table by primary key
     * @param int $id
     * @return boolean
     */
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
     * Join tables
     * @return boolean
     */
    public function join() {
        $fields = isset($this->select) ? $this->select : "*";
        $join_table = $this->join;
        
        $query = "SELECT " . $fields . " FROM " . static::$table;
        
        foreach($join_table as $table){
            $join = (array_key_exists("join",$table)) ? $table['join'] : "INNER";
            $query .=" ".$join." JOIN " . $table['table'] . " ON " . $table['relation'];
          }
          
        if (isset($this->where))
            $query .= " WHERE " . $this->where;
        
        if(isset($this->groupBy))
            $query .=" GROUP BY " . $this->groupBy;
        
        if (isset($this->orderBy))
             $query .= " ORDER BY " . $this->orderBy;
        
        if (isset($this->order))
             $query .= " " . $this->order . " ";          
            
        if (isset($this->limit))
            $query .= " LIMIT " . $this->limit;
        
        if (isset($this->offset))
             $query .= " OFFSET " . $this->offset;
        
         try {
            $res = $this->db->query($query);
            $data = $res->fetchAll(PDO::FETCH_CLASS, "stdClass");
            foreach ($data as $record) {
                unset($record->db);
        }
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
