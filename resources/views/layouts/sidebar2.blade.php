
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="" id="menuHome" href="{{ route('home')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>        
                <li class="sub-menu">
                    <a href="javascript:;" id="menuDailySettlement">
                        <i class="fa fa-book"></i>
                        <span>Daily Settlements </span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuSearch"><a href="{{ route('daily-settlement.index') }}">Search</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuMerchant" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Merchant ({{$default_data['countmerchant']}})</span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuRequestBigMerchant"><a href="{{ route('upgrade-merchant.index') }}">Request Big Merchant Approval</a></li>
                        <li class="" id="menuAllMerchant"><a href="{{ route('merchant.index') }}">All Merchant</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuPromotion" href="#">
                        <i class="fa fa-bullhorn"></i>
                        <span>Promotion ({{$default_data['countpromos']}})</span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuAllPromotion"><a href="{{ route('promo.index') }}">All Promotion</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuTransaction" href="#">
                        <i class="fa fa-briefcase"></i>
                        <span>Transaction ({{$default_data['counttransaction']}})</span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuAllTransaction"><a href="{{ route('transaction.index') }}">AIQQON</a></li>
                        <li class="" id="ppobTransaction"><a href="{{ route('transaction.ppob') }}">PPOB</a></li>
                        <li class="sub-menu">
                            <a class="" id="menutrueMoneyTransaction" href="#">
                                <span>True Money</span>
                            </a>
                            <ul class="sub">
                                <li class="" id="trueMoneyTransaction"><a href="{{ route('transaction.truemoney') }}">Data</a></li>
                                <li class="" id="menuCheckData"><a href="{{ route('transaction.checkdata') }}">Check Data Excel</a></li>
                            </ul>
                        </li>
                        <li class="" id="LinkajaTransaction"><a href="{{ route('transaction.linkaja') }}">LinkAja</a></li>
                        <li class="" id="OvoTransaction"><a href="{{ route('transaction.ovo') }}">OVO</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuUser" href="#">
                        <i class="fa fa-user"></i>
                        <span>User ({{$default_data['countuser']}})</span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuAllUser"><a href="{{ route('user.index') }}">All User</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuVoucher" href="#">
                        <i class="fa fa-user"></i>
                        <span>Voucher ({{$default_data['countvoucher']}})</span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuAllVoucher"><a href="{{ route('voucher.index') }}">All Voucher</a></li>
                        <li class="" id="menuVoucherType"><a href="{{ route('vouchertype.index') }}">Type Voucher</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuCashbackPromo" href="#">
                        <i class="fa fa-user"></i>
                        <span>Cashback Promo </span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuAllCashbackPromo"><a href="{{ route('cashbackpromo.index') }}">All Cashback Promo</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" id="menuBroadcast" href="#">
                        <i class="fa fa-user"></i>
                        <span>Broadcast ({{$default_data['countbroadcast']}})</span>
                    </a>
                    <ul class="sub">
                        <li class="" id="menuAllBroadcast"><a href="{{ route('broadcast.index') }}">All Broadcast</a></li>
                    </ul>
                </li>
                <li class="sub" >

                    <a href="{{ route('report.index') }}" id="menuReport" class=""><i class="fa fa-search"></i>Report</a>
                    
                </li>
                
            </ul>    
            
                </div>
        <!-- sidebar menu end-->
    </div>
</aside>