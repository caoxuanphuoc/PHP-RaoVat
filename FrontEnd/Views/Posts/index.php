<body>
    <div class="container mt-5">
        <div class="pt-1 d-flex justify-content-between">
            <div>
                <h4 class="mt-5">Danh mục</h4>
            </div>

            <?php
            if (isset($_SESSION["USER_LOGED"])) {
                $userid = $_SESSION["USER_LOGED"];
                if ($userid['id'] == 1) {
                    ?>
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tạo danh mục.
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2">
                            Tạo bài đăng.
                        </button>
                    </div>
                    <?php
                } else { ?>
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2"
                            onclick="openCreatePostModal()">
                            Tạo bài đăng.
                        </button>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div>

    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Các mục danh mục sản phẩm -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- <?php
                        foreach ($Data as $item) {
                            if ($item->name != null) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link fs-5" href="?id=<?php echo $item->id ?>"
                                        style="color: #37517e; margin-left: 50px;">
                                        <?php echo $item->name ?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?> -->
                        <!-- Thêm các mục danh mục sản phẩm khác nếu cần -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- lươi---------------------------------------------------------- -->
    <div class="container">

        <?php
        foreach ($Posts as $item) {
            $stringDate = $item["creation"];
            $date = date_create($stringDate);
            // var_dump($item);
            ?>
            <div class="card  me-5 mb-3 w-75">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">

                            <a href="/raovat/post?id=<?= $item["id"] ?>" class="card-title">
                                <h4>
                                    <?= $item["title"] ?>
                                </h4>
                            </a>
                            <p class="card-text">
                                <?= $item["content"] ?>
                            </p>
                            <div class="d-flex align-items-center">
                                <span class="card-text" style="font-size: 15px;"> <b>
                                        <?= $item["userName"] ?>
                                    </b></span>
                                <span class="card-subtitle ms-5" style="font-size: 13px;">
                                    <?= date_format($date, "d-m-Y H:i"); ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-2 d-flex flex-column justify-content-between float-left">
                            <div
                                class="rounded w-50 <?= $item["status"] == 1 ? "bg-primary" : ($item["status"] == 2 ? "bg-danger" : "bg-success") ?>">
                                <span class="ms-2 text-white">
                                    <?= $item["status"] == 1 ? "Open" : ($item["status"] == 2 ? "Close" : "Done") ?>
                                </span>
                            </div>
                            <div id="heart<?= $item['id'] ?>">
                                <img onclick="ChangeShow_View('En','heart<?= $item['id'] ?>')"
                                    src="FrontEnd/assets/Icons/heartnone2.png" alt="bug" class="ms-4 ">
                            </div>
                        </div>
                        <div class="col-1">
                            <?php
                            if (isset($_SESSION['USER_LOGED'])) {
                                $curUser = $_SESSION['USER_LOGED'];
                                if ($item["userId"] == $curUser['id'] || $curUser["roleId"] == 1) {
                                    ?>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false" style="background-color : #37517e">
                                            <i class="fas fa-cogs"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <button class="dropdown-item"
                                                    onclick="openEditPostModal('<?= $item['id'] ?>', '<?= $item['typeId'] ?>', '<?= $item['status'] ?>', `<?= $item['title'] ?>`, `<?= $item['content'] ?>`,'<?= $item['location'] ?>', '<?= $item['priceFrom'] ?>', '<?= $item['priceTo'] ?>')">Sửa
                                                    bài viết</button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" onclick="openDeleteModal(<?= $item['id'] ?>)">Xóa bài
                                                    viết</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        } ?>
        <nav aria-label="Page navigation example">
            <?php
            $check = $TotalRecords % 5 == 0;
            $page = intdiv($TotalRecords, 5);
            $page += $check ? 0 : 1;
            $i = 1;
            ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="/raovat/home?page=<?= $i == 1 ? $i : $i - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($i = 1; $i <= $page; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="/raovat/home?page=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                <?php } ?>
                <li class="page-item" disa>
                    <a class="page-link" href="/raovat/home?page=<?= $i > $page ? $i - 1 : $i ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Form tạo/Sửa -->
    <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/raovat/post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tạo bài đăng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form inside the modal -->
                        <input type="hidden" name="userId" value=<?= $_SESSION["USER_LOGED"]["id"] ?>>
                        <input type="hidden" name="IsCreate" id="postId" value="-1">
                        <div class="d-flex justify-content-between">
                            <label for="description" class="form-label ">Người đăng:
                                <strong>
                                    <?= $_SESSION["USER_LOGED"]["name"] ?>
                                </strong>
                            </label>
                            <label for="description" class="form-label ">Ngày đăng:
                                <strong>
                                    <?php
                                    $today = date("d-m-Y");
                                    echo $today . " " ?>
                                </strong>
                            </label>
                        </div>
                        <div class="mb-3 d-flex  mt-3">
                            <div class="me-2">
                                <label for="description" class="form-label">Loại bài đăng:</label>
                                <select class="selectpicker" id="typeId" name="typeId" data-live-search="true">
                                    <?php
                                    foreach ($Types as $type) {
                                        ?>
                                        <option value=<?= $type['id'] ?>><?= $type['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label for="description" class="form-label ms-5">Trạng thái:</label>
                                <select class="selectpicker" id="status" name="status" data-live-search="true">
                                    <option value=1 class="active">Open</option>
                                    <option value=2>Close</option>
                                    <option value=1>Done</option>
                                </select>

                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Content:</label>
                            <textarea class="form-control" id="content" name="content"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Địa điểm:</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3 d-flex">
                            <div>
                                <label for="name" class="form-label">Giá thấp nhất:</label>
                                <input type="number" class="form-control" id="price1" name="priceFrom">
                            </div>
                            <div class="ms-2">
                                <label for="name" class="form-label">Giá cao nhất:</label>
                                <input type="number" class="form-control" id="price2" name="priceTo">
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="buttonSend">Đăng ngay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Form xóa -->
    <div class="modal fade" id="DeletePostModal" tabindex="-1" role="dialog" aria-labelledby="DeletePostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeletePostModalLabel">Cảnh báo</h5>
                </div>
                <form id="deleteForm" action="/raovat/post" method="POST">
                    <div class="modal-body">
                        <label for="">Bạn muốn xóa bài viết</label>
                        <input type="hidden" id="delete" name="delete" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal('DeletePostModal')"
                            data-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-primary" onclick="saveChanges('DeletePostModal')"
                            value="OK">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function ChangeShow_View(type, Key) {
        console.log(Key)
        var DivImg = document.getElementById(Key);
        var newImage = document.createElement("img");
        // Thiết lập thuộc tính onclick
        if (type == "Dis")
            newImage.setAttribute("onclick", `ChangeShow_View('En','${Key}')`);
        else
            newImage.setAttribute("onclick", `ChangeShow_View('Dis','${Key}')`);

        // Thiết lập thuộc tính src
        if (type == "Dis")
            newImage.setAttribute("src", "FrontEnd/assets/Icons/heartnone2.png");
        else
            newImage.setAttribute("src", "FrontEnd/assets/Icons/hearRED.png");

        // Thiết lập thuộc tính alt
        newImage.setAttribute("alt", "bug");

        // Thêm lớp CSS
        newImage.classList.add("ms-4");
        DivImg.replaceChildren(newImage)
    }
    function openCreatePostModal() {
        // userId, un, name, sdt, roleId
        // alert(postId)
        document.getElementById('title').value = "";
        document.getElementById('content').value = "";
        document.getElementById('location').value = "";
        document.getElementById('price1').value = "";
        document.getElementById('price2').value = "";
        document.getElementById('postId').value = -1;
        document.getElementById('buttonSend').textContent = 'Đăng ngay';

        $('#myModal2').modal('show');
    }
    function openEditPostModal(postId, type, status, title, content, location, price1, price2) {
        // userId, un, name, sdt, roleId
        // alert(postId)
        document.getElementById('title').value = title;
        document.getElementById('content').value = content;
        document.getElementById('location').value = location;
        document.getElementById('price1').value = price1;
        document.getElementById('price2').value = price2;
        document.getElementById('typeId').value = type;
        document.getElementById('status').value = status;
        document.getElementById('postId').value = postId;
        document.getElementById('buttonSend').textContent = 'Hoàn tất';

        $('#myModal2').modal('show');
    }
    function openDeleteModal(postId) {
        document.getElementById('delete').value = postId;
        $('#DeletePostModal').modal('show');
    }
    function closeModal(Key) {
        $('#' + Key).modal('hide');
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>