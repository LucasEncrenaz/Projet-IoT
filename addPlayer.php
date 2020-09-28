<h1>Ajouter un joueur</h1>
<form action="formulaire.php" method="post" class="form-example">
  <div class="form-example">
    <label for="name">Nom du joueur : </label>
    <input type="text" name="name" id="name" required>
  </div>
  <div class="form-example">
    <label for="name">Prénom du joueur : </label>
    <input type="text" name="surname" id="surname" required>
  </div>
  <div class="form-example">
    <label for="email">Date de naissance du joueur : </label>
    <input type="date" name="date" id="date" required>
  </div>
  <div class="form-example">
    <input type="submit" value="Ajouter">
  </div>
</form>