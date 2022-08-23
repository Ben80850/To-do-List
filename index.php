<?php 
require 'db-conn.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titre>To-Do List</titre>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="">
                <input type="texte"
                       name="titre"
                       placeholder="Ce champs est obligatoire"/>
                <button type="submit">Ajouter &nbsp;<span>&#43;</span></button>
            </form>
        </div>
    </div>
    <?php 
          $todos = $conn->query("SELECT * FROM todo ORDER BY id DESC");
       ?>
         <div class="show-todo-section"> 
         <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>


            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['verification']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['titre'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['titre'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['creer'] ?></small> 
                </div>
            <?php } ?>
             </div>
         </div>
</body>
</html>