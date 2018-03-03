tinymce.init({
  selector: "textarea",
  plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
  

  function delpost(id)
  {
    if (confirm("Êtes-vous sûr de vouloir supprimer l'article associé à l'id '" + id + "' définitivement ?? car tout les commentaires associés (approuvés ou non) seront également supprimées"))
    {
      window.location.href = 'admin.php?action=delpost&id=' + id;
    }
  }
  
  
  function delcomment(author, id)
  {
    if (confirm("Etes-vous sûr de vouloir supprimer le commentaire écrit par '" + author + "' ??"))
    {
      window.location.href = 'admin.php?action=deleteC&id=' + id;
    }
  }
  
  
  function approveComment(author, id)
  {
    if (confirm("Êtes-vous sûr de vouloir approuver le commentaire écrit par '" + author + "' ??"))
    {
      window.location.href = 'admin.php?action=approve&id=' + id;
    }
  }
  