@extends('admin.layouts.admin')

@section('title')
    index orders
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست سفارشات ({{ $orders->total() }})</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>وضعیت</th>
                            <th>مبلغ</th>
                            <th>نوع پرداخت</th>
                            <th>وضعیت پرداخت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <th>
                                    {{ $orders->firstItem() + $key }}
                                </th>
                                <th>
                                    {{ $order->user->name == null ? 'کاربر' : $order->user->name }}
                                </th>
                                <th>
                                    {{ $order->status }}
                                </th>
                                <th>
                                    {{ number_format($order->paying_amount) . ' تومان ' }}
                                </th>
                                <th>
                                    {{ $order->payment_type }}
                                </th>
                                <th
                                    class="{{ $order->getRawOriginal('payment_status') == 1 ? 'text-success' : 'text-danger' }}">
                                    {{ $order->payment_status }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-dark"
                                        href="{{ route('admin.orders.show', $order->id) }}">نمایش</a>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
