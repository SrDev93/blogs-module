@extends('layouts.admin')

@push('stylesheets')
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
    @include('blogs::partial.header')
    <!-- PAGE-HEADER END -->

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">ویرایش مقاله</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <label for="title" class="form-label">دسته بندی</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($blog->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">لطفا دسته بندی را انتخاب کنید</div>
                            </div>
                            <div class="col-md-12">
                                <label for="tags" class="form-label">تگ ها</label>
                                <select name="tags[]" class="form-control select2" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" @if(in_array($tag->id, $blog_tags)) selected @endif>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">لطفا تگ ها را انتخاب کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{ $blog->title }}">
                                <div class="invalid-feedback">لطفا عنوان را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">نامک</label>
                                <input type="text" name="slug" class="form-control" id="slug" required value="{{ $blog->slug }}">
                                <div class="invalid-feedback">لطفا نامک را وارد کنید</div>
                            </div>
{{--                            <div class="col-md-12">--}}
{{--                                <label for="short_text" class="form-label">توضیح کوتاه</label>--}}
{{--                                <input type="text" name="short_text" class="form-control" id="short_text" value="{{ $blog->short_text }}" required>--}}
{{--                                <div class="invalid-feedback">لطفا توضیح کوتاه را وارد کنید</div>--}}
{{--                            </div>--}}

                            <div class="col-md-12">
                                <label for="editor1" class="form-label">متن</label>
                                <textarea id="editor1" name="body" class="cke_rtl" required>{{ $blog->body }}</textarea>
                                <div class="invalid-feedback">لطفا متن را وارد کنید</div>
                            </div>
                            <div class="col-md-5">
                                <label for="small_image" class="form-label">تصویر شاخص</label>
                                <input type="file" name="small_image" class="form-control" aria-label="تصویر شاخص" id="small_image" accept="image/*" @if(!$blog->small_image) required @endif>
                                <div class="invalid-feedback">لطفا یک تصویر انتخاب کنید</div>
                            </div>
                            <div class="col-md-1">
                                @if($blog->small_image)
                                    <label for="small_image" class="form-label">تصویر فعلی</label>
                                    <img src="{{ url($blog->small_image) }}" style="max-width: 50%;">
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="image" class="form-label">تصویر داخلی</label>
                                <input type="file" name="image" class="form-control" aria-label="تصویر شاخص" id="image" accept="image/*" @if(!$blog->image) required @endif>
                                <div class="invalid-feedback">لطفا یک تصویر انتخاب کنید</div>
                            </div>
                            <div class="col-md-1">
                                @if($blog->image)
                                    <label for="image" class="form-label">تصویر فعلی</label>
                                    <img src="{{ url($blog->image) }}" style="max-width: 50%;">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="alt" class="form-label">متن جایگزین تصویر شاخص</label>
                                <input type="text" name="image_alt" class="form-control" value="{{ $blog->image_alt }}">
                                <div class="invalid-feedback">لطفا متن جایگزین تصویر شاخص را وارد کنید</div>
                            </div>

                            <div class="col-md-11">
                                <label for="banner" class="form-label">بنر</label>
                                <input type="file" name="banner" class="form-control" aria-label="بنر" accept="image/*" @if(!$blog->banner) required @endif>
                                <div class="invalid-feedback">لطفا یک تصویر انتخاب کنید</div>
                            </div>
                            <div class="col-md-1">
                                @if($blog->banner)
                                    <label for="banner" class="form-label">بنر فعلی</label>
                                    <img src="{{ url($blog->banner) }}" style="max-width: 100%;">
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="page_title" class="form-label">عنوان صفحه</label>
                                <input type="text" name="page_title" class="form-control" id="page_title" value="{{ old('page_title', $blog->page_title) }}">
                                <div class="invalid-feedback">لطفا عنوان صفحه را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_keywords" class="form-label">کلمات کلیدی</label>
                                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}">
                                <div class="invalid-feedback">لطفا کلمات کلیدی را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description" class="form-label">توضیحات سئو</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description', $blog->meta_description) }}">
                                <div class="invalid-feedback">لطفا توضیحات سئو را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="canonical" class="form-label">Canonical</label>
                                <input type="text" name="canonical" class="form-control ltr text-left" id="canonical" value="{{ old('canonical', $blog->canonical) }}">
                                <div class="invalid-feedback">لطفا Canonical را وارد کنید</div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="schema" class="form-label">Schema</label>
                                <textarea type="text" name="schema" class="form-control ltr text-left" id="schema" rows="5">{{ old('schema', $blog->schema) }}</textarea>
                                <div class="invalid-feedback">لطفا Schema را وارد کنید</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">بروزرسانی</button>
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

    @push('scripts')
        @include('ckfinder::setup')
        <script>
            var editor = CKEDITOR.replace('editor1', {
                // Define the toolbar groups as it is a more accessible solution.
                toolbarGroups: [
                    {
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    },
                    {   "name": 'paragraph',
                        "groups": ['list', 'blocks', 'align', 'bidi']
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
            });
            CKFinder.setupCKEditor( editor );
        </script>

    @endpush
@endsection
