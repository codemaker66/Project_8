
  function delpost(id, title)
  {
    if (confirm("Are you sure you want to delete the article that have the title  '" + title + "'"))
    {
      window.location.href = 'admin.php?action=delpost&id=' + id;
    }
  }
  
  
  function delcomment(author, id)
  {
    if (confirm("Are you sure you want to delete the comment wrote by '" + author + "'"))
    {
      window.location.href = 'admin.php?action=deleteC&id=' + id;
    }
  }
  
  
  function approveComment(author, id)
  {
    if (confirm("Are you sure you want to approve the comment wrote by '" + author + "'"))
    {
      window.location.href = 'admin.php?action=approve&id=' + id;
    }
  }
  