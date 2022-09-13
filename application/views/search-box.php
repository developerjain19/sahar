<section class="cats-filters py-3">
<div class="container">

    <form action="<?= base_url('search') ?>" method="GET">
        <div class="row ">
            <div class="col-md-5">
                <input type="text" class="form-control serchbox radius" placeholder="What are you looking for?" name="company-name" />
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control serchbox" placeholder="Location" name="company-location" />
            </div>

            <div class="col-md-2">
                <div class="Goodup-single-drp small">
                    <div class="btn-group">
                        <button type="button" class="btn bg-dark text-light">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


</section>