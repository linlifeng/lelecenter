<?php
if($_POST["psw"] != "lelelele" && $_POST["psw"] != "admin"){header("Location: index.html");}
elseif($_POST["psw"] != "admin"){echo '<style type="text/css">.modal{display:none;}</style>';}
?>
    <!DOCTYPE html>
    <html>
    <head>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">        
        <title>LELE Calendar</title>
     <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 
    <style>
    body, html{height: 100%; margin: 0; font-family: 'Anton', sans-serif; overflow:hidden}

        #background{position: fixed; z-index: 0; height: 100%; width: 100%; color: red; background:url("./photos/image.jpg") no-repeat center center fixed; background-size: cover;}
        /*#blurbackground{position: fixed; z-index: 0; height: 100%; width: 100%; color: red; background-image:url("../image.jpg"); background-position: center; background-repeat: no-repeat; background-size: cover; filter: blur(15px) brightness(2) grayscale(50%);}*/
        #infoBox, #blurbackground{position: fixed; z-index: 0; height: 100%; width: 100%; color: red; background:url("./photos/image-blur.jpg") no-repeat center center fixed; background-size: cover;}
        #infoBox{z-index: 10; display: none}
        #btnNext, #btnPrev {z-index: 6; position: fixed; width:20%; height: 10%;top: 0; right: 0; display: block; padding: 5% 1% 3% 1%; font-size: 2em; font-family: Anton; border: none; text-decoration: none; background: rgba(255, 255, 255, 0); color: grey; text-align: center; padding: 5,10,5,10; cursor: pointer}
        #btnPrev {left: 0}
        #monthHeader{cursor: pointer}
       table{z-index: 5;height: 100%; width:100%; position: absolute; top 0; bottom 0; left; 0; right; 0; background-color:rgba(222,222,222,0) }
        tr{height: 13%}
        a{display: block; width: 100%; height:100%; color: rgba(2,2,2,1); opacity:1; text-decoration: none; font-size: 4em}
        a:hover{opacity: 0}
        td{background-size: cover;  background-repeat: no-repeat; opacity: .7; background-color: rgba(0,0,0,0); text-align: center;}
        /* td{clip-path: circle(60px at center); } */
        td:hover{opacity: 1;}
        .dayHeader{ height: 5%; background-color: rgba(0,0,0,0); font-size: 1em}
        #monthHeader{ font-size: 6em; background-color: rgba(0,0,0,0)} 

#clock, #date
{
z-index: 3;
font-size: 5em;
display: block;
position: absolute; bottom: 5%;
padding:0;
margin:0;
color: #eee;
opacity: .3;
font-family: 'Orbitron', 'Anton'
}
#clock{ left:120px;}
#date{font-size: 8em; right:120px; bottom: 2%}

#curtain
{
z-index: 2;
display: block;
height: 100%; width: 100%;
position: fixed; top: 0;
background-color: black;
background: linear-gradient(to top, rgba(0,0,0,.9), rgba(0,0,0,0)); /* Standard syntax */
opacity: .8
}


/* The Modal (background) */
.modal {
    position: fixed; /* Stay in place */
    z-index: 4; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    /*margin: 5% auto 15% auto;  5% from the top, 15% from the bottom and centered */
    margin: auto 10% auto 10%;  /*5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    height: 80%;
    background: url("./photos/image-blur.jpg") no-repeat center center fixed;
    background-size: cover;
}
/* Full-width input fields */
input[type=text], input[type=password] ,input[type=file], input[type=date], #checkboxBlock {
    padding: 15%; auto;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 2em;
}
input[type=date]{
width:50%;
float:right;
}
input[type=checkbox]{
   transform: scale(4);
}
#checkboxBlock{
    width:45%;
    height: 10%;
    padding-left: 3%;
}
#checkboxBlock p{float: right; margin: 0}


/* Set a style for all buttons */
button{
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    bottom: 0px; 
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 2em;
}

#closeAdmin{
    display:block;
    width: 100%;
    background: rgba(255,250,250,.5);
    font-size: 3em;
    text-align: center;
}


