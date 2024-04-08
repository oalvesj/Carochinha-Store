<?php

namespace DB;

use Throwable;

class Connection 
{
    public $db = null;

    public function __construct() 
    {
        try {
            $this->db = mysqli_connect('localhost', 'root', 'Simoni01@', 'teste_osni');
        } catch (Throwable $e) 
        {
            die('Não consegui conectar ao banco de dados'.$e->getMessage());
        }
    }

    public function query(string $queryString) 
    {
        return $this->db->query($queryString);
    }

    public function insert(string $table, array $data) 
    {
        $columns_array = array_keys($data);
        $columns_string = implode(", ", $columns_array); 
        $values = array_values($data);

        $values_str = rtrim(str_repeat('?, ', count($columns_array)), ', ');
        
        $stmt = $this->db->prepare("INSERT INTO {$table} ({$columns_string}) VALUES ({$values_str})");

        $types = '';

        foreach ($values as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } else if (is_string($value)) {
                $types .= 's';
            } else {
                $types .= 's';
            }
        }

        $stmt->bind_param($types, ...$values);
        return $stmt->execute();
    }
}