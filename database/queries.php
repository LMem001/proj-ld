<?php 
function insert_entity($entity) {
    global $db;
    $count = 0;
    $query = "INSERT INTO enetity 
                    (name,birthdate) 
                VALUES 
                    (:name, :birthdate)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $entity);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}
?>