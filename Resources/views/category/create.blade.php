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
                        <h3 class="card-title">افزودن دسته بندی</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('BlogCategory.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="title" class="form-label">عنوان دسته بندی</label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{ old('title') }}">
                                <div class="invalid-feedback">لطفا عنوان دسته بندی را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">نامک</label>
                                <input type="text" name="slug" class="form-control" id="slug" required value="{{ old('slug') }}">
                                <div class="invalid-feedback">لطفا نامک را وارد کنید</div>
                            </div>
                            <div class="col-md-12">
                                <label for="banner" class="form-label">بنر</label>
                                <input type="file" name="banner" class="form-control" id="banner" required accept="image/*">
                                <div class="invalid-feedback">لطفا بنر را وارد کنید</div>
                            </div>



                            <div class="col-md-6">
                                <label for="page_title" class="form-label">عنوان صفحه</label>
                                <input type="text" name="page_title" class="form-control" id="page_title" value="{{ old('page_title') }}">
                                <div class="invalid-feedback">لطفا عنوان صفحه را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_keywords" class="form-label">کلمات کلیدی</label>
                                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords') }}">
                                <div class="invalid-feedback">لطفا کلمات کلیدی را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description" class="form-label">توضیحات سئو</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description') }}">
                                <div class="invalid-feedback">لطفا توضیحات سئو را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="canonical" class="form-label">Canonical</label>
                                <input type="text" name="canonical" class="form-control ltr text-left" id="canonical" value="{{ old('canonical') }}">
                                <div class="invalid-feedback">لطفا Canonical را وارد کنید</div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="schema" class="form-label">Schema</label>
                                <textarea type="text" name="schema" class="form-control ltr text-left" id="schema" rows="5">{{ old('schema') }}</textarea>
                                <div class="invalid-feedback">لطفا Schema را وارد کنید</div>
                            </div>




                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->


    </div>
@endsection
