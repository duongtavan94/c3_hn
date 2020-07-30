<div class="lotrinh">

    <div class="container">

        <div class="lt_title">

            <h2>

                {!! trans('home.trainghiem') !!}

            </h2>

            <p>{{ trans('home.cc') }}</p>

        </div>

        <div class="lt_form">

            <form action="{{ route('post_contact') }}" method="post">

                @csrf

                <div class="row">

                    <div class="">

                        <input type="text" class="form-control" name="name" placeholder="Họ tên học sinh*" required="">
                        <input type="number" class="form-control" name="phone" placeholder="Số điện thoại*" required="">
                        <input type="number" class="form-control" name="namsinh" placeholder="Năm sinh*" required="">
                        <input type="text" class="form-control" name="totnghiep" placeholder="Tốt nghiệp trường*" required="">
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ*" required="">
                        <input type="text" class="form-control" name="phuhuynh" placeholder="Họ tên phụ huynh*" required="">
                        <input type="number" class="form-control" name="phone2" placeholder="Số điện thoại*" required="">
                        <input type="email" class="form-control" name="email" placeholder="Email" style="margin-bottom: 10px">
                        
                            <label class="radio-inline">
                            <input type="radio" name="lop" checked value="Lớp học cơ bản">Lớp học cơ bản</label>
                            <label class="radio-inline">
                            <input type="radio" name="lop" value="Lớp học nâng cao">Lớp học nâng cao</label>

                        <button type="submit" class="btn btn-primary">{{ trans('home.gui') }}</button>

                    </div>

                </div>

                

            </form>

        </div>

    </div>

</div>