<?php
    require 'classes/Database.php';

    $database = new Database;


    $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

    if(isset($_POST['delete'])){
        $delete_id = $_POST['delete_id'];
        $database->query('DELETE FROM items WHERE id = :id');
        $database->bind(':id', $delete_id);
        $database->execute();
    }

    if(isset($post['submit'])){
        $title = $post['title'];
        $body = $post['body'];
        $database->query('INSERT INTO items(title, body) VALUES(:title, :body)');
        $database->bind(':title',$title);
        $database->bind(':body',$body);
        $database->execute();

    }

    $database->query('SELECT * FROM items');
    $rows = $database->resultset();


?>
<h2> Add item to TODO LIST</h2>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label> Item title </label> <br />
        <input type="text" name="title" placeholder="Add a title..." /> <br/>
        <label> Body </label> <br />
        <textarea name="body"> </textarea>  <br/>
        <input type="submit" name="submit" value="Submit" />
    </form>
<h1> To do list </h1>
<div>
    <?php     foreach ($rows as $row): ?>
        <div>
           <h3>  <?php echo $row['title']; ?></h3>
            <p>  <?php echo $row['body']; ?></p>
            <br/>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input type="submit" name="delete" value="Delete" />
                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
            </form>
        </div>
    <?php endforeach; ?>
</div>

