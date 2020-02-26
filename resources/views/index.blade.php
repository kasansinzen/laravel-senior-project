@extends('layouts.app')

@section('content')

    <!--Top_content-->
    <section id="top_content" class="top_cont_outer">
        <div class="top_cont_inner">
            <div class="container">
                <div class="top_content">
                    <div class="row">
                        <div class="col-lg-5 col-sm-7">
                            <div class="top_left_cont flipInY wow animated">
                                <h2>สร้างร้านค้าออนไลน์บน facebook &amp; ระบบจัดการหลังร้าน</h2>
                                <p> เพิ่มการเข้าถึงลูกค้าของคุณมากขึ้นใน facebook ตอบโจทย์การขายสินค้าทางเพจ
                                โดยมีหน้าร้านให้ลูกค้าของคุณเข้ามาเลือกสั่งซื้อสินค้าของคุณ แล้วส่งข้อมูลมายังหลังร้าน
                                เพื่อให้คุณสามารถจัดส่งสินค้าตามรายการสั่งซื้อสินค้า </p>
                                <a href="#service" class="learn_more2">เรียนรู้เพิ่มเติ่ม</a> 
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-5"> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Top_content-->

    <!--Service-->
    <section  id="service">
        <div class="container">
            <h2>Services</h2>
            <div class="service_area">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service_block">
                            <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa-flash"></i>
                            </span> </div>
                            <h3 class="animated fadeInUp wow">เพิ่มประสิทธิภาพการสั่งซื้อสินค้า</h3>
                            <p class="animated fadeInDown wow">ข้อมูลการสั่งซื้อสินค้าทั้งหมด จะถูกจัดเก็บลงในฐานข้อมูล
                            เพื่อเรียกดูหรือใช้งาน อย่างเป็นระบบ</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service_block">
                            <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa-comments"></i>   </span> </div>
                            <h3 class="animated fadeInUp wow">ส่งข้อมูลผ่าน Messenger</h3>
                            <p class="animated fadeInDown wow">ข้อมูลยืนยันรายการสั่งซื้อ สามารถส่งผ่าน Messenger ถึงลูกค้า
                            จากระบบหลังร้านได้</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service_block">
                            <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa-shield"></i></span> </div>
                            <h3 class="animated fadeInUp wow">ความปลอดภัยของข้อมูล</h3>
                            <p class="animated fadeInDown wow">ข้อมูลทั้งหมดถูกจัดเก็บในระบบเป็นอย่างดี มากกว่า 10000+ ผู้ใช้งาน</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service-->

    <!--main-section-start-->
    <section id="work_outer">
        <div class="top_cont_latest">
            <div class="container">
            <h2>Latest Work</h2>
                <div class="work_section">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 wow fadeInLeft delay-05s">
                            <div class="service-list">
                                <div class="service-list-col1"> <i class="icon-doc"></i> </div>
                                <div class="service-list-col2">
                                    <h3>การสั่งซื้อง่ายขึ้น</h3>
                                    <p>ลูกค้าเพียงกดสั่งซื้อ จากนั้นรายการสั่งซื้อก็จะถูกส่งมายังระบบจัดการหลังร้าน</p>
                                </div>
                            </div>
                            <div class="service-list">
                                <div class="service-list-col1"> <i class="icon-comment"></i> </div>
                                <div class="service-list-col2">
                                    <h3>ส่งข้อมูลยืนยันการสั่งซื้อผ่าน Messenger</h3>
                                    <p>ลูกค้าสามารถรับข้อมูลยืนยันการชำระเงิน และการสั่งซื้อผ่าน Messenger</p>
                                </div>
                            </div>
                            <div class="service-list">
                                <div class="service-list-col1"> <i class="icon-database"></i> </div>
                                <div class="service-list-col2">
                                    <h3>การเจัดเก็บข้อมูลการสั่งซื้ออย่างเป็นระบบ</h3>
                                    <p>ข้อมูลถูกจัดเก็บอย่างเป็นระบบ และเสามารถรียกใช้งานได้</p>
                                </div>
                            </div>
                            <div class="service-list">
                                <div class="service-list-col1"> <i class="icon-cog"></i> </div>
                                <div class="service-list-col2">
                                    <h3>จัดการระบบการสั่งซื้อผ่าน Facebook ได้อย่างมีประสิทธิภาพ</h3>
                                    <p>ตอบโจทย์ทั้งหมด ของการสั่งซื้อสินค้าผ่าน Facebook</p>
                                </div>
                            </div>
                            <div class="work_bottom"> 
                                <span>ติดต่อเรา</span> 
                                <a href="#contact" class="contact_btn">Contact Us</a> 
                            </div>
                        </div>
                        <figure class="col-lg-6 col-sm-6  text-right wow fadeInUp delay-02s"> </figure>
                    </div>
                </div>
            </div>
        <!--<div class="work_pic"><img src="img/dashboard_pic.png" alt=""></div>-->
        </div>
    </section>
    <!--main-section-end-->

    <footer class="footer_section" id="contact">
        <div class="container">
                <section class="main-section contact" id="contact">
                    <div class="contact_section">
                        <h2>Contact Us</h2>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="contact_block">
                                    <div class="contact_block_icon rollIn animated wow">
                                        <span><i class="fa-home"></i></span>
                                    </div>
                                    <span>Fac-IT-302 คณะวิทยาการสารสนเทศ <br> มหาวิทยาลัยมหาสารคาม, <br>
                                    ต.ท่านขอนยาง อ.กันทรวิชัย จ.มหาสารคาม, 44150 </span> 
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact_block">
                                    <div class="contact_block_icon icon2 rollIn animated wow">
                                        <span><i class="fa-phone"></i></span>
                                    </div>
                                    <span>087-9622088 </span> 
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact_block">
                                    <div class="contact_block_icon icon3 rollIn animated wow">
                                        <span><i class="fa-pencil"></i></span>
                                    </div>
                                    <span> <a href="mailto:hello@butterfly.com"> kasansin_first@hotmail.com</a> </span> </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </footer>

@include('layouts.inc-footer')    

@endsection