<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{url('/admin')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Product Management</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Dress</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{url('/productlist/Dresses')}}">Dresses</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{url('/productlist/Party Dresses')}}">Party Dresses</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tops</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{url('/productlist/T-Shirts')}}">T-Shirts</a></li>
                        <li><i class="fa fa-table"></i><a href="{{url('/productlist/Skirts')}}">Skirts</a></li>
                        <li><i class="fa fa-table"></i><a href="{{url('/productlist/Shorts')}}">Shorts</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Beach</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/productlist/Swimwear')}}">Swimwear</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/productlist/Beachwear')}}">Beachwear</a></li>
                    </ul>
                </li>

                <li class="menu-title">Bills Management</li><!-- /.menu-title -->

                <li>
                    <a href="{{url('/billlist')}}"> <i class="menu-icon ti-email"></i>Bills </a>
                </li>

                <li class="menu-title">Users Management</li><!-- /.menu-title -->

                <li>
                    <a href="{{url('/userslist')}}"> <i class="menu-icon ti-email"></i>Users </a>
                </li>
                <li class="menu-title">Feedbacks Management</li><!-- /.menu-title -->

                <li>
                    <a href="{{url('/feedbackslist')}}"> <i class="menu-icon ti-email"></i>Feedbacks </a>
                </li>
              
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>