/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}




    </style>

<link rel="stylesheet" type="text/css" href="lightbox.css" />
<link rel="stylesheet" type="text/css" href="swipebox.css" />
<script src="jquery.js"></script>
<script src="lightbox.js"></script>
<script src="swipebox.js"></script>

<script type="text/javascript">



// adding swipe detection
document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

var xDown = null;                                                        
var yDown = null;                                                        

function handleTouchStart(evt) {                                         
    xDown = evt.touches[0].clientX;                                      
    yDown = evt.touches[0].clientY;                                      
};                                                

function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
            /* left swipe */
            $("#clock").fadeOut('slow');
            $("#date").fadeOut('slow');
            $("#blurbackground").fadeIn('fast','linear', function(){
                    document.getElementById("btnNext").click();
             });
       } else {
            /* right swipe */
            $("#clock").fadeOut('slow');
            $("#date").fadeOut('slow');
            $("#blurbackground").fadeIn('fast','linear', function(){
                    document.getElementById("btnPrev").click();
             });
        }                       
    } else {
        if ( yDiff > 0 ) {
            /* up swipe */
            showCalendar();
        } else { 
            /* down swipe */
            hideCalendar();
        }                                                                 
    }
    /* reset values */
    xDown = null;
    yDown = null;    
}

// end swipe detection








function useLightBox(){
        lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
}

function useSwipeBox(){
        ;( function( $ ) {
            $( '.swipebox' ).swipebox();
        } )( jQuery );
}


var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

if( isMobile == true) {
    useSwipeBox();
}
else{
    useLightBox();
}

</script>


        <style type="text/css">
            
            td.not-current {
                color: #777;
            }
            
        </style>




        <script type="text/javascript">
function startTime() {
    var today = new Date();
    var d = today.getDate();
    var D = today.getDay();
    var y = today.getFullYear();
    var mo = today.getMonth() + 1;
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    h + ":" + m;
    document.getElementById('date').innerHTML =
    y + '.' + mo + '.' + d;

    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}


        
