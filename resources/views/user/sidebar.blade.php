<div class="col-xs-12 col-sm-4 col-md-3 col-sm-height no-padding section-profile-sidebar">
    <div class="block">
        <div class="section-profile-sidebar-detail">
            <div class="section-profile-avatar text-center">
                <img alt="Avatar" class="img-circle" src="assets/images/default-avatar.jpg"/>
            </div>
            <!-- /.avatar -->
            <h3 class="section-profile-name text-center">
                {{Auth::user()->full_name}}
            </h3>
            <div class="section-profile-regdate text-center">
                Bergabung sejak {{\Carbon\Carbon::parse(Auth::user()->created_at)->format('j  F Y')}}
            </div>
            <div class="section-profile-meta">
                <div class="section-profile-meta-item">
                                <span>
                                    Tanggal lahir
                                </span>
                    <span>
                                    {{\Carbon\Carbon::parse(Auth::user()->dateofbirth)->format('j  F Y')}}
                                </span>
                </div>
                <div class="section-profile-meta-item">
                                <span>
                                    Email
                                </span>
                    <span>
                                    {{Auth::user()->email}}
                                </span>
                </div>
            </div>
            <!-- /.meta -->
        </div>
        <!-- /.detail -->
        <ul class="section-profile-menu">
            <li class="@if(url()->current() == url('profile') OR Request::route()->getPrefix() == 'profile') active @endif">
                <a href="{{url('profile')}}">
                    <i class="icon fa fa-user">
                    </i>
                    Profil
                </a>
            </li>
            <li class="@if(url()->current() == url('whist-list') OR Request::route()->getPrefix() == 'whist-list') active @endif">
                <a href="{{url('whist-list')}}">
                    <i class="icon fa fa-heart">
                    </i>
                    Whislist
                </a>
            </li>
            <li class="@if(url()->current() == url('transaction-history') OR Request::route()->getPrefix() == 'transaction-history') active @endif">
                <a href="{{url('transaction-history')}}">
                    <i class="icon fa fa-shopping-cart">
                    </i>
                    Riwayat Pemesanan
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon fa fa-check">
                    </i>
                    Konfirmasi Pembayaran
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</div>
