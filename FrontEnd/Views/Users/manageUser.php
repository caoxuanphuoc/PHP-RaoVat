<div class="container">
    <section>
        <h3>Quản lý người dùng</h3>
    </section>
</div>
<div class="container d-flex ">
    <div class="col-7">
        <strong>Danh sách người dùng</strong>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Vai trò</th>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-1">

    </div>
    <div class="col-4">
        <strong class="mb-3">Danh sách quyền</strong>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Mô tả</th>
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
                            <?= $role['name'] ?>
                        </td>
                        <td>
                            <?= $role['description'] ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>