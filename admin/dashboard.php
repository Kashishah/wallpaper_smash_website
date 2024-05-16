<?php

include_once "includes/header.php";
include_once "includes/nav.php";
?>


<div class="container-fluid p-2">


    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-body">
                <p class="fs-3 fw-bolder">Categories list : </p>
                <table class="table table-striped w-50">
                    <tr class="">
                        <th>Name</th>
                        <th>Total Wallpapers</th>
                    </tr>
                    <tr>
                        <td>Cars</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>Bikes</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Animals</td>
                        <td>7</td>
                    </tr>
                </table>
            </div>


            <div class="card-footer">

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Category
                </button>

                <!-- Modal Start-->
                <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="category-form" class="card-body">
                                    <form>
                                        <div class="mb-3 text-uppercase">
                                            <label for="category" class="form-label">Add new category</label>
                                            <input type="text" class="form-control" id="category" name="category"
                                                required>
                                            <span id="feedback-category" class="text-capitalize"></span>
                                        </div>
                                        <button id="category-submit-btn" type="submit"
                                            class="category-btn-bg category-btn-txt  btn text-center w-100">SUBMIT
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back to the
                                    dashboard</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal end -->




                <!-- Toast container start -->
                <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
                    aria-atomic="true" id="liveToast">
                    <div class="d-flex">
                        <div class="toast-body ">
                            Inserted Successfully
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                <!-- Toast container end -->

            </div>
        </div>
    </div>
</div>




<script>

    $('#category-submit-btn').on('click', function (e) {
        e.preventDefault();
        const categoryInput = $('#category').val();
        if (categoryInput.trim() !== '') {
            $('#feedback-category').text('').removeClass('text-danger');
            const toastLiveExample = $('#liveToast');
            const toastBootstrap = new bootstrap.Toast(toastLiveExample);
            toastBootstrap.show();

            const modal = $('#staticBackdrop');
            const modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();
        }
        else {
            $('#feedback-category').text('Please enter a valid text').addClass('alert text-danger');
        }
    });

</script>



</body>