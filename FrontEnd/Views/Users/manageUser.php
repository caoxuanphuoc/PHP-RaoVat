<div class="container mt-4">
    <span>
        <section>

            <h3> Quản lý người dùng</h3>
        </section>
    </span>
</div>
<!-- Hai bảng -->
<div class=" container d-flex ">
    <!-- Bảng User -->
    <div class=" col-7">
        <strong>Danh sách người dùng</strong>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 0;
                foreach ($users as $user) {
                    $id++;
                    ?>
                    <tr>
                        <th scope="row">
                            <?= $id ?>
                        </th>
                        <td>
                            <?= $user['userName'] ?>
                        </td>
                        <td>
                            <?= $user['name'] ?>
                        </td>
                        <td>
                            <?= $user['phoneNumber'] ?>
                        </td>
                        <td>
                            <?= $user['RoleName'] ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <button style="font-size: 13px;" type="button" class="btn btn-warning p-1"
                                    onclick="openEditModal('<?= $user['id'] ?>','<?= $user['userName'] ?>','<?= $user['name'] ?>','<?= $user['phoneNumber'] ?>','<?= $user['roleId'] ?>')">
                                    Sửa
                                </button>
                                <button style="font-size: 13px;" type="button" class="btn btn-danger ms-1 p-1 "
                                    data-bs-toggle="modal" data-bs-target="#UpdateUserForm"
                                    onclick="openDeleteModal('<?= $user['id'] ?>')">
                                    Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Nav user -->
        <nav aria-label="Page navigation example">
            <?php
            $check = $TotalRecordUsers % 5 == 0;
            $page = intdiv($TotalRecordUsers, 5);
            $page += $check ? 0 : 1;
            $i = 1;
            $UserCheckPageR = isset($_GET['pager']) ? '&pager=' . $_GET['pager'] : ""

                ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link"
                        href="/raovat/manageUser?pageu=<?= $i == 1 ? $i : $i - 1 ?><?= $UserCheckPageR ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($i = 1; $i <= $page; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link"
                            href="/raovat/manageUser?pageu=<?= $i ?><?= $UserCheckPageR ?>">
                            <?= $i ?>
                        </a></li>
                <?php } ?>
                <li class="page-item" disa>
                    <a class="page-link"
                        href="/raovat/manageUser?pageu=<?= $i > $page ? $i - 1 : $i ?><?= $UserCheckPageR ?>"
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-1">

    </div>
    <!-- Bảng Role -->
    <div class="col-4">
        <div class="d-flex justify-content-between">
            <strong class="mb-3">Danh sách quyền</strong>
            <button type="button" class="btn btn-success p-2" onclick="openAddRoleModal()" style="font-size: 13px;">
                Thêm
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sstRole = 0;
                foreach ($roles as $role) {
                    $sstRole++;
                    ?>
                    <tr>
                        <th scope="row">
                            <?= $sstRole ?>
                        </th>
                        <td>
                            <strong>
                                <?= $role['name'] ?>
                            </strong>
                        </td>
                        <td>
                            <?= $role['description'] ?>
                        </td>
                        <td>
                            <div class="d-flex">

                                <button type="button"
                                    onclick="openUpdateRoleModal(' <?= $role['id'] ?>','<?= $role['name'] ?>','<?= $role['description'] ?>')"
                                    class="btn btn-warning p-1" data-bs-toggle="modal" data-bs-target="#UpdateUserForm"
                                    style="font-size: 13px;">
                                    Sửa
                                </button>
                                <button type="button" onclick="openDeleteRoleModal(' <?= $role['id'] ?>')"
                                    class="btn btn-danger ms-1 p-1 " data-bs-toggle="modal" data-bs-target="#UpdateUserForm"
                                    style="font-size: 13px;">
                                    Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Nav ROle -->
        <nav aria-label="Page navigation example">
            <?php
            $check = $TotalRecordRoles % 5 == 0;
            $page = intdiv($TotalRecordRoles, 5);
            $page += $check ? 0 : 1;
            $i = 1;
            $RoleCheckPageU = isset($_GET['pageu']) ? '&pageu=' . $_GET['pageu'] : ""

                ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link"
                        href="/raovat/manageUser?pager=<?= $i == 1 ? $i : $i - 1 ?><?= $RoleCheckPageU ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($i = 1; $i <= $page; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link"
                            href="/raovat/manageUser?pager=<?= $i ?><?= $RoleCheckPageU ?>">
                            <?= $i ?>
                        </a></li>
                <?php } ?>
                <li class="page-item" disa>
                    <a class="page-link"
                        href="/raovat/manageUser?pager=<?= $i > $page ? $i - 1 : $i ?><?= $RoleCheckPageU ?>"
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Sửa User -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
            </div>
            <form action="/raovat/user" method="POST">

                <div class="modal-body">
                    <input type="hidden" id="userID" name="update" value="0">
                    <!-- Content of the modal form goes here -->
                    <label for="editedName" class="mt-2"><strong>Họ tên</strong>:</label>
                    <input type="text" class="form-control" id="nameUser" name="name">
                    <label for="editedName" class="mt-2"><strong>Số điện thoại</strong>:</label>
                    <input type="text" class="form-control" id="sdt" disabled>
                    <label for="editedName" class="mt-2"><strong>User Name</strong>:</label>
                    <input type="text" class="form-control" id="un" name="userName">
                    <label for="editedName" class="mt-2"><strong>Role</strong>:</label>
                    <select class="selectpicker" id="roleId" name="roleId" data-live-search="true">
                        <?php
                        foreach ($roles as $role) {
                            ?>
                            <option value=<?= $role['id'] ?>><?= $role['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editModal')"
                        data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" onclick="saveChanges()" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Xóa modal -->
<div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteUserModalLabel">Cảnh báo</h5>
            </div>
            <form id="deleteForm" action="/raovat/user" method="POST">
                <div class="modal-body">
                    <label for="">Bạn muốn xóa user</label>
                    <input type="hidden" id="delete" name="delete" value="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('DeleteUserModal')"
                        data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" onclick="saveChanges('DeleteUserModal')" value="OK">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Thêm Role -->
<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Thêm quyền</h5>
            </div>
            <form id="formRole" action="/raovat/manageUser" method="POST">

                <div class="modal-body">
                    <input type="hidden" id="RoleOption" name="addrole" value="-1">
                    <!-- Content of the modal form goes here -->
                    <label for="editedName" class="mt-2"><strong>Tên quyền</strong>:</label>
                    <input type="text" class="form-control" id="nameRole" name="name">
                    <label for="editedName" class="mt-2"><strong>Mô tả</strong>:</label>
                    <input type="text" class="form-control" id="descriptionRole" name="description">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addRoleModal')"
                        data-dismiss="modal">Close</button>
                    <input id="RoleSave" type="submit" class="btn btn-primary" onclick="saveChanges('addRoleModal')"
                        value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Function to open the edit modal and set the user ID
    function openEditModal(userId, un, name, sdt, roleId) {
        // Assume you want to set the user ID to the modal input
        document.getElementById('un').value = un;
        document.getElementById('nameUser').value = name;
        document.getElementById('sdt').value = sdt;
        document.getElementById('roleId').value = roleId;
        document.getElementById('userID').value = userId;


        // Show the modal
        $('#editModal').modal('show');
    }
    function openDeleteModal(userId) {
        // Assume you want to set the user ID to the modal input
        document.getElementById('delete').value = userId;
        // Show the modal
        $('#DeleteUserModal').modal('show');
    }
    function openDeleteRoleModal(userId) {
        // Assume you want to set the user ID to the modal input
        var formR = document.getElementById('deleteForm')
        document.getElementById('delete').value = userId;
        formR.setAttribute("action", "/raovat/manageUser");
        $('#DeleteUserModal').modal('show');
    }
    function openAddRoleModal() {
        document.getElementById("addRoleModalLabel").textContent = "Thêm quyền";
        document.getElementById('RoleSave').value = "Thêm";

        $('#addRoleModal').modal('show');
    }
    function openUpdateRoleModal(id, name, des) {

        document.getElementById('RoleOption').value = id;
        document.getElementById('nameRole').value = name;
        document.getElementById('descriptionRole').value = des;
        document.getElementById('RoleSave').value = "Sửa";
        document.getElementById("addRoleModalLabel").textContent = "Chỉnh sửa quyền";


        $('#addRoleModal').modal('show');
    }
    // Function to save changes (you can implement this based on your needs)
    function saveChanges(key) {
        var editedName = document.getElementById(key).value;
        $('#' + key).modal('hide');
    }
    function closeModal(key) {
        $('#' + key).modal('hide');
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>