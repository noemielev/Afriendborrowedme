
<form method="POST" action="code_part/add_borrower.php" id="formulaire">
    <h2>Créer un nouveau bénéficiaire</h2>
    <fieldset class="form_main_part">
        <legend>Nouveau bénéficiare de prêt</legend>
        
        <div class="form_content">
            <div class="form_line">
                <label for="borrower_name">Prénom : </label>
                <input type="text" name="borrower_name" id="form_borrower_name" size="50" maxlength="120" placeholder="Prénom du bénéficaire" />
            </div>  
            <div class="form_line">
                <label for="borrower_lastName">Nom : </label>
                <input type="text" name="borrower_lastName" id="form_borrower_lastName" size="50" maxlength="120" placeholder="Nom du bénéficaire" />
            </div>  
            <div class="form_line">
                <label for="borrower_phone">Numéro de téléphone : </label>
                <input type="text" name="borrower_phone" id="form_borrower_phone" size="50" maxlength="120" placeholder="Num de téléphone" />
            </div>
            <input type="submit" value="Créer" class="btn_submit_form"/>     
        </div>
    </fieldset>
</form>
