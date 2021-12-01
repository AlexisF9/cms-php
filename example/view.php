<html>
  
  <head>
    <title>A simple tiny blog</title>
    <!-- inclure ici vos feuilles de style personnalisées si vous voulez que ce soit plus joli ! -->
  </head>
  
  <body>
  <h1>Bonjour <?php echo $_SESSION['user']->getName() ?></h1>
  <a href="index.php?logout=true">Deconnexion</a>
    <!-- section présentant la liste des messages existant -->
    <section> 
      <!-- injection de la liste des messages déjà préparée et formatée au niveau du controleur  -->
      <?php echo $formatedTweets ?>
    </section>
    
    <!-- section présentant le formulaire pour poster un nouveau message -->
    <section> 
      <form action="index.php" method="post" enctype="multipart/form-data">
        <textarea name="message" cols="60" rows="10" placeholder="votre message"></textarea><br>
        <label for="picture">Ajouter une image ?<label><input type="file" name="picture"><br>
        <input type="submit" value="Poster">
      </form>
    </section>
    
  </body>
</html>