<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edition article <?php echo $_GET['id']; ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form>
        <div class="form-group">
            <label for="name">Titre :</label>
            <input type="text" class="form-control" id="name1" value="<?php echo $_GET['name']; ?>">
        </div>
        <div class="form-group">
            <label for="contenu">Contenu :</label>
            <textarea class="form-control" id="contenu1" rows="5"><?php echo $_GET['contenu']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="author">Auteur :</label>
            <input type="text" class="form-control" id="author1" value="<?php echo $_GET['author']; ?>">
        </div>

    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
    <input class="btn btn-success" type="button" data-dismiss="modal" name="lien"
           onclick="updateArticle();"
           value="Modifier"/>
</div>

<script></script>