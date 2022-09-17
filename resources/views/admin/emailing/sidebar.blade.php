 <!-- Left-side section start -->
 <div class="col-lg-12 col-xl-3">
     <div class="user-body">
         <div class="p-20 text-center">
             <a href="{{ route('admin.emailCompose') }}" class="btn btn-danger">Compose</a>
         </div>
         <ul class="page-list nav nav-tabs flex-column" id="pills-tab" role="tablist">
             <li class="nav-item mail-section">
                 <a class="nav-link active" data-toggle="pill" href="{{route('admin.emailIndex',['inbox'])}}" role="tab">
                     <i class="icofont icofont-inbox"></i>
                     Inbox
                     <span class="label label-primary f-right">6</span>
                 </a>
             </li>
             <li class="nav-item mail-section">
                 <a class="nav-link" data-toggle="pill" href="#e-starred" role="tab">
                     <i class="icofont icofont-star"></i>
                     Starred
                 </a>
             </li>
             <li class="nav-item mail-section">
                 <a class="nav-link" data-toggle="pill" href="#e-drafts" role="tab">
                     <i class="icofont icofont-file-text"></i>
                     Drafts
                 </a>
             </li>
             <li class="nav-item mail-section">
                 <a class="nav-link" data-toggle="pill" href="{{route('admin.emailIndex',['sent'])}}" role="tab">
                     <i class="icofont icofont-paper-plane"></i>
                     Sent
                     Mail
                 </a>
             </li>
             <li class="nav-item mail-section">
                 <a class="nav-link" data-toggle="pill" href="{{route('admin.emailIndex',['trash'])}}" role="tab">
                     <i class="icofont icofont-ui-delete"></i>
                     Trash
                     <span class="label label-info f-right">30</span>
                 </a>
             </li>
         </ul>
         <ul class="p-20 label-list">
             <li>
                 <h5>
                     Labels
                 </h5>
             </li>
             <li>
                 <a class="mail-work" href="">Work</a>
             </li>
             <li>
                 <a class="mail-design" href="">Design</a>
             </li>
             <li>
                 <a class="mail-family" href="">Family</a>
             </li>
             <li>
                 <a class="mail-friends" href="">Friends</a>
             </li>
             <li>
                 <a class="mail-office" href="">Office</a>
             </li>
         </ul>
     </div>
 </div>
 <!-- Left-side section end -->