function showCalendar(){
    $("#blurbackground").fadeIn('fast','linear', function(){
            $("#calendarTable").animate({top:"0px"},'fast');
     });
    $('#curtain').fadeOut('fast');
    //$("#calendarTable").fadeIn('fast');
    if(isMobile!=true){
        $("#btnNext").fadeIn('slow');
        $("#btnPrev").fadeIn('slow');
    }
    $("#clock").fadeOut('slow');
    $("#date").fadeOut('slow');
    //$("#clock").animate({top:"0%"},'slow');
    //$("#date").animate({top:"0%"},'slow');
    //$('#background').css({filter: 'blur(15px)'}, 'slow');
}
function hideCalendar(){
    startTime();
    $("#calendarTable").animate({top:"100%"},'fast', function(){
            $("#blurbackground").fadeOut('fast');
            $('#curtain').fadeIn('fast');
    });
    //$("#calendarTable").fadeOut('fast');
    $("#btnNext").fadeOut('slow');
    $("#btnPrev").fadeOut('slow');
    $("#clock").fadeIn('slow');
    $("#date").fadeIn('slow');
    //$("#clock").animate({top:"85%"},'slow');
    //$("#date").animate({top:"75%"},'slow');
    //$('#background').css({filter: 'blur(0px)'}, 'slow');
}
            


            // Author: AlÃª Monteiro
            // Created: 2013-03-06
            // E-mail: lu.ale.monteiro@gmail.com
                    
            // P.S. I'm from Brazil, so the names of the weeks and months are in Portuguese.
            
            var Calendar = function(divId) {
                
                //Store div id
                this.divId = divId;
                
                // Days of week, starting on Sunday
                this.DaysOfWeek = [
                    '日',
                    '一',
                    '二',
                    '三',
                    '四',
                    '五',
                    '六'
                ];
                
                // Months, stating on January
                this.Months = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月' ];
                
                // Set the current month, year
                var d = new Date();
                
                this.CurrentMonth = d.getMonth();
                this.CurrentYear = d.getFullYear();
                
            };
            
            // Goes to next month
            Calendar.prototype.nextMonth = function() {
                if ( this.CurrentMonth == 11 ) {
                    this.CurrentMonth = 0;
                    this.CurrentYear = this.CurrentYear + 1;
                }
                else {
                    this.CurrentMonth = this.CurrentMonth + 1;
                }
                this.showCurrent();
            };
            
            // Goes to previous month
            Calendar.prototype.previousMonth = function() {
                if ( this.CurrentMonth == 0 ) {
                    this.CurrentMonth = 11;
                    this.CurrentYear = this.CurrentYear - 1;
                }
                else {
                    this.CurrentMonth = this.CurrentMonth - 1;
                }
                this.showCurrent();
            };
            
            // Show current month
            Calendar.prototype.showCurrent = function() {
                this.showMonth(this.CurrentYear, this.CurrentMonth);
            };
            
            // Show month (year, month)
            Calendar.prototype.showMonth = function(y, m) {
                
                var d = new Date()
                    // First day of the week in the selected month
                    , firstDayOfMonth = new Date(y, m, 1).getDay()
                    // Last day of the selected month
                    , lastDateOfMonth =  new Date(y, m+1, 0).getDate()
                    // Last day of the previous month
                    , lastDayOfLastMonth = m == 0 ? new Date(y-1, 11, 0).getDate() : new Date(y, m, 0).getDate();

            
            //------------------ okay start drawing the calendar        
                
                var html = '<table id="calendarTable">';
                
                // Write selected month and year
                //html += '<tr><td colspan="7" id="monthHeader" onclick="hideCalendar()">' +  y + '年' + this.Months[m] + '</td></tr>';
                html += '<tr><td colspan="7" id="monthHeader" onclick="hideCalendar()">' +  y +'.' + String(parseInt(m) + 1) + '</td></tr>';
                
                // Write the header of the days of the week
                html += '<tr>';
                for(var i=0; i < this.DaysOfWeek.length;i++) {
                    if(isMobile == true){
                    html += '<td class="dayHeader" style="font-size: 2em">' + this.DaysOfWeek[i] + '</td>';
                    }
                    else{ 
                    html += '<td class="dayHeader">' + this.DaysOfWeek[i] + '</td>';
                    }
                }
                html += '</tr>';
                
                // Write the days
                var i=1;
                do {
                    
                    var dow = new Date(y, m, i).getDay();
                    
                    // If Sunday, start new row
                    if ( dow == 0 ) {
                        html += '<tr>';
                    }
                    // If not Sunday but first day of the month
                    // it will write the last days from the previous month
                    else if ( i == 1 ) {
                        html += '<tr>';
                        var k = lastDayOfLastMonth - firstDayOfMonth+1;
                        for(var j=0; j < firstDayOfMonth; j++) {
                            html += '<td class="not-current">' + k + '</td>';
                            k++;
                        }
                    }
                    
                    // Write the current day in the loop
                    //html += '<td>' + i + '</td>';
                    
                    function zeroPad(num, places) {
                          var zero = places - num.toString().length + 1;
                          return Array(+(zero > 0 && zero)).join("0") + num;
                        }
                    var expandedm = zeroPad(parseInt(m)+1,2); 

                    if(isMobile == true){
                    //html += '<td style="background-image: url(./photos/thumb-'  + String(parseInt(m)+1)+i+y +  '.jpg)"><a class="swipebox" href="./photos/' + String(parseInt(m)+1)+i+y + '.jpg">'  +i+ '</a></td>';} 
                    html += '<td style="background-image: url(./photos/thumb-'  + expandedm+i+y +  '.jpg)"><a class="swipebox" href="./photos/' + expandedm+i+y + '.jpg">'  +i+ '</a></td>';} 
                    else{
                    //html += '<td style="background-image: url(./photos/thumb-'  + String(parseInt(m)+1)+i+y +  '.jpg)"><a href="./photos/' + String(parseInt(M)+1)+i+y + '.jpg" data-lightbox="' + m + '">'  +i+ '</a></td>'; }
                    html += '<td style="background-image: url(./photos/thumb-'  + expandedm+i+y +  '.jpg)"><a href="./photos/' + expandedm+i+y + '.jpg" data-lightbox="' + m + '">'  +i+ '</a></td>'; }
                    //html += '<td style="background-image: url(./thumb-'  + String(parseInt(m)+1)+i+y +  '.jpg)"><a href="./' + String(parseInt(m)+1)+i+y + '.jpg" data-lightbox="' + m + '"></a>' +i+ '</td>';                    
                    //html += '<td><a href="./' + String(parseInt(m)+1)+i+y + '.jpg" data-lightbox="' + m + '">' + i + '<img src="' + String(parseInt(m)+1)+i+y + '.jpg"></a></td>';                    
                    //this do not work.. html += '<a href="./' + String(parseInt(m)+1)+i+y + '.jpg" data-lightbox="' + m + '"><td style="background-image: url(./'  + String(parseInt(m)+1)+i+y +  '.jpg)">' + i + '</td></a>';
                    // If Saturday, closes the row
                    if ( dow == 6 ) {
                        html += '</tr>';
                    }
                    // If not Saturday, but last day of the selected month
                    // it will write the next few days from the next month
                    else if ( i == lastDateOfMonth ) {
                        var k=1;
                        for(dow; dow < 6; dow++) {
                            html += '<td class="not-current">' + k + '</td>';
                            k++;
                        }
                    }
                    
                    i++;
                }while(i <= lastDateOfMonth);
                
                // Closes table
                html += '</table>';
                
                // Write HTML to the div
                document.getElementById(this.divId).innerHTML = html;
            };
            
            // On Load of the window
            window.onload = function() {
                // Start calendar
                var c = new Calendar("divCalendar");            
                c.showCurrent();
                
                // Bind next and previous button clicks
                getId('btnNext').onclick = function() {
                    c.nextMonth();
                };
                getId('btnPrev').onclick = function() {
                    c.previousMonth();
                };
    hideCalendar();
            }
            
            // Get element by id
            function getId(id) {
                return document.getElementById(id);
            }




        
        </script>
