@extends('admin.layouts.admin')

@section('title')
    index attributes
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست کامنت ها ({{ $comments->total() }})</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>نام محصول</th>
                            <th>متن کامنت</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $comment)
                            <tr>
                                <th>
                                    {{ $comments->firstItem() + $key }}
                                </th>
                                <th>
                                    {{ $comment->user->name == null ? $comment->user->cellphone : $comment->user->name }}
                                </th>

                                <th>
                                    <a href="{{ route('admin.products.show', $comment->product->id) }}">
                                        {{ $comment->product->name }}
                                    </a>
                                </th>

                                <th>
                                    {{ mb_substr($comment->text, 0, 10, 'UTF8') }} ...
                                </th>

                                <th class="{{ $comment->getRawOriginal('approved') ? 'text-success' : 'text-danger' }}">
                                    {{ $comment->approved }}
                                </th>

                                <th>
                                    <a class="btn btn-sm btn-outline-dark"
                                        href="{{ route('admin.comments.show', $comment->id) }}">نمایش</a>
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger mt-2" type="submit">حذف</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
