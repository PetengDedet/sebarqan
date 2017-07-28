@extends('layouts.admin')
@section('page_title', 'Tambah Produk Baru')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/select2/select2.css')}}">
    <style>
        .dz-preview {
            width: 20%;
            float: left;
        }
        .dz-success-mark {
            width: 50%;
            float: left;
        }
        .dz-error-mark {
            width: 50%;
            float:left;
        }
        .dz-filename {
            width: 100%;
            overflow: hidden;
        }

    </style>
@endsection

@section('content')
    <div class="box">
        <div class="box-body">
            @if ($errors->any())
                <br>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('msg'))
                {!! Session::get('msg') !!}
            @endif

            <form method="post" action="" enctype="multipart/form-data">
                <div class="col-md-8">
                    <fieldset>
                        <legend>Product Details</legend>
                        <div class="form-group">
                            <label for="product_name" class="control-label">Nama Produk</label>
                            <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control" id="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_brand" class="control-label">Brand</label>
                            <input type="text" name="product_brand" value="{{old('product_brand')}}" class="form-control" id="product_brand">
                        </div>
                        <div class="form-group">
                            <label for="product_sku" class="control-label">SKU</label>
                            <input type="text" name="product_sku" value="{{old('product_sku')}}" class="form-control" id="product_sku" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description" class="control-label">Deskripsi</label>
                            <textarea name="product_description" class="form-control">{{old('product_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_weight" class="control-label">Wieght (in gram(s))</label>
                            <input type="number" name="product_weight" value="{{old('product_weight', '0')}}" class="form-control" min="0" step="0.1" id="product_weight">
                        </div>
                        <div class="form-group">
                            <label for="product_length" class="control-label">Length (in cm)</label>
                            <input type="number" name="product_length" value="{{old('product_length', '0')}}" class="form-control" min="0" step="0.1" id="product_length">
                        </div>
                        <div class="form-group">
                            <label for="product_width" class="control-label">Width (in cm)</label>
                            <input type="number" name="product_width" value="{{old('product_width', '0')}}" class="form-control" min="0" step="0.1" id="product_width">
                        </div>
                        <div class="form-group">
                            <label for="product_height" class="control-label">Height (in cm)</label>
                            <input type="number" name="product_height" value="{{old('product_height', '0')}}" class="form-control" min="0" step="0.1" id="product_height">
                        </div>
                    </fieldset>
                    <br>
                    <br>
                    <fieldset>
                        <legend>Categories</legend>
                        <div class="form-group">
                            <label for="product_category[]" class="control-label">Kategori</label>
                            <select name="product_category[]" class="form-control" required>
                                @forelse($category as $k => $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_category[]" class="control-label">Secondary Kategori</label>
                            <select name="product_category[]" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @forelse($category as $k => $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_tags" class="control-label">Tags</label>
                            <input type="text" name="product_tags" class="form-control" id="product_tags">
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="product_featured" value="1"> Featured
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="product_hot_deal" value="1"> Hot Deal
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="product_new" value="1"> New
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="product_recommended" value="1"> Recommended
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="peoduct_allow_pre_order" value="1"> Allow Pre-Order
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="peoduct_ignore_stock" value="1"> Ignore Stock
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <br>


                    <fieldset>
                        <legend>Personalisasi</legend>
                        <div class="form-group">
                            @forelse($personalisasi as $k => $v)
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="product_personalisasi[]" value="{{$v->id}}">{{title_case($v->jenis)}} - {{title_case($v->name)}} &nbsp;
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                <em>Belum ada personalisasi</em>
                            @endforelse
                        </div>
                    </fieldset>
                    <br>
                    <br>

                    <fieldset>
                        <legend>Price</legend>
                        <div class="form-group">
                            <label for="product_price" class="control-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">Rp. </span>
                                <input type="number" name="product_price" value="{{old('product_price', '0')}}" class="form-control" min="0" step="1"  aria-describedby="sizing-addon2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_sale_price" class="control-label">Sale Price</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">Rp. </span>
                                <input type="number" name="product_sale_price" value="{{old('product_sale_price', '0')}}" class="form-control" min="0" step="1"  aria-describedby="sizing-addon2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_sale_period" class="control-label">Sale Price Datetime</label>
                            <div class="input-group">
                                <input type="text" name="product_sale_period" value="{{old('product_sale_period')}}" class="form-control date" id="product_sale_period">
                                <span type="button" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <br>

                    <fieldset>
                        <legend>Stock</legend>
                        <div class="form-group">
                            <label for="product_stock" class="control-label">Stok</label>
                            <div class="input-group">
                                <input type="number" name="product_stock" value="{{old('product_stock', '0')}}" class="form-control" min="0" step="1"  aria-describedby="sizing-addon2">
                                <span class="input-group-addon" id="sizing-addon2">Item</span>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <br>


                    <fieldset>
                        <legend>Gambar</legend>
                        <div class="form-group">
                            <label for="product_picture" class="control-label">Gambar</label>
                            <div type="button" class="panel panel-default" >
                                <div class="panel-body" id="product_picture" style="width: 100%;background: #fdfdfd;border:2px dashed #8eb4cb;min-height: 250px;cursor: pointer;">

                                </div>
                            </div>
                        </div>
                        <div id="imagePathHolder">

                        </div>
                    </fieldset>
                    <br>
                    <br>

                    <fieldset>
                        <legend>SEO</legend>
                        <div class="form-group">
                            <label for="product_page_title" class="control-label">Page Title</label>
                            <input type="text" name="product_page_title" value="{{old('product_page_title')}}" class="form-control" id="product_page_title">
                        </div>
                        <div class="form-group">
                            <label for="product_meta_description" class="control-label">Meta Description</label>
                            <input type="text" name="product_meta_description" value="{{old('product_meta_description')}}" class="form-control" id="product_meta_description">
                        </div>
                        <div class="form-group">
                            <label for="product_meta_keywords" class="control-label">Meta Keywords</label>
                            <input type="text" name="product_meta_keywords" value="{{old('product_meta_keywords')}}" class="form-control" id="product_meta_keywords">
                        </div>
                        {{-- <div class="form-group">
                            <label for="product_slug" class="control-label">Slug</label>
                            <input type="text" name="product_slug" value="{{old('product_slug')}}" class="form-control" id="product_slug" required>
                        </div> --}}
                    </fieldset>

                    <fieldset>
                        <legend>Related Prduct</legend>
                        <div class="form-group">
                            <label for="related_product" class="control-label">Related Product</label>
                            <select name="related_product[]" class="form-control" id="related_product" multiple="multiple">
                                @foreach($product as $k => $v)
                                    <option value="{{$v->id}}">{{$v->brand . ' - ' . $v->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <br>
                    <br>
                    <fieldset>
                        <legend>Published?</legend>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="product_published" value="1"> Publish
                                </label>
                            </div>
                        </div>

                    </fieldset>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat pull-right">Simpan <i class="fa fa-save"></i> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
{{--    <script src="{{asset('assets/adminlte/plugins/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="{{asset('assets/adminlte/plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/select2/select2.full.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        $(document).ready(function(){
           $('#related_product').select2();

           $('#product_sale_period').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
            // "myAwesomeDropzone" is the camelized version of the HTML element's ID

            var productPicture = new Dropzone("#product_picture", {
                url: '{{url('admin/upload-product-picture')}}',
                paramName: "product_picture", // The name that will be used to transfer the file
                uploadMultiple: true,
                acceptedFiles: 'image/*',
                maxFilesize: 10, //MB,
                acceptedFiles: ".png,.jpg,.gif,.jpeg",
                addRemoveLink: true,
                success: function(file, response){
                    console.log(response);
                    if (response.status == 'success') {
                        $('#imagePathHolder').append('<input type="hidden" name="pictures[]" value="' + response.data + '">');
                    }else{
                        alert('Gagal mengupload');
                    }
                },
                init:function(){
                    var self = this;
                    // config
                    self.options.addRemoveLinks = true;
                    self.options.dictRemoveFile = 'Delete';
                    //New file added
                    self.on("addedfile", function (file) {
                        console.log('new file added ', file);
                    });
                    // Send file starts
                    self.on("sending", function (file) {
                        console.log('upload started', file);
                        $('.meter').show();
                    });

                    // File upload Progress
                    self.on("totaluploadprogress", function (progress) {
                        console.log("progress ", progress);
                        $('.roller').width(progress + '%');
                    });

                    self.on("queuecomplete", function (progress) {
                        $('.meter').delay(999).slideUp(999);
                    });

                    // On removing file
                    self.on("removedfile", function (file) {
                        console.log(file);
                    });
                }
            });
        });


        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
//            CKEDITOR.replace('product_description')
            //bootstrap WYSIHTML5 - text editor
            $('textarea').wysihtml5()
        })
    </script>
@endsection