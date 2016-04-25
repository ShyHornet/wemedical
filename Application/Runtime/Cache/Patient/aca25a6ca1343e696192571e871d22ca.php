<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=0.9,user-scalable=no">

<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/weui.min.css"> -->
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/main.css">
<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/banneralert.css"> -->
<link rel="stylesheet" type="text/css" href="/wemedical/Public/css/font.css">
<!-- <link rel="stylesheet" type="text/css" href="/wemedical/Public/css/jquery-weui.css"> -->
<link href="/wemedical/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/flat-ui-pro.min.css" rel="stylesheet">
<link href="/wemedical/Public/css/datepicker.min.css" rel="stylesheet" type="text/css">
<!-- <link href="/wemedical/Public/css/animate.min.css" rel="stylesheet" type="text/css"> -->
<!-- <link href="/wemedical/Public/css/loadingSpinner.css" rel="stylesheet" type="text/css"> -->

<!-- <link href="/wemedical/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->

<meta >
<title>微信挂号平台</title>
<script src="/wemedical/Public/JS/jquery-2.2.3.min.js"></script>
<script src="/wemedical/Public/JS/flat-ui-pro.min.js"></script>
<script src="/wemedical/Public/JS/store.min.js"></script>
<!-- <script src="/wemedical/Public/JS/banneralert.min.js"></script> -->
<script src="/wemedical/Public/JS/jquery.validate.min.js"></script>

<!-- <script src="/wemedical/Public/JS/jquery-weui.js"></script> -->

<script src="/wemedical/Public/JS/jquery.form.js"></script>
<script src="/wemedical/Public/JS/jquery.cookie.js"></script>
<!-- <script src="/wemedical/Public/JS/bootstrap-datetimepicker.min.js"></script>
<script src="/wemedical/Public/JS/bootstrap-datetimepicker.zh-CN.js"></script> -->
<script src="/wemedical/Public/JS/datepicker.min.js"></script>
<!-- Include English language -->
<script src="/wemedical/Public/JS/datepicker.zh.js"></script>
  <script src="/wemedical/Public/JS/main.js"></script>
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
    <span class="sr-only">Toggle navigation</span>
  </button>
    <div class="navbar-brand" style="padding-top:5px;">
      <svg class="icon icon-logo" style=""><use xlink:href="/wemedical/Public/svg/symbol-defs.svg#icon-logo"></use></svg>
    </div>

</div>
<div class="collapse navbar-collapse" id="navbar-collapse-01">
  <ul class="nav navbar-nav">
    <li ><a href="#fakelink">医院信息</a></li>
      <li id="loginPage"><a  href="/wemedical/Home-Login-Index">登陆注册</a></li>
    <li id="aptPage"><a  href="/wemedical/Patient-Appointment-Index">预约挂号</a></li>
    <li id="myOrdersPage"><a  href="/wemedical/Patient-MyOrders-Index">我的预约</a></li>
    <li id="mePage"><a  href="/wemedical/Patient-Me-Index">个人中心</a></li>
  </ul>
  <form class="navbar-form navbar-right" action="#" role="search">
    <div class="form-group">
      <div class="input-group">
        <input class="form-control" id="navbarInput-01" type="search" placeholder="查找医生号源">
        <span class="input-group-btn">
          <button type="submit" class="btn"><span class="fui-search"></span></button>
        </span>
      </div>
    </div>
  </form>
</div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->


<!--  -->
    <div  class="modal fade" id="order_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">挂号确认</h4>
          </div>
          <div class="modal-body">
            <span style="float:left;margin-top:13px;margin-right:5px;" class="fui-document"></span><span ><h6>号源信息</h6></span>
            <table class="table table-striped" width="100%">
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-primary btn-xxs btn-embossed" id="toOrder" >确认挂号</a>
            <a type="button" class="btn btn-default btn-xxs btn-embossed" id="cancelOrder" >取消挂号</a>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(function(){

          $("#aptPage").addClass("active");
      $("#toOrder").click(function(){
        var button = document.getElementById("toOrder");

          $.getJSON("/wemedical/index.php/Patient-Appointment-proccessOrder",{doc_id:button.dataset.docid,date:button.dataset.date},function(json){
               if (json['status']==1) {
                 alert("挂号成功!");
               }

          });
          $("#order_confirm").modal('hide');
      });
      $("#cancelOrder").click(function(){
         $("#order_confirm").modal('hide');
      });
    });
    </script>

    <div class="container-fluid">

      <div class="row"width="100%" style="background:#1abc9c;height:50px;margin-top:-30px;">
        <div style="float:left; margin-top:11.25px;margin-left:24%;margin-right:3%;">
        <span  class="fui-arrow-left" id="preDay" ></span>
        </div>
        <div class=""style="float:left;text-align:center;width:35%;margin-top:4px;">
          <input type="text" id="tomorrow" value="<?php echo date('Y-m-d',strtotime("+1 day")); ?>"style="display:none;">
        <input  type="text" readonly="readonly" class="form-control datepicker-here active" style="text-align:center;border-color:#1abc9c;" id="treat_date"  data-placement="top" data-toggle="tooltip" class="btn btn-default mrs" type="button" data-original-title="至少提前一天预约" data-language='zh' value="<?php echo date('Y-m-d',strtotime("+1 day")); ?>"/>
        </div>
        <div class="" style="float:left;margin-top:11.25px;margin-right:22%;margin-left:3%;">
          <span class="fui-arrow-right" id="nxtDay"></span>
        </div>
      </div>
