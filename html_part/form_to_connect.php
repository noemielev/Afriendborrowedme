<form action="code_part/connect.php" method="POST" id="form_to_connect">
    <fieldset class="form_main_part">
        <div class="form_line">
            <label for="user_id">Vous êtes ?</label>
            <select name='user_id'>
            <?php
                //Récupère un tableau de la liste des Lenders
                $listOfLender = getAllLender();
                foreach($listOfLender as $lender){
                    
                    //pour chaque lender potentiel, création d'une instance de classe
                    $l = new Lender($lender["id"],$lender["name"],$lender["lastName"]);

                    //Création de d'un nouveau Lender dans le menu déroulant
                    //la valeur de l'option est l'id 
                    echo "<option value='".$l->getId()."'>";
                        echo $l->getFullName();
                    echo "</option>";
                }
            ?>  
            </select>
        </div>
        <input type="submit" value="Valider" class="btn_submit_form">
</form>