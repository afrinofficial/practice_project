@extends('backEnd.master')
@section('title')
    Pos System Dashboard
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " >
            <div class="ccards">
                <div class="cardss card card-11">
                    <div class="card--data1">
                        <div class="card--content">
                            <h1 class="card--title">2</h1>
                            <h5>Today Invoices</h5>
                        </div>
                    </div>
                </div>
                <div class="cardss card card-22">
                    <div class="card--data1">
                        <div class="card--content">
                            <h1 class="card--title">2</h1>
                            <h5>Today Invoices</h5>
                        </div>
                    </div>
                </div>
                <div class="cardss card card-33">
                    <div class="card--data1">
                        <div class="card--content">
                            <h1 class="card--title">2</h1>
                            <h5>Today Invoices</h5>
                        </div>
                    </div>
                </div>
                <div class="cardss card card-44">
                    <div class="card--data1">
                        <div class="card--content">
                            <h1 class="card--title">2</h1>
                            <h5>Today Invoices</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--graph chart start -->
        <div class="content-areas">
            <div class=" coll">
                <div id="line-adwords" ></div>
                <div style="display:flex; text-align: center;">
                    <div class="charts-text" style="padding-left:10px; padding-right:10px; ">
                        <p>total income</p>
                        <strong>$ 1000.00</strong>
                        <div style="margin-top: 10px;" class="emt"></div>
                    </div>
                    <div style="margin-left: 10px;" class="charts-text">
                        <p>Today Expenses</p>
                        <strong>$ 1000.00</strong>
                        <div style="margin-top: 10px;" class="emtt"></div>
                    </div>
                </div>
            </div>
            <div style="margin-right: 20px;" class="coll1">
                <canvas id="newChart" ></canvas>
                <div style="display:flex; margin-top: 20px; text-align: center;">
                    <div class="charts-text" >
                        <p>Today Sold</p>
                        <strong >$ 1000.00</strong>
                        <div style="margin-top: 10px;" class="emts"></div>
                    </div>
                    <div style="margin-left: 20px; " class="charts-text">
                        <p>Total Revenue</p>
                        <strong>$ 1000.00</strong>
                        <div style="margin-top: 10px;" class="emtts"></div>
                    </div>
                </div>
            </div>
            <div  class="coll2">
                <p>Income vs Expenses</p>
                <div id="radialBarBottom"></div>
                <p></p>
            </div>
        </div>
        <!--graph chart end -->
        <!--total income table start -->
        <div class="recent--tables recentt_tables">
            <div class="title">
                <h2 class="section--title">Recent Orders</h2>
            </div>
            <div class="table">
                <table>
                    <thead>
                    <tr>
                        <th>Invoices#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #D81A36; color:#fff; border-radius: 15px; padding: 2px 8px;">Due </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #00B960; color:#fff; border-radius: 15px; padding: 2px 8px;">Paid </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #00B960; color:#fff; border-radius: 15px; padding: 2px 8px;">Paid </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #D81A36; color:#fff; border-radius: 15px; padding: 2px 8px;">Due </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #00B960; color:#fff; border-radius: 15px; padding: 2px 8px;">Paid </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #D81A36; color:#fff; border-radius: 15px; padding: 2px 8px;">Due </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #00B960; color:#fff; border-radius: 15px; padding: 2px 8px;">Paid </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #D81A36; color:#fff; border-radius: 15px; padding: 2px 8px;">Due </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #00B960; color:#fff; border-radius: 15px; padding: 2px 8px;">Paid </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    <tr>
                        <td>#1081</td>
                        <td>Gertrud Whickman</td>
                        <td><span style="background: #D81A36; color:#fff; border-radius: 15px; padding: 2px 8px;">Due </span></td>
                        <td>09-06-2023</td>
                        <td >$ 22,085</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--total income tableb end -->
        <!--total income start -->
        <div class="total_income">
            <div class="income">
                <div class="income_icon">
                    <img src="{{asset('backend')}}/images/icon_c.png" alt="">
                </div>
                <div class="income_text">
                    <strong>Income</strong>
                    <p>$7,300.20 / 30,000.00</p>
                    <div style="width: 100%; margin-top: 10px;" class="blue"><p style="width:40%; height:13px; background: #0288D1; border-radius:7px;"></p></div>
                </div>
            </div>
            <div class="Expenses">
                <div class="Expenses_icon">
                    <img src="{{asset('backend')}}/images/expenses 1.png" alt="">
                </div>
                <div class="Expenses_text">
                    <strong>Expenses</strong>
                    <p>$1,300.20 / 18,000.00</p>
                    <div style="width: 100%; margin-top: 10px;" class="blue"><p style="width:20%; height:13px; background: #FFBE25; border-radius:7px;"></p></div>
                </div>
            </div>
            <div class="Sales">
                <div class="Sales_icon">
                    <img src="{{asset('backend')}}/images/graph 1.png" alt="">
                </div>
                <div class="Sales_text">
                    <strong>Sales</strong>
                    <p>$10,200.20 / 80,000.00</p>
                    <div style="width: 100%; margin-top: 10px;" class="blue"><p style="width:35%; height:13px; background: #00B960; border-radius:7px;"></p></div>
                </div>
            </div>
            <div class="Net">
                <div class="Net_icon">
                    <img src="{{asset('backend')}}/images/money-bag 1.png" alt="">
                </div>
                <div class="Net_text">
                    <strong>Net Income</strong>
                    <p>$15,300.20 / 100,000.00</p>
                    <div style="width: 100%; margin-top: 10px;" class="blue"><p style="width:45%; height:13px; background: #D81A36; border-radius:7px;"></p></div>
                </div>
            </div>
        </div>

        <!--total income end -->
        <!--recent added products start -->
        <div class=" recent_products">
            <div class="rec_title">
                <h2>Recently Added Products</h2>
                <div class="re_but">
                    <a href="#">Add Product</a>
                </div>
            </div>
            <div class="incomes">
                <div class="income_icons">
                    <img src="{{asset('backend')}}/images/rec_1.png" alt="">
                </div>
                <div class="income_text">
                    <strong>Samsung TV</strong>
                    <p>Samsung 32” 1080p 60Hz LED Smart HDTV.</p>
                </div>
                <div class="rec_pris">
                    ৳2000
                </div>
            </div>
            <div class="Expensess">
                <div class="Expenses_icons">
                    <img src="{{asset('backend')}}/images/rec_2.png" alt="">
                </div>
                <div class="Expenses_text">
                    <strong>Bicycle</strong>
                    <p>26” Mongoose Dolomite Men’s 7 -speed, Navy Blue.</p>
                </div>
                <div class="rec_priss">
                    ৳1000
                </div>
            </div>
            <div class="Saless">
                <div class="Sales_icons">
                    <img src="{{asset('backend')}}/images/rec_3.png" alt="">
                </div>
                <div class="Sales_text">
                    <strong>Xbox One</strong>
                    <p>Xbox One Cosole Bundle with Halo Master Chief Collection.</p>
                </div>
                <div class="rec_priis">
                    ৳400
                </div>
            </div>
            <div class="Nets">
                <div class="Net_icons">
                    <img src="{{asset('backend')}}/images/rec_4.png" alt="">
                </div>
                <div class="Net_text Net_texts">
                    <strong>Playstation 4</strong>
                    <p>Playstation 4 500GB Console (PS4)</p>
                </div>
                <div class="rece_pris">
                    ৳500
                </div>
            </div>
            <div class="rec_all_prod">
                <a href="#">View All Products</a>
            </div>
        </div>
        <div class="join_promotion">
            <div class="promotion_top">
                <p>Lifestyle:  3.3 PAYDAY 2022    15% off min spend SGD 100   HOME10</p>
                <div class="new">
                    New
                </div>
                <div class="timer">
                    <div class="timer_img">
                        <div class="offer_time" id="timer">
                            <div class="hou" id="days">
                                <p class="coun"> 13</p>
                                <p class="days">Hour</p>
                            </div>
                            <div class="hou" id="hours">
                                <p class="coun"> 13</p>
                                <p class="days">Hour</p>
                            </div>
                            <div class="min" id="minutes">
                                <p class="coun">34</p>
                                <p class="days">Min</p>
                            </div>
                            <div class="sec" id="seconds">
                                <p class="coun">56</p>
                                <p class="days">Sec</p>
                            </div>
                        </div>
                    </div>
                    <div class="timer_txt">
                        <div class="txt_one">
                            <img src="{{asset('backend')}}/images/calendar-stats.png" alt="">
                            <p>28 Feb - 07 MAY 23</p>
                        </div>
                        <div class="txt_one">
                            <img src="{{asset('backend')}}/images/discount-2.png" alt="">
                            <p>Voucher discount: 10%</p>
                        </div>
                        <div class="txt_one">
                            <img src="{{asset('backend')}}/images/checkup-list.png" alt="">
                            <p>Registration until: 22 Feb 22</p>
                        </div>
                        <div class="txt_one">
                            <img src="{{asset('backend')}}/images/tags.png" alt="">
                            <p>Seller funded portion: 100% out of the discount</p>
                        </div>
                        <div class="txt_one" style="margin-top: 20px; margin-left: 10px;">
                            <p style="margin-right: 20px;">Sellers:  0</p>
                            <p>Products:  0</p>
                        </div>
                    </div>
                </div>
                <div class="rec_btn">
                    <a href="#">Join the Promotion</a>
                </div>
                <div class="rec_deals">
                    <div class="deal-one">
                        <p>Approved deals</p>
                        <div class="minnuss">1</div>
                    </div>
                    <div class="deal-two">
                        <p>Pending deals</p>
                        <div class="minnus">-</div>
                    </div>
                    <div class="deal-three">
                        <p>Rejected deals</p>
                        <div class="minus">-</div>
                    </div>
                </div>
            </div>
            <div class="promotion_bottom">

            </div>
        </div>
        <div class="recent--tables Top_customer">
            <div class="title">
                <h2 class="section--title">Top customer</h2>
            </div>
            <div class="table">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Full name</th>
                        <th>Browser</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="background: rgba(255, 255, 255, 1);">
                        <td style="color: #138EFF;">ID#44</td>
                        <td>huuthongit@gmail.com</td>
                        <td>Nguyễn Hữu Thông</td>
                        <td>Google</td>
                        <td >2023-06-26 21:42:39</td>
                    </tr>
                    <tr style="background: rgba(242, 247, 255, 1);">
                        <td style="color: #138EFF;">ID#42</td>
                        <td>sadiaarooj111@gmail.com</td>
                        <td>Sadia arooj</td>
                        <td>Facebook</td>
                        <td >2023-06-24 02:31:44</td>
                    </tr>
                    <tr style="background: rgba(255, 255, 255, 1);">
                        <td style="color: #138EFF;">ID#44</td>
                        <td>huuthongit@gmail.com</td>
                        <td>Nguyễn Hữu Thông</td>
                        <td>Google</td>
                        <td >2023-06-26 21:42:39</td>
                    </tr>
                    <tr style="background: rgba(242, 247, 255, 1);">
                        <td style="color: #138EFF;">ID#42</td>
                        <td>sadiaarooj111@gmail.com</td>
                        <td>Sadia arooj</td>
                        <td>Facebook</td>
                        <td >2023-06-24 02:31:44</td>
                    </tr>
                    <tr style="background: rgba(255, 255, 255, 1);">
                        <td style="color: #138EFF;">ID#44</td>
                        <td>huuthongit@gmail.com</td>
                        <td>Nguyễn Hữu Thông</td>
                        <td>Google</td>
                        <td >2023-06-26 21:42:39</td>
                    </tr>
                    <tr style="background: rgba(242, 247, 255, 1);">
                        <td style="color: #138EFF;">ID#42</td>
                        <td>sadiaarooj111@gmail.com</td>
                        <td>Sadia arooj</td>
                        <td>Facebook</td>
                        <td >2023-06-24 02:31:44</td>
                    </tr>
                    <tr style="background: rgba(255, 255, 255, 1);">
                        <td style="color: #138EFF;">ID#44</td>
                        <td>huuthongit@gmail.com</td>
                        <td>Nguyễn Hữu Thông</td>
                        <td>Google</td>
                        <td >2023-06-26 21:42:39</td>
                    </tr>
                    <tr style="background: rgba(242, 247, 255, 1);">
                        <td style="color: #138EFF;">ID#42</td>
                        <td>sadiaarooj111@gmail.com</td>
                        <td>Sadia arooj</td>
                        <td>Facebook</td>
                        <td >2023-06-24 02:31:44</td>
                    </tr>
                    <tr style="background: rgba(255, 255, 255, 1);">
                        <td style="color: #138EFF;">ID#44</td>
                        <td>huuthongit@gmail.com</td>
                        <td>Nguyễn Hữu Thông</td>
                        <td>Google</td>
                        <td >2023-06-26 21:42:39</td>
                    </tr>
                    <tr style="background: rgba(242, 247, 255, 1);">
                        <td style="color: #138EFF;">ID#44</td>
                        <td>huuthongit@gmail.com</td>
                        <td>Nguyễn Hữu Thông</td>
                        <td>Google</td>
                        <td >2023-06-26 21:42:39</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="order-volume">
            <div class="view">
                <h3>Order Volume</h3>
                <p>View Report</p>
            </div>
            <p>5.51K <span style="color: #37CB79;">2.1%  </span> <span>vs Last Week</span></p>
            <div class="">
                <div class="box  mt-4">
                    <div id="barchart"></div>
                </div>
            </div>
        </div>
        <div class="rej_prod">
            <div class="rej_pro_1">
                <div class="pen_or pen" style="margin-bottom: 60px;">
                    <p>Total Pending <br> Orders <br><span>Today</span></p>
                    <p>10</p>
                </div>
                <div class="pen_or" style="margin-bottom: 40px;">
                    <p></p>
                    <p>10</p>
                </div>
                <div class=" pens">
                    <p>0</p>
                    <p>0</p>
                    <p>0</p>
                </div>
                <div class="pens" style="margin-left: 30px; margin-bottom: 20px;">
                    <p style="width: 15px; height: 15px; border-radius: 50%; background: #7367F0;"></p>
                    <p style="width: 15px; height: 15px; border-radius: 50%; background: #7367F0;"></p>
                    <p style="width: 15px; height: 15px; border-radius: 50%; background: #7367F0;"></p>
                    <p style="width: 10px; height: 45px; border-radius: 40%; background: #7367F0; margin-top: -33px;"></p>
                </div>
                <div class="pen_or">
                    <p>T</p>
                    <p>W</p>
                    <p>T</p>
                    <p>F</p>
                </div>
                <hr>
                <div class="pen_or pen">
                    <p>Current Daily Order <br><span>Volume limitation</span> </p>
                    <p>10000</p>
                </div>
            </div>
            <div class="rej_pro_2">
                <div class="pen_or pen">
                    <p>Your Rating</p>
                    <p>1.3</p>
                </div>
                <div class="ppie sspinner">Score <br>1.3</div>
                <div class="pen_or">
                    <p>Canceling- Seller Related <span style="color: #EA5455; font-weight: 700;">Very Poor</span></p>
                    <p>6%</p>
                </div>
                <hr>
                <div class="pen_or">
                    <p>Handling Time With SLA <span style="color: #EA5455; font-weight: 700;">Very Poor</span></p>
                    <p>88%</p>
                </div>
            </div>
            <div class="rej_pro_3 rej_pro_4">
                <div class="pen_or pen">
                    <p>Best Selling Product <br> sales Contribution</p>
                    <p>71%</p>
                </div>
                <div class="piee animatee no-rounds" style="--p:81;--c:#7367F0; margin-top: 20px; margin-bottom: 25px;"> 71%</div>
                <div class="pen_or">
                    <p>Best selling Products <br> Low Stock Level</p>
                    <p>1</p>
                </div>
                <hr>
                <div class="pen_or ">
                    <p>Total out of Stock </p>
                    <p >1351</p>
                </div>
            </div>
            <div class="rej_pro_4 ">
                <div class="pen_or pen">
                    <p>New Product <br> Creation <br><span>(Last 14 Days) </span></p>
                    <p>1549</p>
                </div>
                <div class="pie animate no-round" style="--p:71;--c:#FFE600; font-size: 12px;"> Rejected <br> Products</div>
                <div class="pen_or pen" style="margin-top: 10px; margin-bottom: 20px;">
                    <p style="width: 15px; height: 15px; border-radius: 50%; background: #FFE600; "></p><span style="color:#363740; font-size: 12px;">Missing image</span>
                    <p style="width: 15px; height: 15px; border-radius: 50%; background: #7367F0;"></p><span style="color:#363740; font-size: 12px;">Poor quality</span>
                </div>
                <div class="pen_or pen">
                    <p>Approved</p>
                    <p>3928</p>
                </div>
                <hr>
                <div class="pen_or pen">
                    <p>Pending </p>
                    <p>227</p>
                </div>
            </div>
        </div>
        <!--recent added products end -->

    </div>
@endsection
