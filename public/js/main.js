function addArticleConfirm(){
    select = confirm("記事を投稿しますか？");
    if(select == false){
      return false;
    }
  }

function addCommentConfirm(){
    select = confirm("コメントしますか？");
    if(select == false){
        return false;
    }
}

function deleteCommentConfirm(){
    select = confirm("このコメントを削除しますか？");
    if(select == false){
        return false;
    }
    document.delete.submit();
}