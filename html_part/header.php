<header>
    <div class="header_logo">
        <img src="img/imgPret.jpg" alt="logo"/>
    </div>
    <div class="header_title">
        <h1><?php echo helloUser().'<br/><br/>'; ?></h1>
        <form method='POST' action='code_part/disconnect.php' id='form_disconnect'>
                <!--<input style='visibility: hidden' name='id' value='disconnect'/>-->
                <input type='submit' value="Changer d'utilisateur" id='btn_disconnect'/>
        </form>
    </div>
    <div class="header_navigator">
        <nav id="navigator">
            <div class="btn_nav"><a href="new_item.php">Nouveau Pret</a></div>
            <div class="btn_nav"><a href="active_loan.php">Mes prets en cours</a></div>
            <div class="btn_nav"><a href="all_loan.php">Historique</a></div>
        </nav>
    </div>
    </div>
</header>