 <!-- START SIDEBAR-->
 <nav class="page-sidebar" id="sidebar">
     <div id="sidebar-collapse">
         <div class="admin-block d-flex">
             <div>
                 @if (isset($all_view['setting']->site_name))
                     @if ($all_view['setting']->logo)
                         <img src="{{ asset($all_view['setting']->logo) }}" width="45px" />
                     @else
                         <img src="{{ asset('assets/cms/img/admin-avatar.png') }}" width="45px" />
                     @endif
                 @endif
             </div>
             <div class="admin-info">
                 <div class="font-strong">{{ auth()->user()->name }}</div>
                 <small>{{ ucfirst(auth()->user()->role) }}</small>
             </div>
         </div>
         <ul class="side-menu metismenu">
             <li class="">
                 <a class="active" href="{{ route('admin.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                     <span class="nav-label">Dasboard</span>
                 </a>
             </li>
             <li class="heading">FEATURES</li>
             <li
                 class="{{ $_panel == 'Destination' || $_panel == 'Transport' || $_panel == 'Hashtag' || $_panel == 'Experience' || $_panel == 'Cultural' || $_panel == 'Difficult' || $_panel == 'Season' || $_panel == 'Category' || $_panel == 'Post Category' ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-briefcase"></i>
                     <span class="nav-label">Main Setup</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ $_panel == 'Category' ? 'active' : '' }}"
                             href="{{ route('admin.blogcategory.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Trail Category</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Post Category' ? 'active' : '' }}"
                             href="{{ route('admin.postcategory.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Post Category</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Season' ? 'active' : '' }}"
                             href="{{ route('admin.season.index') }}"><i class="sidebar-item-icon fa fa-briefcase"></i>
                             Season</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Difficult' ? 'active' : '' }}"
                             href="{{ route('admin.difficult.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Difficult</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Experience' ? 'active' : '' }}"
                             href="{{ route('admin.experience.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Experience</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Cultural' ? 'active' : '' }}"
                             href="{{ route('admin.cultural.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Cultural</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Transport' ? 'active' : '' }}"
                             href="{{ route('admin.transport.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Transport</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Destination' ? 'active' : '' }}"
                             href="{{ route('admin.destination.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Destination</a>
                     </li>
                 </ul>
             </li>
             <li
                 class="{{ $_panel == 'Clients' || $_panel == 'Video' || $_panel == 'Gallery' || $_panel == 'Faq' || $_panel == 'AchieveMent' || $_panel == 'Banner' || $_panel == 'Popup' || $_panel == 'Carrers' || $_panel == 'Types' ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-briefcase"></i>
                     <span class="nav-label">Accessories</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ $_panel == 'AchieveMent' ? 'active' : '' }}"
                             href="{{ route('admin.achievement.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i>Achievements</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Banner' ? 'active' : '' }}"
                             href="{{ route('admin.banner.index') }}"><i
                                 class="sidebar-item-icon fa fa-slideshare"></i>Banner</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Faq' ? 'active' : '' }}" href="{{ route('admin.faq.index') }}"><i
                                 class="sidebar-item-icon fa fa-question-circle"></i>Faq</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Gallery' ? 'active' : '' }}"
                             href="{{ route('admin.gallery.index') }}"><i
                                 class="sidebar-item-icon fa fa-picture-o"></i>Gallery</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Video' ? 'active' : '' }}"
                             href="{{ route('admin.video.index') }}"><i
                                 class="sidebar-item-icon fa fa-video-camera"></i>Video</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Service' ? 'active' : '' }}"
                             href="{{ route('admin.our_service.index') }}"><i
                                 class="sidebar-item-icon fa fa-slideshare"></i>What We Do ? </a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Clients' ? 'active' : '' }}"
                             href="{{ route('admin.clients.index') }}"><i
                                 class="sidebar-item-icon fa fa-handshake-o"></i>Partners</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Popup' ? 'active' : '' }}"
                             href="{{ route('admin.popup.index') }}"><i
                                 class="sidebar-item-icon fa fa-window-maximize"></i>Popup</a>
                     </li>
                 </ul>
             </li>
             <li
                 class="{{ $_panel == 'Member Type' || $_panel == 'Member Subcategory' || $_panel == 'Member' || $_panel == 'Payment' || $_panel == 'Admin User' ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                     <span class="nav-label">Member List</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ $_panel == 'Member Type' ? 'active' : '' }}"
                             href="{{ route('admin.member_type.index') }}"><i
                                 class="sidebar-item-icon fa fa-briefcase"></i> Member Type</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Member Subcategory' ? 'active' : '' }}"
                             href="{{ route('admin.member_subcategory.index') }}"><i
                                 class="sidebar-item-icon fa fa-tags"></i> Member Subcategory</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Admin User' ? 'active' : '' }}"
                             href="{{ route('admin.users.index') }}"><i class="sidebar-item-icon fa fa-users"></i>User
                             List</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Member' ? 'active' : '' }}"
                             href="{{ route('admin.member.index') }}"><i
                                 class="sidebar-item-icon fa fa-users"></i>Member List</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Payment' ? 'active' : '' }}"
                             href="{{ route('admin.payment.index') }}"><i
                                 class="sidebar-item-icon fa fa-money"></i>Payment List</a>
                     </li>

                 </ul>
             </li>
             <li
                 class="{{ $_panel == 'Blog' || $_panel == 'Other Post' || $_panel == 'Section' || $_panel == 'Posts' || $_panel == 'Pages' || $_panel == 'Demand' || $_panel == 'Programs' || $_panel == 'Counter' ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Content Management</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ $_panel == 'Posts' ? 'active' : '' }}"
                             href="{{ route('admin.blog.index') }}"><i
                                 class="sidebar-item-icon fa fa-clipboard"></i>Trail List</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Pages' ? 'active' : '' }}" href="{{ route('admin.page.index') }}">
                             <i class="sidebar-item-icon fa fa-file-o"></i>Pages</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Other Post' ? 'active' : '' }}"
                             href="{{ route('admin.otherpost.index') }}"> <i
                                 class="sidebar-item-icon fa fa-file-o"></i>Other Post</a>
                     </li>
                 </ul>
             </li>
             <li
                 class="{{ $_panel == 'Branch' || $_panel == 'Staff' || $_panel == 'Previous Committee' ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Office</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ $_panel == 'Branch' ? 'active' : '' }}"
                             href="{{ route('admin.branch.index') }}"><i
                                 class="sidebar-item-icon fa fa-clipboard"></i>Branch Office</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Staff' ? 'active' : '' }}"
                             href="{{ route('admin.staff.index') }}"> <i
                                 class="sidebar-item-icon fa fa-file-o"></i>Staff</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Previous Committee' ? 'active' : '' }}"
                             href="{{ route('admin.previous-committee.index') }}"> <i
                                 class="sidebar-item-icon fa fa-file-o"></i>Previous Committee</a>
                     </li>
                 </ul>
             </li>
             <li class="{{ $_panel == 'Menus' ? 'active' : '' }}">
                 <a class="" href="{{ route('admin.menu.index') }}"><i
                         class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Menus</span>
                 </a>
             </li>
             <li
                 class="{{ $_panel == 'Setting' || $_panel == 'Social Profile' || request()->is('admin/user_profile*') || $_panel == 'Language' ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                     <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ $_panel == 'Setting' ? 'active' : '' }}"
                             href="{{ route('admin.setting.index') }}"><i
                                 class="sidebar-item-icon fa fa-cog"></i>Setting</a>
                     </li>
                     <li>
                         <a class="{{ $_panel == 'Social Profile' ? 'active' : '' }}"
                             href="{{ URL::route('admin.setting.social.index') }}"><i
                                 class="sidebar-item-icon fa fa-heart"></i>Social Link</a>
                     </li>

                     <li>
                         <a class="{{ request()->is('admin/user_profile*') ? 'active' : '' }}"
                             href="{{ route('admin.user_profile.show') }}"><i
                                 class="sidebar-item-icon fa fa-user"></i>Profile & Security</a>
                     </li>

                 </ul>
             </li>
             <li>
                 <a class="{{ request()->is('admin/subscribed-mail') ? 'active' : '' }}"
                     href="{{ route('admin.subscribed_mail') }}"><i
                         class="sidebar-item-icon fa fa-users"></i>Subscribed Email</a>
             </li>

         </ul>
     </div>
 </nav>
 <!-- END SIDEBAR-->
