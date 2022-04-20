<?php



function index()
{
    require '../model/manager.php';

    require_once '../model/article-manager.php';
    $articleManager = new ArticleManager();
    $articles = $articleManager->getAllArticle();

    require_once '../model/comment-manager.php';
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComment();

    include '../view/admin/index.html.php';
}

function update()
{
    require '../model/manager.php';
    require_once '../model/article-manager.php';
    $articleManager = new ArticleManager;
    $article = $articleManager->getArticleById($_GET['id']);
    
    include '../view/admin/update-article.html.php';
    
    if(isset($_POST['submit']))
    {
        $article = $articleManager->updateArticle($_POST['title'],$_POST['content'],$_GET['id']);
        header('Location: /?controller=admin');

        }
}


function deleteCommentaire()
{
    require '../model/manager.php';
    require_once '../model/comment-manager.php';
    $commentManager = new CommentManager(); 
    $commentaire = $commentManager->getCommentById(intval($_GET['id']));
    include '../view/admin/delete-comment.html.php';

    if(isset($_POST['submit']))
    {
        $commentaire = $commentManager->deleteComment(intval($_GET['id']));
        header('Location: /?controller=admin'); exit;
    }

}

function deleteArticle()
{
    require '../model/manager.php';
    require_once '../model/article-manager.php';
    $articleManager = new ArticleManager();
    $article = $articleManager->getArticleById(intval($_GET['id']));
    include '../view/admin/delete-article.html.php';

    if(isset($_POST['submit']))
    {
        $article = $articleManager->deleteArticle(intval($_GET['id']));
        header('Location: /?controller=admin'); exit;
    }

}