</head>
<body>


    <div id="background" onclick="showCalendar()"> </div>
    <div id="curtain" onclick="showCalendar()"></div>



<!--        <div id="background" onclick="showCalendar()"></div> -->
        <div id="blurbackground"></div> 
        
        <div id="divCalendar"></div>
        
        <button id="btnPrev" type="button">上个月</button>
        <button id="btnNext" type="button">下个月</button> 
        <div id="clock"></div>
        <div id="date"></div> 



<div id="adminbox">
        <div id="id01" class="modal">  
          <form id="uploadForm" class="modal-content animate" action="" method=POST  enctype="multipart/form-data">
            <div class="imgcontainer">
              <img src="logo.gif" alt="Avatar" class="avatar">
            </div>
            <div class="container">
              <span id="checkboxBlock"><input type="checkbox" name="current"><p>Also set as backdrop</p></span>
              <input type="date" name="date" data-date-inline-picker="true" required />       
              <input type="file" name="image" required/>       
              <!--<button type="submit" name="sub">好了！</button>-->
              <button name="sub" id="sub">好了！</button>
              <span id="closeAdmin" onclick="hideAdminBox()">Done Uploading.</span>
            </div>

            </div>
          </form>
        </div>
</div>
<div id = "infoBox"></div>
<script>



function hideInfo(){
        $('#infoBox').fadeOut();
}
function hideAdminBox(){
        $('#adminbox').fadeOut();
}


$( '#uploadForm' )
  .submit( function( e ) {
    $.ajax( {
      url: './upload.php',
      type: 'POST',
      data: new FormData( this ),
      processData: false,
      contentType: false,
      success: function(data){
        $('#infoBox').html('<button id="closeInfo" onclick="hideInfo()">' + data + '</button>').fadeIn('fast');
        }

    } );
    e.preventDefault();
  } );


</script>       
 
    </body>
    </html>


