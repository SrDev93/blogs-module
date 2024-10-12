@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

    @include('blogs::category.partial.header')

    <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">ویرایش دسته بندی</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('BlogCategory.update', $BlogCategory->id) }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="title" class="form-label">نام دسته بندی</label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{ old('title', $BlogCategory->title) }}">
                                <div class="invalid-feedback">لطفا نام دسته بندی را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">نامک</label>
                                <input type="text" name="slug" class="form-control" id="slug" required value="{{ old('slug', $BlogCategory->slug) }}">
                                <div class="invalid-feedback">لطفا نامک را وارد کنید</div>
                            </div>
                            <div class="col-md-11">
                                <label for="banner" class="form-label">بنر</label>
                                <input type="file" name="banner" class="form-control" id="banner" @if(!$BlogCategory->banner) required @endif accept="image/*">
                                <div class="invalid-feedback">لطفا بنر را وارد کنید</div>
                            </div>
                            <div class="col-md-1">
                                @if($BlogCategory->banner)
                                    <label for="banner" class="form-label">بنر فعلی</label>
                                    <img src="{{ url($BlogCategory->banner) }}" style="max-width: 100%;">
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="page_title" class="form-label">عنوان صفحه</label>
                                <input type="text" name="page_title" class="form-control" id="page_title" value="{{ old('page_title', $BlogCategory->page_title) }}">
                                <div class="invalid-feedback">لطفا عنوان صفحه را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_keywords" class="form-label">کلمات کلیدی</label>
                                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords', $BlogCategory->meta_keywords) }}">
                                <div class="invalid-feedback">لطفا کلمات کلیدی را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description" class="form-label">توضیحات سئو</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description', $BlogCategory->meta_description) }}">
                                <div class="invalid-feedback">لطفا توضیحات سئو را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="canonical" class="form-label">Canonical</label>
                                <input type="text" name="canonical" class="form-control ltr text-left" id="canonical" value="{{ old('canonical', $BlogCategory->canonical) }}">
                                <div class="invalid-feedback">لطفا Canonical را وارد کنید</div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="schema" class="form-label">Schema</label>
                                <textarea type="text" name="schema" class="form-control ltr text-left" id="schema" rows="5">{{ old('schema', $BlogCategory->schema) }}</textarea>
                                <div class="invalid-feedback">لطفا Schema را وارد کنید</div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @csrf
                                @method('PATCH')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->


    </div>
@endsection
