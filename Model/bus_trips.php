<?php

# gets time table for both runs
function get_springfield_timetable(){
	global $db;
    $query = 'SELECT * FROM ToowoombaBound
              ORDER BY busNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $toowoomba_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $toowoomba_bus;
	
	
}

function get_toowoomba_timetable(){
	global $db;
    $query = 'SELECT * FROM SpringfieldBound
              ORDER BY busNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $springfield_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $springfield_bus;
	
	
}



# will have to figure out a way to get every possible trip date in here, i.e a script that is ran that auto adds or manual data entry
# or the opposite like a table of days when the buses dont run i.e christmas dates and cross check that list.


?>