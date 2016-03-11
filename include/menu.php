<div id="menu">
    <ul>
        <li><a href="index.php">Forside</a></li>
        <li><a href="nyheder.php">Nyheder</a></li>
        <li><a href="teams.php">Teams</a></li>
        <li><a href="kampe.php">Kampe</a></li>
        <li><a href="ts3.php">Teamspeak 3</a></li>
        <li><a href="filer.php">Filer</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <?php
            if($_SESSION['auth'] == 2){
                echo '<li><a href="#">';
                echo $_SESSION['brugernavn'] ;
                echo '&nbsp;&nbsp;<i class="fa fa-chevron-circle-down"></i></a>';
                echo '<ul>';
                echo '<li><a href="minprofil.php">Min Profil&nbsp;&nbsp;<i class="fa fa-user"></i></a></li>';
                echo '<li><a href="adminpanel.php">Admin Panel&nbsp;&nbsp;<i class="fa fa-cog"></i></a></li>';
                echo '<li><a href="code_logud.php">Log Ud&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a></li>';
                echo '</ul>';
                echo '</li>';
            }
            elseif($_SESSION['auth'] == 1){
                echo '<li><a href="#">';
                echo $_SESSION['brugernavn'] ;
                echo '&nbsp;&nbsp;<i class="fa fa-chevron-circle-down"></i></a>';
                echo '<ul>';
                echo '<li><a href="minprofil.php">Min Profil&nbsp;&nbsp;<i class="fa fa-user"></i></a></li>';
                echo '<li><a href="code_logud.php">Log Ud&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a></li>';
                echo '</ul>';
                echo '</li>';
            }
            else{
                echo '<li><a id="login" href="#">Login&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-in"></i></a></li>';
            }
        ?>
    </ul>
</div>