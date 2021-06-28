<?php
//Include database connection
require "../back/dbconfig.php";
$sous_cat = new souscategorie($db_config)  ;

if($_POST['rowid']) {
    $id = $_POST['rowid']; //escape string
    
    // Run the Query
    $req = $db_config->prepare("SELECT * FROM souscategorie WHERE id_categorie=:uid");
    $req->execute(array(':uid'=>$id)); 
    // Fetch Records
    // Echo the data you want to show in modal
    echo'<table id="tablecat">';
        while ($ligne = $req->fetch()) {
            echo'<tr> <td width="80%">'.$ligne['name'].'</td>';
            echo '<td style="visibility:hidden;">'.$ligne['id'].'</td>';
            echo '<td style="visibility:hidden;">'.$ligne['id_categorie'].'</td>';
            echo'<td width="10%" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Modifier">
            <a data-toggle="modal" data-target=".update-subcategory-modal-lg" 
            class="color action-btn updateCateg href="#" ><i class="color ti-pencil-alt">
            </i></a></td>';
            echo '<td width="1%" data-toggle="tooltip" data-placement="top" title="Supprimer">
            <a class="color action-btn" href="javascript:;" onclick="deletesubCat('.$ligne['id'].')"><i class="color ti-close"></i></a></td></tr>';
        }
    echo'</table>';
}
?>
<div class="modal fade update-subcategory-modal-lg" tabindex="-1" role="dialog" id="update-subcategory-modal-id"  
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="update-subcategory-modal-id">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mettre à jour la sous-catégorie</h5>
                
                </div>
                <div class="modal-body">
                <form name="up_subcat" action="product.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 form-group" >
                            <input id="sub_cat_name" class="form-control" type="text" placeholder="Nom" name="name" >    
                            <input id="sub_cat_id" class="form-control" type="hidden"placeholder="Name" name="id" value="">
                            <p id="name" style="margin-bottom: 0px"></p>
                            <?php
                                if(isset($erName)){
                                    echo '<p>'.$erName.'</p>';
                                }
                            ?> 
                            </div>
                            <div class="col-lg-12 form-group">
                                <select id="subcat_cat" class="form-control"  name="categorie" >
                                    <option value="" disabled selected hidden>Choisissez la catégorie...</option>
                                    <?php
                                        $cat = new categorie($db_config)  ;
                                        $req = $cat->get_all_cat();
                                        while ($ligne = $req->fetch()) {
                                            echo '<option value="'.$ligne['id'].'">'.$ligne['nom'].'</option>';
                                        }
                                    ?>
                                </select> 
                                <p id="categoriex" style="margin-bottom: 0px"></p>
                                <?php
                                if(isset($erCateg)){
                                    echo '<p>'.$erCateg.'</p>';
                                }
                                ?> 
                            </div>
                            <div class="pt-3 col-lg-12 form-group">
                                <br>
                                <button type="submit" class="site-btn" name="update_subcat" id="update_subcat">Modifier</button>                                                      
                            </div>
                        </div>
                    </form>                      
                </div>
                <div class="modal-footer">
                    <button class="btn" data-number="2">Fermer</button>
                </div>
            </div>
        </div>
</div>
<!-- Form Validation JS File -->
<script src="js/form-validation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $("button[data-number=2]").click(function(){
        $('#update-subcategory-modal-id').modal('hide');
    });   
    $(document).on('click','.updateCateg', function() { 
        var name = $(this).parent().siblings(":first").text();
        var id = $(this).closest('tr').find('td:nth-child(2)').text();
        var id_cat = $(this).closest('tr').find('td:nth-child(3)').text();
        console.log(id);
        // select elements to update
        $("#sub_cat_name").val(name);
        $("#sub_cat_id").val(id);
        $("#subcat_cat").val(id_cat);
    }); 
    function deletesubCat(id) {
            Swal.fire({
                title: 'Supprimer la sous-catégorie',
                text: "Êtes-vous sûr? Vous ne pourrez les récupérer ! Tous les produits de cette sous catégorie seront supprimés",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {                   
                    Swal.fire(
                    'Deleted!',
                    'success'
                    ).then(r => {
                        window.location.href = './delete.php?id_subcateg=' + id
                    })
                }
            })
        }
</script>
