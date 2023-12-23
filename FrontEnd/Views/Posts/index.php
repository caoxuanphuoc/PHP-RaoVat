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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2">
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
            ?>
            <div class="card  me-5 mb-3 w-75">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">

                            <a href="/raovat/post?id=1" class="card-title">
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
                            <div class="rounded bg-danger w-50">
                                <span class="ms-2 text-white">Open</span>
                            </div>
                            <div id="heart<?= $item['id'] ?>">
                                <img onclick="ChangeShow_View('En','heart<?= $item['id'] ?>')"
                                    src="FrontEnd/assets/Icons/heartnone2.png" alt="bug" class="ms-4 ">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="background-color : #37517e">
                                    <i class="fas fa-cogs"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Thứ tự gốc</a></li>
                                    <li><a class="dropdown-item" href="#">Bảng chữ cái</a></li>
                                    <li><a class="dropdown-item" href="#">Quá trình học</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        } ?>

    </div>

    <!-- Tạo danh mục-------- -->

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="../../Src/Controllers/TypePostController.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form inside the modal -->
                        <input type="hidden" name="action" value="Create">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" id="description" name="des"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Form tạo -->
    <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="BackEnd/Controllers/PostController.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tạo bài đăng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form inside the modal -->
                        <input type="hidden" name="action" value="Create">
                        <div class="mb-3 d-flex ">
                            <div>

                                <label for="description" class="form-label">Loại bài đăng:</label>
                                <select class="selectpicker" id="cars" name="typeId" data-live-search="true">
                                    <option value=1>Volvo</option>
                                    <option value=2>Saab</option>
                                    <option value=3>Mercedes</option>
                                    <option value=4>Audi</option>
                                </select>
                            </div>
                            <div>
                                <label for="description" class="form-label ms-5">Người đăng:
                                    <?= $_SESSION["USER_LOGED"]["name"] ?>
                                </label>
                                <input type="hidden" name="userId" value=<?= $_SESSION["USER_LOGED"]["id"] ?>>

                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="na1me" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Content:</label>
                            <textarea class="form-control" id="descriptio1n" name="content"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Địa điểm:</label>
                            <input type="text" class="form-control" id="Local" name="location">
                        </div>
                        <div class="mb-3 d-flex">
                            <div>
                                <label for="name" class="form-label">Giá thấp nhất</label>
                                <input type="text" class="form-control" id="price1" name="priceFrom">
                            </div>
                            <div class="ms-2">
                                <label for="name" class="form-label">Giá cao nhất</label>
                                <input type="text" class="form-control" id="price2" name="priceTo">
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Đăng ngay</button>
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
</script>