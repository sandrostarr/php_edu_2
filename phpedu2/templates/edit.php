<form action="#" method="post">
    <p>
        <label for="title">Заголовок</label>
        <input id="title" name="title" type="text" value="<?php echo $_POST['title']?>">
    </p>
    <p>
        <label for="content">Текст</label>
        <textarea id="content" name="content" cols="30" rows="10"><?php echo $_POST['content']?></textarea>
        <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
    </p>

    <button>Опубликовать</button>
</form>