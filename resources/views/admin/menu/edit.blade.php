@extends('layouts.admin')
@section('title')
    Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4  text-primary">{{ $_panel }} Add</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route($_base_route . '.update', $data['menus']->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="ibox-body">
                    <div class="form-group col-md-12">
                        <?php
                        dm_menu_type_dropdown('', 'type', 'Menu Type', $data['type'], $data['menus']->type, $data['menus']->type);
                        if (isset($data['single_page']->title)) {
                            dm_post_dropdown('', 'page_unique_id', 'Pages', $data['pages'], $data['menus']->parameter, $data['single_page']->title);
                        }
                        if (isset($data['single_post']->title)) {
                            dm_post_dropdown('', 'post_unique_id', 'Posts', $data['posts'], $data['menus']->parameter, $data['single_post']->title);
                        }
                        if (isset($data['category']->title)) {
                            dm_category_dropdown('', 'category_id', 'Category', $data['categories'], $data['menus']->parameter, $data['category']->title);
                        }
                        if (isset($data['member_type']->title)) {
                            dm_membertype_dropdown('', 'branch_id', 'Member Type', $data['branch'], $data['menus']->parameter, $data['member_type']->title);
                        }
                        if (isset($data['member_subcategory']->name)) {
                            dm_membersubcategory_dropdown('', 'member_subcategory_id', 'Member Subcategory', $data['member_subcategories'], $data['menus']->parameter, $data['member_subcategory']->name);
                        }
                        dm_custom_link_hinput_update('text', 'link', 'Custom Link', $data['menus']->url);

                        dm_menu_hinput_update('text', 'name', 'Menu Name', $data['menus']->name); ?>

                        @foreach ($data['lang'] as $lang)
                            <?php
                            if (isset($menus_name[$loop->index]->name)) {
                                $menu_name = $menus_name[$loop->index]->name;
                            } else {
                                $menu_name = '';
                            }
                            dm_hidden('rows[' . $loop->index . '][lang_id]', $lang->id);
                            dm_menu_hinput_update('text', 'rows[' . $loop->index . '][lang_name]', "Menu Name (<strong>$lang->name</strong> )", $menu_name); ?>
                        @endforeach
                        <?php
                        dm_menu_dropdown('', 'target', 'Target', $data['target'], $data['menus']->target);
                        dm_hcheckbox('checkbox', 'status', 'Public', $data['menus']->status);
                        ?>
                    </div>

                    <!-- Begin Progress Bar Buttons-->
                    <a href="{{ route($_base_route . '.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i>
                        Back</a>
                    <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i
                            class="fa fa-paper-plane"></i> Submit </button>
                    <!-- End Progress Bar Buttons-->
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function menuTypeFunction() {
            var menu_type = document.getElementById("type").value;
            if (menu_type == "Page") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").show();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();
            } else if (menu_type === "Post") {
                $("#post_unique_id_Posts").show();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();

            } else if (menu_type === "Category") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").show();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();

            } else if (menu_type === "Institute Page") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").show();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();

            } else if (menu_type === "Faculty Page") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").show();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();

            } else if (menu_type === "Branch") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").show();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();
            } else if (menu_type === "Member Type") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").show();
                $("#member_subcategory_id_Member\\ Subcategory").hide();
            } else if (menu_type === "Member Subcategory") {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").hide();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").show();
            } else {
                $("#post_unique_id_Posts").hide();
                $("#category_id_Category").hide();
                $("#link_link").show();
                $("#page_unique_id_Pages").hide();
                $("#institute_unique_id_Institute").hide();
                $("#faculty_unique_id_Faculty").hide();
                $("#branch_id_Branch").hide();
                $("#branch_id_Member\\ Type").hide();
                $("#member_subcategory_id_Member\\ Subcategory").hide();
            }
        }

        // Initialize on page load
        $(document).ready(function() {
            menuTypeFunction();
            $('#type').change(function() {
                menuTypeFunction();
            });
        });
    </script>
@endsection
