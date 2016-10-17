<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add task!</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Task Title</label>
    		<input type="text" name="title" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Description</label>
    		<textarea name="description" class="form-control"></textarea>
    	</div>
      <div class="form-group">
          <label> Category </label>
          <select id="category" name="category" class="form-control">
            <?php foreach($viewmodel as $item) : ?>
            { 
               <option value="<?= $item['title'] ?>"><?= $item['title'] ?></option>
            }
            <?php endforeach; ?>
          </select>
      </div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>tasks">Cancel</a>
    </form>
  </div>
</div>
