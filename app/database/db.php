<?php
    session_start();
    require("connect.php");

    function dd($value)
    {
        echo "<pre>", print_r($value, true), "</pre>";
        die();
    }

    // execute-Query
    function executeQuery($sql, $data)
    {
        global $conn;
        $stmt = $conn->prepare($sql);
        $values = array_values($data);
        $types = str_repeat('s', count($values));
        $stmt->bind_param($types,...$values);
        $stmt->execute();
        return $stmt;
    }
    // execute-Query //

    // Select-All
    function selectAll($table, $conditions = [])
    {
        global $conn;
        $sql = "SELECT * FROM $table";

        if(empty($conditions))
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
        else
        {
            // return records that match the conditions;
            // $sql = "SELECT * FROM $table WHERE username=? AND admin=? ";

            $i=0;
            foreach ($conditions as $key => $value)
            {
                if($i===0)
                {
                    $sql = $sql . " WHERE $key=?";
                }
                else{
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }
            
            $stmt = executeQuery($sql, $conditions);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
    }
    
  
    // Select-All //

    // Select-ONE 
    function selectOne($table, $conditions)
    {
        global $conn;
        $sql = "SELECT * FROM $table ";

        $i=0;
        foreach($conditions as $key=>$value)
        {
            if($i===0){
                $sql = $sql . " WHERE $key=?";
            }
            else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";
        $stmt = executeQuery($sql , $conditions);
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }
    function select($table, $conditions, $count)
    {
        global $conn;
        $sql = "SELECT * FROM $table ";

        $i=0;
        foreach($conditions as $key=>$value)
        {
            if($i===0){
                $sql = $sql . " WHERE $key=?";
            }
            else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT ".$count;
        $stmt = executeQuery($sql , $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
   
    function recent($table, $conditions, $count)
    {
        global $conn;
        $sql = "SELECT * FROM $table ";

        $i=0;
        foreach($conditions as $key=>$value)
        {
            if($i===0){
                $sql = $sql . " WHERE $key=?";
            }
            else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        if (empty($count)) {
            # code...
            $sql = $sql . " ORDER BY id DESC ";
        } else {
            # code...
            $sql = $sql . " ORDER BY id DESC LIMIT ".$count;
        }
        
        $stmt = executeQuery($sql , $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    // Select-ONE //
    
    // create-record
    function create($table, $data)
    {
        global $conn;
        $sql = "INSERT INTO $table SET ";
        
        $i=0;
        foreach($data as $key=>$value)
        {
            if($i===0){
                $sql = $sql . " $key=?";
            }
            else{
                $sql = $sql . ", $key=?";
            }
            $i++;
        }
        
        // echo $sql;
        $stmt = executeQuery($sql, $data);
        $id = $stmt->insert_id;
        return $id;
    }
    

    // create-record //
    
    // update-record 
    function update($table, $id, $record)
    {
        global $conn;
        $sql = "UPDATE $table SET ";

        $i=0;
        foreach($record as $key=>$value)
        {
            if($i===0){
                $sql = $sql . " $key=?";
            }
            else{
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql . " WHERE id=?";
        $record['id'] = $id;
        $stmt = executeQuery($sql, $record);
        return $stmt->affected_rows;
    }

   
    // update-record //
    
    // delete-record 
    function delete($table, $id)
    {
        global $conn;
        $sql = "DELETE FROM $table WHERE id=?";
        
        $stmt = executeQuery($sql, ['id' => $id]);
        return $stmt->affected_rows;
    }
    
    /* $id = delete('users', 8);
    $id = delete('users', 9);
    dd($id); */

    // delete-record //

    function searchPosts($term){
        // $table = 'posts';
        $match = '%'. $term .'%';
        global $conn;
        $sql = "SELECT p.* 
                FROM posts AS p
                JOIN topics AS t
                ON p.topic_id = t.id
                WHERE p.published=? 
                AND p.title LIKE ? 
                -- OR p.body LIKE ? 
                OR p.username LIKE ?
                OR t.description LIKE ?";

        $stmt = executeQuery($sql , 
                    [   
                        'published' => 1, 
                        'title' => $match, 
                        // 'body' => $match, 
                        'username' => $match,
                        'description' => $match
                    ]
                );
                    

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
        
    function byTopic($topic_id){

        global $conn;
        $sql = "SELECT * 
                FROM posts 
                -- AS p
                -- JOIN topics AS t
                -- ON p.topic_id = t.id
                WHERE published=? 
                AND topic_id=?";

        $stmt = executeQuery($sql , ['published' => 1,'topic_id' => $topic_id]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    function mostLiked($table, $conditions, $count)
    {
        global $conn;
        $sql = "SELECT * FROM $table ";

        $i=0;
        foreach($conditions as $key=>$value)
        {
            if($i===0){
                $sql = $sql . " WHERE $key=?";
            }
            else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        if (empty($count)) {
            # code...
            $sql = $sql . " ORDER BY likes DESC ";
        } else {
            # code...
            $sql = $sql . " ORDER BY likes DESC LIMIT ".$count;
        }
        
        $stmt = executeQuery($sql , $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    function sortBy($table, $column, $toggle, $conditions = [])
    {
        global $conn;
        $sql = "SELECT * FROM $table";

        if(empty($conditions))
        {
            $sql = $sql . " ORDER BY ". $column." ". $toggle; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
        else
        {
            // return records that match the conditions;
            // $sql = "SELECT * FROM $table WHERE username=? AND admin=? ";

            $i=0;
            foreach ($conditions as $key => $value)
            {
                if($i===0)
                {
                    $sql = $sql . " WHERE $key=?";
                }
                else{
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }
            $sql = $sql . " ORDER BY ". $column." ". $toggle; 
            $stmt = executeQuery($sql, $conditions);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
    }
?>