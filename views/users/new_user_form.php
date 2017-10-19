<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ایجاد کاربر جدید</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">

                    <?=alert('تبریک! عملیات با موفقیت انجام شد','success'); ?>

                    <div class="form-group">
                        <label for="user_name">نام و تخلص</label>
                        <input type="text" name="user_name" class="form-control" id="user_name" placeholder="نام و تخلص" >
                    </div>

                    <div class="form-group">
                        <label for="user_email">ایمیل آدرس</label>
                        <input type="email" name="user_email" class="form-control" id="user_email" placeholder="ایمیل" >
                        <small class="help-block">ایمیل آدرس فقط یکبار قابل استفاده است و باید منحصر به فرد باشد.</small>
                    </div>

                    <div class="form-group">
                        <label for="user_pass">رمز عبور</label>
                        <input type="password" name="user_pass" class="form-control" id="user_pass" placeholder="رمز عبور" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">عکس پروفایل</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block"><small>ابعاد عکس 200 بر 200 پیکسل و حجم عکس کمتر از 150 کیلو بایت باشد.</small></p>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست کاربران</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>نام و تخلص</th>
                                <th>ایمیل آدرس</th>
                                <th>نوعیت حساب</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>احمد احمدی</td>
                                <td>email.domain.com</td>
                                <td><span class="badge bg-red">گارسن</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>علی رضا رضوی</td>
                                <td>email.domain.com</td>
                                <td><span class="badge bg-yellow">میز کانتر</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>کاظم کاظمی</td>
                                <td>email.domain.com</td>
                                <td><span class="badge bg-light-blue">مدیر</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>محمد میرزائی</td>
                                <td>email.domain.com</td>
                                <td><span class="badge bg-green">مدیر عمومی</span></td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>


</div>