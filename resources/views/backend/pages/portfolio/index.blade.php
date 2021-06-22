@extends('backend.layouts.master')

@section('title')
    Portfolio - Atiqur Rahman
@endsection

@section('admin-page-content')
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">মহল্লা/ব্লক/রাস্তা  ওয়ার্ড</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="block_id" class="form-main" action="{{ route('admin.blocks.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=pourosova_id">ওয়ার্ড নাম সিলেক্ট করুন</label>
                                        <select name="ward_id" id="ward_id" class="form-control">
                                            <option value="">ওয়ার্ড নাম সিলেক্ট করুন</option>
                                            @foreach(App\Models\Ward::all() as $ward)
                                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row " id="dynamic_field">
                                    {{--<div class="form-group col-md-8 col-sm-12 dup-block">
                                        <label for="name">মহল্লা/ব্লক/রাস্তা এর নাম</label>
                                        <input type="text" class="form-control" id="name" name="name[]" placeholder="ওয়ার্ড এর নাম দিন">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <a class="btn btn-primary add-more">Add</a>
                                    </div>--}}
                                    <div class="form-group col-md-8 col-sm-12">
                                        <label for="name">মহল্লা/ব্লক/রাস্তা এর নাম</label>
                                        <input type="text" name="name[]" placeholder="মহল্লা/ব্লক/রাস্তা এর নাম দিন" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <button type="button" name="add" id="add" class="btn btn-info button-more"><i class="fa fa-plus-circle"></i></button>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                                    <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Primary table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">মহল্লা/ব্লক/রাস্তা</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="#bd-example-modal-lg" data-toggle="modal" data-target=".bd-example-modal-lg">নতুন মহল্লা/ব্লক/রাস্তা</a>
                        </p>
                        <div class="data-tables datatable-primary">
                            <table id="dataTable2" class="text-center">
                                <thead class="text-capitalize">
                                <tr>
                                    <th width="5%">সিরিয়াল</th>
                                    <th width="10%">ওয়ার্ডের নাম</th>
                                    <th width="10%">মহল্লা/ব্লক/রাস্তা</th>
                                    <th width="10%">সংযুক্ত করেছেন</th>
                                    <th width="10%">হালনাগাদ করেছেন</th>
                                    <th width="20%">হালনাগাদ করার তারিখ</th>
                                    <th width="20%">সংযুক্ত করার তারিখ</th>
                                    <th width="15%">অ্যাকশন</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($blocks as $block)
                                    <tr>
                                        <td>{{ Converter::en2bn($loop->index+1) }}</td>
                                        <td>{{ $block->name }}</td>
                                        @php
                                            $ward = App\Models\Ward::where('id', $block->ward_id)->latest()->first();
                                        @endphp
                                        <td>{{ $ward->name }}</td>
                                        <td>{{ $block->added_by }}</td>
                                        <td>{{ $block->updated_by }}</td>
                                        <td>{{ Converter::en2bn($block->updated_at) }}</td>
                                        <td>{{ Converter::en2bn($block->created_at) }}</td>

                                        <td>
                                            <a class="btn btn-success text-white" href="{{ route('admin.blocks.edit', $block->id) }}">Edit</a>
                                            <a href="#deleteModal-{{ $block->id }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $block->id }}">Delete</a>

                                            <!-- Modal -->
                                            {{--<a class="btn btn-danger text-white" href="{{ route('admin.wards.destroy', $ward->id) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $ward->id }}').submit();">
                                                Delete
                                            </a>

                                            <form id="delete-form-{{ $ward->id }}" action="{{ route('admin.wards.destroy', $ward->id) }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>--}}
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteModal-{{ $block->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ডিলিটের অনুমতি !!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    আপনি কি মহল্লা/ব্লক/রাস্তা ডিলিট করতে চাচ্ছেন ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                                                    <form action="{{ route('admin.blocks.destroy', $block->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger">ডিলিট</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Primary table end -->
            <!-- data table end -->

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div class="form-group col-md-8 col-sm-12" id="row'+i+'">' +
                    '<label for="name">মহল্লা/ব্লক/রাস্তা এর নাম</label>'+

                    '<input type="text" name="name[]" placeholder="মহল্লা/ব্লক/রাস্তা এর নাম দিন" class="form-control" />' +
                    '</div>' +
                    '</div>'+
                    '<div class="form-group col-md-4 col-sm-12" id="row2'+i+'">'+
                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove button-more">X</button>' +
                    '</div>'
                );
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
                $('#row2'+button_id+'').remove();
            });
        });
    </script>
@endsection
