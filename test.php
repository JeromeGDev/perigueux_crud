<?php
echo ' <input type="hidden" name ="idquestion" value="'.$idquestion.'" />';
echo "<input type=\"radio\" name=\"'.$idQuestion.'\'"." value=\"'.$reponse1.'\' />" ;echo $reponse1;echo" <br></br>" ;
echo "<input type=\"radio\" name=\"'.$idQquestion.'\'"." value=\"'.$reponse2.'\' />" ;echo $reponse2;echo" <br></br>" ;
echo "<input type=\"radio\" name=\"'.$idQquestion.'\'"." value=\"'.$reponse3.'\' />" ;echo $reponse3;echo" <br></br>" ;

    $idquestion = $_POST['idquestion'];
if (isset($_POST[$idQuestion]))
 
    {
       $Question =$_POST[$idQuestion]  ;
      echo $Question ;
  }
?>
