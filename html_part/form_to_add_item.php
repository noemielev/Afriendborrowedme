<form method="POST" action="item_added.php" id="formulaire">
    <fieldset class="form_main_part">
        <legend>Information sur le prêt</legend>
        <div class="form_conten">
            <div class="form_line">
                <label for="item_name">Objet : </label>
                <input type="text" name="item_name" id="form_item_name" size="50" maxlength="120" placeholder="nom de l'item emprunté" />    
            </div>    
            <div class="form_line">
                <label for="borrower_id">Prêt à qui ? : </label>
                <select name='borrower_id'>
                <?php
                    $allBorrower = getAllBorrower();
                    foreach ($allBorrower as $b){
                        echo "<option value='".$b->getId()."'>";
                        echo $b->getFullName();
                        echo "</option>";
                    }
                ?>
                </select>
            </div>
            <div class="form_line">
                <label for="date_of_loan">Date de l'emprunt : </label>
                <input type="date" name="date_of_loan" id="date_of_loan"/>
            </div>
            <div class="form_line">
                <label for="comment">Commentaires : </label>
                <input type="textarea" name="comment" id="comment" size="50" maxlength="120" placeholder="Commentaire" />    
            </div>
            <input style='visibility: hidden' name='lender_id' value='<?php echo getUserId(); ?>'/>
            <input type="submit" value="Enregistrer" class="btn_submit_form"/>
        </div>
    </fieldset>
    
</form>