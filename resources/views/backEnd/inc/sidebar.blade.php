<div class="sidebar ">
    <ul class="sidebar--items" onclick="sidefunction()">
        <li >
            <a href="{{route('dashboard')}}" class="@if(request()->is('dashboard*')) actives @endif" >
                <span class="icon "> <i class="ri-dashboard-fill " ></i> </span>
                <span class="sidebar--item">Dashboard</span>
            </a>
        </li>
        <li class="actives" >
            <a href="{{route('category.index')}}"  class="@if(request()->is('category*')) actives @endif" >
                <span class="icon icon-4"> <i class="ri-price-tag-fill"></i> </span>
                <span class="sidebar--item">Category</span>
            </a>
        </li>
        <li class="actives" >
            <a href="{{route('customer.list')}}"  class="@if(request()->is('customer*')) actives @endif" >
                <span class="icon icon-4"> <i class="ri-price-tag-fill"></i> </span>
                <span class="sidebar--item">Customers</span>
            </a>
        </li>
        <li class="actives" >
            <a href="{{route('supplier.list')}}"  class="@if(request()->is('suppliers*')) actives @endif" >
                <span class="icon icon-4"> <i class="ri-user-2-fill"></i> </span>
                <span class="sidebar--item">Suppliers</span>
            </a>
        </li>
        <li class="actives" >
            <a href="{{route('product.list')}}"  class="@if(request()->is('product*')) actives @endif" >
                <span class="icon icon-4"> <i class="ri-price-tag-fill"></i> </span>
                <span class="sidebar--item">Products</span>
            </a>
        </li>
        <li>
            <a href="#" onclick="olFunction();" class="@if(request()->is('purchase*')) actives @endif" >
                <span class="icon icon-4"> <i class="ri-box-1-fill"></i> </span>
                <span class="sidebar--item">Purchase </span>
                <span class="icon-up"><i class="ri-arrow-down-s-line"></i> </span>
            </a>
            <div style="display: none;" class="order-list " id="olDIV">
                <ul>

                    <li><a href="{{route('purchase.create')}}"><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>New Purchase</a></li>
{{--                    <li><a href="{{route('purchase.add')}}"><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Pos design</a></li>--}}
                    <li><a href="{{route('purchase.list')}}" ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Purchase List</a></li>
{{--                    <li><a href="#"  ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Purchase Return</a></li>--}}
                </ul>
            </div>
        </li>
        <li>
            <a href="#" onclick="sellFunction();"  class="@if(request()->is('report*')) actives @endif" >
                <span class="icon icon-2"> <i class="ri-survey-fill"></i> </span>
                <span class="sidebar--item">Reports</span>
                <span class="icon-up"><i class="ri-arrow-down-s-line"></i> </span>
            </a>
            <div style="display: none;" class="order-list " id="sellDIV">
                <ul >
                    <li><a href="{{route('purchase.report')}}" ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Purchase Reports</a></li>
                    <li><a href="{{route('purchase.report.order')}}" ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Purchase Order Reports</a></li>
{{--                    <li><a href="dashboard_form_1.html" ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Form Two</a></li>--}}
{{--                    <li><a href="dashboard_form_2.html" ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Form Three</a></li>--}}
{{--                    <li><a href="dashboard_form_3.html" ><span class="icon "> <i class="ri-checkbox-blank-circle-fill"></i> </span>Form Four</a></li>--}}
{{--                --}}
                </ul>
            </div>
        </li>
    </ul>
</div>
