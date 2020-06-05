<?php

$towns = getTowns();
$town = $towns[2];
$town_h4 = $town["hover_h4"];
$town_p1 = $town["hover_p1"];
$town_p2 = $town["hover_p2"];
$town_p3 = $town["hover_p3"];

echo '<div class="discription-box">
      <h4>'.$town_h4.'</h4>
      <p>'.$town_p1.'</p>
      <p>'.$town_p2.'</p>
      <p>'.$town_p3.'</p>
    </div>'    

?>