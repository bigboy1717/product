<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Удалить продукт?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
        <button id="<?= $_SERVER['PHP_SELF'] == "read_category.php" ? "delete-category" : "delete-object" ?>" type="button" class="btn btn-danger">Удалить</button>
      </div>
    </div>
  </div>
</div>