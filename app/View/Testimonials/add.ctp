<div class="container-fluid sign_up_page">
    <h4>Thanks for using our service. We really appreciate if you say something about our service.</h4>
    <form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Testimonial</label>
            <div class="col-sm-4">
                <textarea name="data[Testimonial][testimonial]" class="form-control" required=""></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search">Submit</button>
                <a class="btn btn-primary btn_search" href="<?php echo $this->webroot;?>my_reports">Not Now. Thanks Anyway.</a>
            </div>
        </div>
    </form>
</div>