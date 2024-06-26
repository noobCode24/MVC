<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <!-- <h1 class="mt-3 text-center text-primary w-100">Danh sách danh mục trò chơi</h1> -->
    <?php
    getSmg();
    ?>
    <form action="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/" method="post" class="">
        <div class="action d-flex align-items-center">
            <!-- Thêm danh mục -->
            <a href="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/getAddEnterCategoryService" class="btn btn-success m-3 py-2">
                <i class="fa-solid fa-plus"></i>
                <span class="text-center fw-bold">Thêm danh mục</span>
            </a>

            <div class="input-group w-50">
                <input type="search" name="escate_name" id="" class="form-control" placeholder="Nhập tên danh mục để tìm kiếm...">
                <button class="btn btn-primary" type="submit">
                    <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="search d-flex">
                <a href="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                    <i class="text-light fa-solid fa-filter"></i>
                    <span class="text-center text-light fw-bold">Bộ lọc</span>
                </a>
            </div>
            <a href="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/" class="me-1 px-3 fw-bold text-light btn btn-danger">
                <i class="fa-solid fa-rotate-left"></i>
                Reset
            </a>
        </div>
        <!-- Filter search -->
        <!-- <div class="filter mb-3 ms-3">
            <div class="mb-3 text-primary fw-bold" style="font-size: 18px;">Chọn tiêu chí để tìm kiếm</div>
            <select name="escate_id" id="" class="fw-bold btn btn-outline-info">
                <option value="" selected>Danh mục</option>
                <?php
                foreach ($listCate as $key => $value) {
                ?>
                    <option class="btn btn-light" value="<?php echo $value['escate_id'] ?>"><?php echo $value['escate_name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div> -->
    </form>
    <table class="table table-bordered text-center">
        <thead>
            <th width="4%">STT</th>
            <th width="10%">Tên danh mục</th>
            <th width="45%">Mô tả</th>
            <th width="12%">Trạng thái</th>
            <th width="">Ngày tạo</th>
            <th width="">Ngày sửa</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </thead>
        <tbody>
            <?php
            if (!empty($cate_list)) {
                foreach ($cate_list as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo ($key + 1) ?></td>
                        <td><?php echo $value['escate_name'] ?></td>
                        <td><?php echo $value['escate_desc'] ?></td>
                        <td>
                            <?php
                            $type = 'danger';
                            if ($value['status'] == 1) $type = 'primary';
                            ?>
                            <span class="fw-bold w-100 btn btn-<?php echo $type ?>">
                                <?php echo ($value['status'] == 1) ? "Hoạt động" : "Bảo trì" ?>
                            </span>
                        </td>
                        <td><?php echo $value['created_at'] ?></td>
                        <td><?php echo ($value['updated_at']) ? $value['updated_at'] : "" ?></td>
                        <td>
                            <a href="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/getEditEnterCategoryService/id=<?php echo $value['escate_id'] ?>">
                                <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/handleDeleteEnterCategoryService/id=<?php echo $value['escate_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                <i class="btn btn-danger fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="8" class="text-primary">Không có danh mục</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>