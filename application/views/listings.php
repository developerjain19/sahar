<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <div class="clearfix"></div>

    <?php include 'search-box.php' ?>
    <div class="clearfix"></div>

    <section class="gray py-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="bg-white rounded mb-4">
                        <?php include 'filter.php' ?>
                        
                    </div>

                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                    <!-- row -->
                    <div class="row justify-content-center g-2">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="d-block grouping-listings">
                                <div class="d-block grouping-listings-title">
                                    <h5 class="ft-medium mb-3">Listing Results</h5>
                                </div>


                                <?php
                                if ($listing != '') {
                                    foreach ($listing as $row) {
                                        $state = getRowById('tbl_state', 'state_id', $row['company_state']);

                                        $cate = getRowById('company_category', 'cate_id', $row['company_category']);
                                        $subcate = getRowById('company_subcategory', 'subcat_id', $row['company_subcategory']);
                                ?>
                                        <div class="grouping-listings-single">
                                            <div class="vrt-list-wrap">
                                                <div class="vrt-list-wrap-head row">
                                                    <div class="vrt-list-thumb col-sm-2">
                                                        <a href="<?= base_url() ?>listing/<?= url_title($row['company_city']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>">
                                                            <div class="vrt-list-thumb-figure">
                                                                <?php if ($row['company_logo']  != '') { ?>
                                                                    <img src="<?= base_url() ?>uploads/company/<?= $row['company_logo'] ?>" class="img-fluid imglogo" alt="<?= $row['company_name'] ?>" style="object-fit: contain;"/>
                                                                <?php
                                                                } else {
                                                                    echo '<img src="' . base_url() . 'assets/images/user_logo.png" class="img-fluid imglogo" alt="Sahar Directory" style="object-fit: contain;" />';
                                                                }
                                                                ?>
                                                            </div>
                                                        </a>

                                                    </div>
                                                    <div class="vrt-list-content col-sm-8">
                                                        <div class="flex">
                                                            <h4 class="mb-0 ft-medium"><a href="<?= base_url() ?>listing/<?= url_title($row['company_city']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>" class="text-dark fs-md"><?= $row['company_name'] ?><span class="verified-badge"><i class="fas fa-check-circle"></i></span> </a></h4>
                                                            <p><a href="<?= base_url() ?>listing/<?= url_title($row['company_city']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>" class="btn btn-danger">View More</a></p>
                                                        </div>
                                                        <div class="Goodup-ft-first">
                                                            <div class="Goodup-rating">
                                                                <div class="Goodup-rates">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="vrt-list-features mt-2 mb-2">
                                                            <ul>
                                                                <li><a href="javascript:vo'listing'id(0);"><?= strtoupper($cate[0]['category']) ?></a></li>
                                                                <li><a href="javascript:void(0);"><?= strtoupper($subcate[0]['subcategory']) ?></a></li>

                                                            </ul>
                                                        </div>
                                                        <div class="vrt-list-sts">
                                                            <p class="vrt-qgunke"><span class="ft-bold d14ixh">Phone - </span> +91 <?= $row['company_contact'] ?> , <span class="ft-bold d14ixh">Mail @ - </span> <?= $row['company_email'] ?></p>
                                                        </div>
                                                        <div class="vrt-list-amenties">
                                                            <ul>

                                                                <li>
                                                                    <div><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $row['company_address'] ?> , <?= $row['pin_code'] ?>

                                                                        <?= $row['company_city'] ?>

                                                                        <?= $state[0]['state_name'] ?><span></div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                <?php
                                    }
                                } else {
                                    echo '<h3 class="text-danger">No Result Found</h3>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>
</div>

<?php include 'includes/footer-link.php' ?>