
<h1>Éditer un article</h1>

<form method="POST" action="index?controller=article&task=edit">
    <input type="hidden" name="id" value="<?= $articleId; ?>">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $title; ?>">

   
    <input type="hidden" type="text" name="slug" id="slug" value="<?= $slug; ?>">

    <br>

    <label for="introduction">Introduction :</label>
    <textarea name="introduction" id="introduction"><?= $introduction; ?></textarea>

    <br>

    <label for="content">Contenu :</label>
    <textarea name="content" id="content"><?= $content;?></textarea>

    <br>

    <input type="submit"  name='update' value="Éditer">
    
    <div class="article adm">
        <a href="../public/index?task=add">Retour à la page admin</a>
    </div>
</form>