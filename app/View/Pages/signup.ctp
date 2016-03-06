<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Sign Up</h1>
    <hr>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">First Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="First Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Second Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Last Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="" placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Nationality</label>
            <div class="col-sm-3">
                <!--<select class="input-medium bfh-countries" data-country="BD"></select>-->
    
                <div class="bfh-selectbox bfh-countries" data-country="BD" data-flags="true">
                    <input type="hidden" value="">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <input type="text" class="bfh-selectbox-filter">
                        <div role="listbox">
                            <ul role="option"></ul>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>

        <div class="form-group">
            <label for="" class=" col-sm-offset-3 col-sm-2 control-label">Gender</label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident Country</label>
            <div class="col-sm-3">
                <select class="input-medium bfh-countries form-control" data-country="BD"></select>
               <!--
                <div class="bfh-selectbox bfh-countries" data-country="US" data-flags="true">
                    <input type="hidden" value="">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <input type="text" class="bfh-selectbox-filter">
                        <div role="listbox">
                            <ul role="option"></ul>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">ID Document(s)</label>
            <div class="col-sm-3">
                <input type="file" class="form-control" id="" formenctype="multipart/form-data">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Email(s)</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="">
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-primary btn_search">Sign in</button>
            </div>
        </div>
    </form>
</div>