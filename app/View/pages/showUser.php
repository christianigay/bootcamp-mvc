<!--Grid options-->
<section id="grid-options" class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?=$data['meta']['title'] ?? ''?></h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="show_user.php" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="image-cls avatar mr-1 avatar-xl pull-right">
                                        <img src="<?=$data['contents']->image_file?>" alt="avtar img holder">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Username</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="first-name" class="form-control" name="username" value="<?=$data['contents']->username ?? ''?>" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Password</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" id="first-name" class="form-control" name="password" value="<?=$data['contents']->password ?? ''?>" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Email</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="email" id="email-id" class="form-control" name="email" value="<?=$data['contents']->email ?? ''?>" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Mobile</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" id="contact-info" class="form-control" name="mobile" value="<?=$data['contents']->mobile ?? ''?>" placeholder="Mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInputFile">With Browse button</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="myFiles[]" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>