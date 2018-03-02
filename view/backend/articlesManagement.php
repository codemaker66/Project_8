<?php $title = 'Articles';?>

<?php ob_start(); ?>

  <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">

          <?php 
            //show message after adding / editing or deleting an article
            if(isset($_GET['status'])){ 
              echo '<h3>Article '.$_GET['status'].'.</h3>';
            } 
          ?>

          <?php
          if ($req->rowCount() == 0) {?>
            <p style="text-align: center;">Il n'y a pas d'articles à modérer pour le moment</p>
          <?php
          }
          else
          { ?>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Titre</th>
                <th scope="col">Date de création</th>
                <th scope="col">Mise à jour</th>
                <th scope="col">Éditer</th>
                <th scope="col">Supprimer</th>
              </tr>
            </thead>
            <tbody>
                <?php
                while ($data = $req->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <tr>
                    <th scope="row"><?= $data['id']; ?></th>
                    <td><?= $data['title']; ?></td>
                    <td><?= $data['creation_date_fr']; ?></td>
                    <td><?php if ($data['edit_date_fr'] == NULL) 
                      {
                          echo "Aucune";  
                      }
                      else{
                          echo $data['edit_date_fr'];     
                      }?>
                    </td>
                    <td><a class="btn btn-warning" href="admin.php?action=update&amp;id=<?= $data['id'];?>">Éditer</a></td>
                    <td>
                      <button type="button" class="btn btn-danger"  onclick="delpost('<?= $data['id'];?>');">Supprimer</button>
                    </td>
                </tr>
                <?php
                } 
                $req->closeCursor();
                ?>   
            </tbody>
          </table>
        </div>
            <?php
            echo '<p style="text-align: center;">Page : ';
            for($i=1; $i<=$numberOfPages; $i++)
            {
                 
                 if($i==$currentPage)
                 {
                     echo ' [ '.$i.' ] '; 
                 }  
                 else
                 {
                      echo ' <a href="admin.php?action=admin&amp;page='.$i.'">'.$i.'</a> ';
                 }
            }
            echo '</p>';
            }
            ?>
        </div>
      </div>
    </div>
<hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>