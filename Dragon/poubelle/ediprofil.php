<form method="POST" action="">
            <label>Nom:</label>
            <input type="text" name="newNom" placeholder="Nom" value="<?php echo $user['nom'];?>"/><br><br>
            <label>Prenom:</label>
            <input type="text" name="newPrenom" placeholder="Prenom" value="<?php echo $user['prenom']; ?>"/><br><br>
            <label>Email:</label>
            <input type="text" name="newMail" placeholder="Email" value="<?php echo $user['email']; ?>"/><br><br>
            <label>Mot de passe:</label>
            <input type="password" name="newMdp" placeholder="Mot de passe"/><br><br>
            <label>Confirmer mot de passe:</label>
            <input type="password" name="newMdp2" placeholder="Confimrer mot de passe"/><br><br>
            <input type="submit" value="Mettre à jour !"/>
         </form>