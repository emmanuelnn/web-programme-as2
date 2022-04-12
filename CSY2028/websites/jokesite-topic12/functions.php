<?php
require '../database.php';

function findJoke($pdo, $id) {
 $stmt = $pdo->prepare('SELECT * FROM joke WHERE id = :id');
 $values = [
 'id' => $id
 ];
 $stmt->execute($values);
 return $stmt->fetch();
}


function insertJoke($pdo, $values) {
    $stmt = $pdo->prepare('INSERT INTO joke (joketext, jokedate)
    VALUES (:joketext, :jokedate)
    ');
    $stmt->execute($values);
   }

   function deleteJoke($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM joke WHERE id = :id');
    $values = [
    'id' => $id
    ];
    $stmt->execute($values);
   }
   
   function updateJoke($pdo, $joke, $field, $value) {
    $stmt = $pdo->prepare('UPDATE joke
    SET joketext = :joketext
    WHERE ' . $field . ' = :value');
    
    $values = $joke;
    $values['value'] = $value;
    $stmt->execute($values);
   }
   
   function find($pdo, $table, $field, $value) {
    $stmt = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE ' . $field . ' = :value');
    $criteria = [
    'value' => $value
    ];
    $stmt->execute($criteria);
    return $stmt->fetchAll();
   }


   function findAll($pdo, $table) {
    $stmt = $pdo->prepare('SELECT * FROM ' . $table );
    $stmt->execute();
    return $stmt->fetchAll();
   }
   



?>