<script type="text/javascript">

</script>

<div ></div>
<div id="doc_info" style="min-height:450px;">

</div>

</div>



<script >

$(function(){
  //初始化日期选择器
  var tomorrow = new Date($("#tomorrow").val());
  tomorrow.setUTCHours("-8");
  tomorrow.setUTCMinutes("0");
  tomorrow.setUTCSeconds("0");
  var tomorrow_week = tomorrow.getDay();
  if (tomorrow_week==6||tomorrow_week==0){
       tomorrow = tomorrow_week==6? new  Date(tomorrow.getTime()+ 3*60*60*24*1000):new  Date(tomorrow.getTime()+ 2*60*60*24*1000);

  }
  $("#treat_date").datepicker({
    minDate:tomorrow,
    startDate:tomorrow,
    dateFormat:"yyyy-m-dd"
  })

  $("#treat_date").datepicker().data('datepicker').date=tomorrow;
  $("#treat_date").datepicker().data('datepicker').selectDate(tomorrow);

  //为现有的预约面板添加显示简介事件
  $('.intro').on('show.bs.collapse', function () {
    console.log("collapse show!");

    var content = $(this).children(".panel_middle_section");
    showIntroPanle(content,$(this));
  });
    var i = 1;

      var j = 0;
      $("#preDay").click(function(){/*选择前一天*/

        var datePicker = $("#treat_date").datepicker().data('datepicker');
        var dateInSeconds = datePicker.date.getTime();
        var newDate = (new Date(dateInSeconds - 60*60*12*1000));/*当前时间减一天*/
        if (newDate.getDay()==0){
          newDate =  (new Date(dateInSeconds - 4*60*60*12*1000))
        }
        /*时分秒归0，方便比较时间*/
        newDate.setUTCHours("-8");/*当前时区为8，归0默认为8点，所以将时区-8，得到标准格林威治时间*/
        newDate.setUTCMinutes("0");
        newDate.setUTCSeconds("0");

        if (newDate<tomorrow){ /*如果要选择的日期早于当前时间则将日期选择器归为当前日期*/
          datePicker.date = tomorrow;
            datePicker.selectDate(tomorrow);
          return;
        }

        datePicker.date = newDate;
        datePicker.selectDate(newDate);
        i=1;
        $("#doc_info").empty();
        loadDocs(i++,datePicker.date);


      });
      $("#nxtDay").click(function(){/*选择后一天*/

        var datePicker = $("#treat_date").datepicker().data('datepicker');

        var dateInSeconds = datePicker.date.getTime();

        var newDate = (new Date(dateInSeconds + 60*60*24*1000));
        if (newDate.getDay()==6){
          newDate =  (new Date(dateInSeconds + 3*60*60*24*1000))
        }
        datePicker.date = newDate;
        datePicker.selectDate(newDate);
          i=1;
          $("#doc_info").empty();

          loadDocs(i++,datePicker.date);
      });

    if (i==1) {
      console.log("init page");
      loadDocs(1,$("#treat_date").datepicker().data('datepicker').date);
      $('#order_confirm').on('show.bs.modal', function (e) {
        var button = e.relatedTarget;
        var modal = $(this);

        modal.find("tbody").html("<tr><td>就诊日期</td><td>"+button.dataset.date+"</td></tr>"+
          "<tr><td>就诊星期</td><td>"+button.dataset.week+"</td></tr>"+
          "<tr><td>就诊时段</td><td>"+button.dataset.period+"</td></tr>"+
          "<tr><td>就诊科室</td><td>"+button.dataset.dept+"</td></tr>"+
          "<tr><td>医师姓名</td><td>"+button.dataset.name+"</td></tr>"+
          "<tr><td>号源类型</td><td>"+button.dataset.title+"</td></tr>"+
          "<tr><td>挂号费</td><td>"+button.dataset.cost+"</td></tr>");
          var toOrder = modal.find("#toOrder");
          toOrder.attr("data-docid",button.dataset.id);
          toOrder.attr("data-date",button.dataset.date);

    });

    }
    var win = $(window);
    win.scroll(function () {
      if ($(document).height() - win.height() == win.scrollTop()){
           console.log(i);

           loadDocs(++i,$("#treat_date").datepicker().data('datepicker').date);
        }
    });
});
function loadDocs(num,date){
  var month = (date.getMonth()+1)<10?"0"+(date.getMonth()+1):(date.getMonth()+1);
var dateStr = ""+date.getFullYear()+"-"+month+"-"+date.getDate()+"";
  $.getJSON("/wemedical/index.php/Patient-Appointment-getDoc",{num:num,date:dateStr},function(json){
      // if((json[0]['end'])=='1'){
      //   console.log(json[0]['end']);
      //   alert("已经到底部了!");
      // }
        if (json!=null){
          $.each(json,function(index,array){
                var doctor_id = array['doctor_id'];
              $("#doc_info").append(buildDocPanle(array,(num+index),"/wemedical/Public/images/doctors/doc"+doctor_id+".jpeg",dateStr,date.getDay()));
              //为新添加的预约面板添加显示简介事件

              var intro = "[data-id="+doctor_id+"]";

            $(intro).on('show.bs.collapse', function () {
              console.log("collapse show!");

              var content = $(this).children(".panel_middle_section");
              showIntroPanle(content,$(this));
            });

          });
        }else{
          console.log("已经到底部了!");

        }




  });
}


</script>

<footer >
<p>Powered by HJW</p>
<p>weMedical © All rights reserved 2016 </p>
</footer>

</body>
</html>