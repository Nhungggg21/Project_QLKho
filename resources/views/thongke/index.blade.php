@extends('default')

<style>
    .nk-block {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    border-radius: 5px;
    padding: 8px;
}

.btn-primary {
    background-color: #6f42c1;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    border: none;
}

.btn-primary:hover {
    background-color: #5a32a3;
}

select.form-control {
    width: 150px;
}

.d-flex {
    display: flex;
    justify-content: space-between;
}

</style>
@section('content')
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Thống kê kho hàng</h2>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-gs">
                            <form action="{{ route('thong-ke.index') }}" method="GET">
                                @csrf
                                <div class="d-flex gap-2 align-items-center">
                                    <!-- Thời gian từ -->
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="Ngay_San_Xuat_From">Từ</label>
                                            <input type="date" class="form-control" name="Ngay_San_Xuat_From" value="{{ request('Ngay_San_Xuat_From', $from_date) }}">
                                        </div>
                                    </div>
                                            <!-- Thời gian đến -->
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="Ngay_San_Xuat_To">Đến</label>
                                            <input type="date" class="form-control" name="Ngay_San_Xuat_To" value="{{ request('Ngay_San_Xuat_To', $to_date) }}">
                                        </div>
                                    </div>  
                                    <!-- Lọc button -->
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Lọc</button>
                                </div>
                            </form>
                            <div class="card-inner">
                                
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã nguyên liệu</th>
                                                <th>Tên nguyên liệu</th>
                                                <th>Số lượng tồn</th>
                                                <th>Nhập</th>
                                                <th>Tổng giá trị nhập</th>
                                                <th>Xuất</th>
                                                <th>Tổng giá trị xuất</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nguyen_lieu as $key => $nl)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $nl->Ma_Nguyen_Lieu }}</td>
                                                    <td>{{ $nl->Ten_Nguyen_Lieu }}</td>
                                                    <td>{{ number_format($nl->So_Luong_Ton, 0, ',', '.') }}</td>
                                                    <td>{{$nl->tong_nhap}} </td>
                                                    <td>{{ number_format($nl->tong_gia_tri_nhap, 0, ',', '.') }} VNĐ</td>
                                                    <td>{{$nl->tong_xuat}}</td>
                                                    <td>{{ number_format($nl->tong_gia_tri_xuat, 0, ',', '.') }} VNĐ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
