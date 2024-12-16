<?php include 'views/partials/header.php'; ?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit info</h4>
                    <p class="card-description">
                        Edit info
                    </p>
                    <form class="forms-sample" method="POST" action="edit-info?id=<?php echo $_GET['id']  ?>" enctype="multipart/form-data">
                        <?php if (!empty($err)): ?>
                            <div class="alert alert-danger">
                                <?php foreach ($err as $key => $value): ?>
                                    <li><?php echo $value; ?></li>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1"
                                placeholder="Name" value="<?php echo isset($data['name']) ? htmlspecialchars($infoData['name']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="thumbnail" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" name="thumbnailtext" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" name="pagraph" id="exampleTextarea1" rows="6"><?php echo isset($infoData['description']) ? htmlspecialchars($infoData['description']) : ''; ?></textarea>
                        </div>  
                        <div class="form-group">
                              <label for="id_info">info</label>
                             <select name="id_info" id="id_info" class="form-control">
                              <!-- Populate with categories from the database -->
                              <?php
                              $categories = Database::query("SELECT * FROM `products`");
                             while ($info = $categories->fetch_assoc()) {
                                   $selected = isset($infoData) && $infoData['id_info'] == $info['id'] ? 'selected' : '';
                                    echo "<option value='{$info['id']}' $selected>{$info['name']}</option>";
                                  }
                                 ?>
                                 </select>
                              </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <input type="number" value="<?php echo isset($data['status']) ? htmlspecialchars($data['status']) : ''; ?>" class="form-control" name="status" id="status" placeholder="status">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" value="<?php echo isset($infoData['price']) ? htmlspecialchars($infoData['price']) : ''; ?>" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="info"><span class="btn btn-light">Cancel</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="views/vendors/js/vendor.bundle.base.js"></script>
<script src="views/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="views/vendors/select2/select2.min.js"></script>


<script src="views/js/file-upload.js"></script>
<script src="views/js/typeahead.js"></script>
<script src="views/js/select2.js"></script>




<?php include_once 'views/partials/_footer.php'; ?>