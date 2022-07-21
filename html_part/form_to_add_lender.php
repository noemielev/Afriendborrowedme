<form method="POST" action="code_part/add_lender.php">
    <fieldset class="form_main_part">
        <legend>Nouvel Utilisateur du logiciel</legend>
        <div class="form_content">
            <div class="form_line">
                <label for="lender_name">Prénom : </label>
                <input type="text" name="lender_name" id="form_lender_name" size="50" maxlength="120" placeholder="Prénom du bénéficaire" />
            </div>
            <div class="form_line">
                <label for="lender_lastName">Nom : </label>
                <input type="text" name="lender_lastName" id="form_lender_lastName" size="50" maxlength="120" placeholder="Nom du bénéficaire" />        
            </div>
            <input type="submit" value="Créer" class="btn_submit_form"/>   
        </div>
    </fieldset>
    
</form>