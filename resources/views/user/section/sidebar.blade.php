 <!-- START SIDEBAR-->
 <nav class="page-sidebar" id="sidebar">
     <div id="sidebar-collapse">
         <div class="admin-block d-flex">
             <div>
                 @if(auth()->user()->avatar != null)
                 <img src="{{ asset(auth()->user()->avatar) }}" width="45px" />
                 @else
                 <img src="{{ asset('assets/cms/img/admin-avatar.png')}}" width="45px" />
                 @endif
             </div>
             <div class="admin-info">
                 <div class="font-strong">{{auth()->user()->name}}</div>
                 <small>
                     {{ auth()->user()->member ? (auth()->user()->member->memberType ? auth()->user()->member->memberType->title : 'Membership') : 'Membership' }}
                 </small>

             </div>
         </div>
         <ul class="side-menu metismenu">
             <li class="">
                 <a class="active" href="{{ route('member.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                     <span class="nav-label">Dasboard</span>
                 </a>
             </li>
             <li class="heading">FEATURES</li>

             <li class="{{ ($_panel == 'Category' || $_panel == 'Blog') ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Content Management</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Posts') ? 'active' : '' }}" href="{{ route('member.blog.indexMemberPost')}}"><i class="sidebar-item-icon fa fa-clipboard"></i>Trail List</a>
                     </li>
                 </ul>
             </li>
             <li class="{{ ($_panel == 'Gallery' || $_panel == 'Video' ) ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                     <span class="nav-label">Media</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-3-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Gallery') ? 'active' : '' }}" href="{{ route('member.gallery.index')}}"><i class="sidebar-item-icon fa fa-picture-o"></i>Gallery</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Video') ? 'active' : '' }}" href="{{ route('member.video.index')}}"><i class="sidebar-item-icon fa fa-video-camera"></i>Video</a>
                     </li>
                 </ul>
             </li>
             <!-- <li class="{{ ($_panel == 'Staff') ? 'active' : '' }}">
                <a class="" href="{{ route('admin.staff.index')}}"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Staff</span>
                </a>
            </li> -->
             <li class="{{ ($_panel == 'Footer Setting' || $_panel == 'Setting' || $_panel == 'Social Profile' || $_panel == 'User Profile'  || $_panel == 'Language' ) ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                     <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Footer Setting' || $_panel == 'Setting') ? 'active' : '' }}" href="{{ route('member.setting.index')}}"><i class="sidebar-item-icon fa fa-cog"></i>Setting</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Social Profile') ? 'active' : '' }}" href="{{ URL::route('member.setting.social.index') }}"><i class="sidebar-item-icon fa fa-heart"></i>Social Link</a>
                     </li>

                     <li>
                         <a class="{{ ($_panel == 'User Profile') ? 'active' : '' }}" href="{{ route('member.user_profile.show')}}"><i class="sidebar-item-icon fa fa-user"></i>Profile & Security</a>
                     </li>
                 </ul>
             </li>

         </ul>
     </div>
 </nav>
 <!-- END SIDEBAR-->