<!-- Delete Modal Box Start -->
<div class="modal fade theme-modal remove-coupon" id="deleteProduct" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header d-block text-center">
        <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="remove-box">
          <p>Note: this action cannot be undone</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
        <button
          @click="deleteProduct"
          type="button"
          class="btn btn-animation btn-md fw-bold"
          data-bs-target="#exampleModalToggle2"
          data-bs-toggle="modal"
          data-bs-dismiss="modal"
        >
          Yes
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade theme-modal remove-coupon" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="remove-box text-center">
          <div class="wrapper">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
              <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
              <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
          </div>
          <h4 class="text-content">It's Removed.</h4>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal Box End -->
