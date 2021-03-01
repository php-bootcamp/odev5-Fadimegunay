<?php
    function selectOne($pdo,$table, $wheres) {
        $whereList = [];
        foreach ($wheres as $key => $value){
            if(gettype($value) == 'string')
                $whereList[] = $key."= \"".$value."\"";
            else
                $whereList[] = $key."= ".$value;
        }
        return $pdo->query("SELECT * FROM ".$table." WHERE ".implode(' AND ', $whereList))
                    ->fetch(PDO::FETCH_OBJ);
    }

    function selectMany($pdo,$table, $wheres = []) {
        $query = "";
        if(count($wheres) != 0){
            $whereList = [];
            foreach ($wheres as $key => $value)
                $whereList[] = $key."=".$value;
            $query = " WHERE ".implode(' AND ', $whereList);
        }
        
        return $pdo->query("SELECT * FROM ".$table.$query)
                    ->fetchAll(PDO::FETCH_OBJ);
    }