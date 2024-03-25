@extends('admin.layouts.admin')

@section('title')
    show comment
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">کامنت</h5>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام کاربر</label>
                    <input class="form-control" type="text" value="{{ $comment->user->name == null ? $comment->user->cellphone : $comment->user->name }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>نام محصول</label>
                    <input class="form-control" type="text" value="{{ $comment->product->name }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $comment->approved }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($comment->created_at) }}" disabled>
                </div>

                <div class="form-group col-md-12">
                    <label>متن کامنت</label>
                    <textarea class="form-control" rows="3" disabled>{{ $comment->text }}</textarea>
                </div>

            </div>
            <a href="{{ route('admin.comments.index') }}" class="btn btn-dark mt-5">بازگشت</a>
            @if ($comment->getRawOriginal('approved'))
                <a style="float: left" href="{{ route('admin.comments.change-approve' , $comment->id) }}" class="btn btn-danger mt-5">عدم تایید</a>
            @else
                <a style="float: left" href="{{ route('admin.comments.change-approve' , $comment->id) }}" class="btn btn-success mt-5">تایید</a>
            @endif
        </div>
    </div>
@endsection
