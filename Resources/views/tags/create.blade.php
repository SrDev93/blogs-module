@extends('layouts.admin')

@push('stylesheets')

@endpush

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
    @include('blogs::tags.partial.header')
        <!-- PAGE-HEADER END -->

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">افزودن تگ</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{ old('title') }}">
                                <div class="invalid-feedback">لطفا عنوان را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">نامک</label>
                                <input type="text" name="slug" class="form-control" id="slug" required value="{{ old('slug') }}">
                                <div class="invalid-feedback">لطفا نامک را وارد کنید</div>
                            </div>
                            <div class="col-md-12">
                                <label for="banner" class="form-label">بنر</label>
                                <input type="file" name="banner" class="form-control" accept="image/*">
                                <div class="invalid-feedback">لطفا بنر را انتخاب کنید</div>
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


                            <div class="row-divider"></div>
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
