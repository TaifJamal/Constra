<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon ">
            {{--  <i class="fas fa-laugh-wink"></i>  --}}
            <i class="fas fa-business-time"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Client -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseclinet"
            aria-expanded="true" aria-controls="collapseclinet">
            {{--  <i class="fas fa-fw fa-cog"></i>  --}}
            <i class="fas fa-users-cog"></i>
            <span>Client</span>
        </a>
        <div id="collapseclinet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.clients.index') }}">all client</a>
                <a class="collapse-item" href="{{ route('admin.clients.create') }}">add client</a>
                <a class="collapse-item" href="{{ route('admin.clients.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Fact -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFact"
            aria-expanded="true" aria-controls="collapseFact">
            {{--  <i class="fas fa-fw fa-cog"></i>  --}}
            <i class="fas fa-users-cog"></i>
            <span>Fact</span>
        </a>
        <div id="collapseFact" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.facts.index') }}">all fact</a>
                <a class="collapse-item" href="{{ route('admin.facts.create') }}">add fact</a>
                <a class="collapse-item" href="{{ route('admin.facts.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Image -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImage"
            aria-expanded="true" aria-controls="collapseImage">
            {{--  <i class="fas fa-fw fa-cog"></i>  --}}
            <i class="fas fa-users-cog"></i>
            <span>Image</span>
        </a>
        <div id="collapseImage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.images.index') }}">all image</a>
                <a class="collapse-item" href="{{ route('admin.images.create') }}">add image</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenu"
            aria-expanded="true" aria-controls="collapseMenu">
            <i class="fas fa-users-cog"></i>
            <span>Menu</span>
        </a>
        <div id="collapseMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.menus.index') }}">all menu</a>
                <a class="collapse-item" href="{{ route('admin.menus.create') }}">add menu</a>
                <a class="collapse-item" href="{{ route('admin.menus.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Post -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepost"
            aria-expanded="true" aria-controls="collapsepost">
            <i class="fas fa-users-cog"></i>
            <span>Post</span>
        </a>
        <div id="collapsepost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.posts.index') }}">all post</a>
                <a class="collapse-item" href="{{ route('admin.posts.create') }}">add post</a>
                <a class="collapse-item" href="{{ route('admin.posts.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Price -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrice"
            aria-expanded="true" aria-controls="collapsePrice">
            <i class="fas fa-users-cog"></i>
            <span>Pricing</span>
        </a>
        <div id="collapsePrice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.pricings.index') }}">all pricing</a>
                <a class="collapse-item" href="{{ route('admin.pricings.create') }}">add pricing</a>
                <a class="collapse-item" href="{{ route('admin.pricings.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Project -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject"
            aria-expanded="true" aria-controls="collapseProject">
            <i class="fas fa-users-cog"></i>
            <span>Project</span>
        </a>
        <div id="collapseProject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.projects.index') }}">all project</a>
                <a class="collapse-item" href="{{ route('admin.projects.create') }}">add project</a>
                <a class="collapse-item" href="{{ route('admin.projects.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- projectDetailes -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDetaile"
            aria-expanded="true" aria-controls="collapseDetaile">
            <i class="fas fa-users-cog"></i>
            <span>Detailes</span>
        </a>
        <div id="collapseDetaile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.project_detailes.index') }}">all detaile</a>
                <a class="collapse-item" href="{{ route('admin.project_detailes.create') }}">add detaile</a>
                <a class="collapse-item" href="{{ route('admin.project_detailes.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

      <!-- Question -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuestion"
            aria-expanded="true" aria-controls="collapseQuestion">
            <i class="fas fa-users-cog"></i>
            <span>Question</span>
        </a>
        <div id="collapseQuestion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.questions.index') }}">all question</a>
                <a class="collapse-item" href="{{ route('admin.questions.create') }}">add question</a>
                <a class="collapse-item" href="{{ route('admin.questions.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Slider -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSlider"
            aria-expanded="true" aria-controls="collapseSlider">
            <i class="fas fa-users-cog"></i>
            <span>Slider</span>
        </a>
        <div id="collapseSlider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.sliders.index') }}">all slider</a>
                <a class="collapse-item" href="{{ route('admin.sliders.create') }}">add slider</a>
                <a class="collapse-item" href="{{ route('admin.sliders.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- teams -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseteam"
            aria-expanded="true" aria-controls="collapseteam">
            <i class="fas fa-users-cog"></i>
            <span>Team</span>
        </a>
        <div id="collapseteam" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.teams.index') }}">all team</a>
                <a class="collapse-item" href="{{ route('admin.teams.create') }}">add team</a>
                <a class="collapse-item" href="{{ route('admin.teams.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Service -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService"
            aria-expanded="true" aria-controls="collapseService">
            <i class="fas fa-users-cog"></i>
            <span>Service</span>
        </a>
        <div id="collapseService" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.services.index') }}">all service</a>
                <a class="collapse-item" href="{{ route('admin.services.create') }}">add service</a>
                <a class="collapse-item" href="{{ route('admin.services.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Service -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetestimonials"
            aria-expanded="true" aria-controls="collapsetestimonials">
            <i class="fas fa-users-cog"></i>
            <span>Testimonial</span>
        </a>
        <div id="collapsetestimonials" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">all testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">add testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User</span></a>
    </li>
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
