</div>
   <script>
$(document).on('click', '.delete-object', function() {
    const id = $(this).attr('delete-id');
    bootbox.confirm({
        message: "<h4>Вы уверены?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Да',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> Нет',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.post('delete_product.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Невозможно удалить.');
                });
            }
        }
    });
    return false;
});
</script> 
</body>
</html>