<!--start overlay-->
<div class="search-overlay"></div>
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

<footer class="page-footer">
    <p class="mb-0">Copyright © {{ date('Y') }}. All right reserved.</p>
</footer>


<div class="modal animate__animated animate__pulse" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" action="" method="post" id="removeForm">
                {{-- <div class="modal-body">
                    <p></p>
                </div> --}}
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger delete-confirm">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

