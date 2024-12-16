<?php include_once 'views/partials/header.php'; ?>

<style>
    /* gioi han hien thi description */
    .description {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>




<div class="main-panel">
	<div class="content-wrapper">
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">dangnhap</h4>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dangnhaps as $dangnhap): ?>
                            <tr>
                                <td><img src="<?php echo APPURL . "../assets/images/" . $dangnhap['image']; ?>" alt="" width="100"></td>
                                <td>
                                    <a href="edit-dangnhap?id=<?php echo $dangnhap['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete-dangnhap?id=<?php echo $dangnhap['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>



</script>



<?php include_once 'views/partials/_footer.php'; ?>