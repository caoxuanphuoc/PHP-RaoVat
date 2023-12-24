<div class="container mt-4">
    <section>
        <h3>Quản lý danh mục</h3>
    </section>
</div>
<div class="container d-flex ">

    <div class="col-8">
        <div class="d-flex justify-content-between">
            <strong class="mb-3">Danh sách bài loại bài đăng</strong>
            <button type="button" class="btn btn-success p-2" onclick="openAddTypePostModal()" style="font-size: 13px;">
                Thêm
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên loại</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 0;
                foreach ($PostTypes as $PostType) {
                    $id++;
                    ?>
                    <tr>
                        <th scope="row">
                            <?= $id ?>
                        </th>
                        <td>
                            <?= $PostType['name'] ?>
                        </td>
                        <td>
                            <?= $PostType['description'] ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <button type="button"
                                    onclick="openEditTypePostModal('<?= $PostType['id'] ?>','<?= $PostType['name'] ?>','<?= $PostType['description'] ?>')"
                                    class="btn btn-warning p-1" data-bs-toggle="modal" data-bs-target="#addTypePostModal"
                                    style="font-size: 13px;">
                                    Sửa
                                </button>
                                <button type="button" onclick="openDeleteTypePostModal(' <?= $PostType['id'] ?>')"
                                    class="btn btn-danger ms-1 p-1 " data-bs-toggle="modal" style="font-size: 13px;">
                                    Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <?php
            $check = $TotalRecords % 10 == 0;
            $page = intdiv($TotalRecords, 10);
            $page += $check ? 0 : 1;
            $i = 1;
            ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="/raovat/managePostType?page=<?= $i == 1 ? $i : $i - 1 ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($i = 1; $i <= $page; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="/raovat/managePostType?page=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                <?php } ?>
                <li class="page-item" disa>
                    <a class="page-link" href="/raovat/managePostType?page=<?= $i > $page ? $i - 1 : $i ?>"
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Thêm danh mục -->
<div class="modal fade" id="addTypePostModal" tabindex="-1" role="dialog" aria-labelledby="addTypePostModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTypePostModalLabel">Thêm quyền</h5>
            </div>
            <form id="formRole" action="/raovat/managePostType" method="POST">

                <div class="modal-body">
                    <input type="hidden" id="TypeOption" name="addTypePost" value="-1">
                    <!-- Content of the modal form goes here -->
                    <label for="editedName" class="mt-2"><strong>Tên loại</strong>:</label>
                    <input type="text" class="form-control" id="nameType" name="name">
                    <label for="editedName" class="mt-2"><strong>Mô tả</strong>:</label>
                    <input type="text" class="form-control" id="descriptionType" name="description">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addTypePostModal')"
                        data-dismiss="modal">Close</button>
                    <input id="TypePostSave" type="submit" class="btn btn-primary" onclick="saveChanges('addRoleModal')"
                        value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Xóa modal -->
<div class="modal fade" id="DeleteTypePostModal" tabindex="-1" role="dialog" aria-labelledby="DeleteTypePostModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteTypePostModalLabel">Cảnh báo</h5>
            </div>
            <form id="deleteForm" action="/raovat/managePostType" method="POST">
                <div class="modal-body">
                    <label for="">Bạn muốn xóa TypePost</label>
                    <input type="hidden" id="delete" name="delete" value="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('DeleteTypePostModal')"
                        data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" onclick="saveChanges('DeleteTypePostModal')"
                        value="OK">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openAddTypePostModal() {
        document.getElementById("addTypePostModalLabel").textContent = "Thêm danh mục";
        document.getElementById('TypePostSave').value = "Thêm";

        $('#addTypePostModal').modal('show');
    }
    function saveChanges(key) {
        var editedName = document.getElementById(key).value;
        $('#' + key).modal('hide');
    }
    function closeModal(key) {
        $('#' + key).modal('hide');
    }
    function openEditTypePostModal(userId, name, des) {
        // Assume you want to set the user ID to the modal input
        document.getElementById('TypeOption').value = userId;
        document.getElementById('nameType').value = name;
        document.getElementById('descriptionType').value = des;


        // Show the modal
        $('#editModal').modal('show');
    }
    function openDeleteTypePostModal(userId) {
        // Assume you want to set the user ID to the modal input
        document.getElementById('delete').value = userId;
        // Show the modal
        $('#DeleteTypePostModal').modal('show');
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>