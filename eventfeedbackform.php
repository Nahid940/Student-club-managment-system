<?php

                        $id=$_POST['id'];
                        $con = mysqli_connect("localhost","root","","myproject");
                        date_default_timezone_set("Asia/Dhaka");
                        $today=date('Y-m-d',time());
                        $query="select ev.eid,ulg.id,eventdate,eventname,enablefeedback from studentevent sev, event ev, user_login ulg where ev.eid=sev.eid and ulg.id=sev.id and ulg.id='$id' and enablefeedback='yes'";
                        $result=mysqli_query($con,$query);
                        $num_rows=mysqli_num_rows($result);
                        $row=mysqli_fetch_array($result);
                        if($num_rows>=1 && $today>$row['eventdate']){
                            
                            
                            $q="select evn.eid,ulg.id,date from eventfeedback evtf, event evn, user_login ulg where ulg.id=evtf.id and evn.eid=evtf.eid and ulg.id=".$row['id']." and evn.eid=".$row['eid']."";
                            
                            $do=mysqli_query($con,$q);
//                            $nrows=mysqli_num_rows($do);
                            $nrows=mysqli_fetch_array($do);
                            
//                            if($nrows==0){
                            if(($row['id']!=$nrows['id']) && ($row['eid']!=$nrows['eid'])){
                            
//                            $counteventaprticipate="Select count(confirm) as 'totalform' from studentevent stdevn, event evt, user_login ulg where evt.eid=stdevn.eid and ulg.id=stdevn.id and confirm='yes' and ulg.id='$id'";
//                            $done=mysqli_query($con,$query);
//                            $rowcheck=mysqli_fetch_array($done);
//                            for($i=0;$i<2;$i++){
                                
                            
                    ?>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"><center>Give your feedback on <h2><?php echo $row['eventname']?></h2> event</center></div>
                       <div class="panel-body">
                            <form class="form-horizontal" method="post">
                          <div class="form-group">
<!--
                            <div class="col-sm-4">
                               <label class="control-label ">Date : </label>
                                <input  class="form-control" id="datepicker3"/>
                            </div>
-->
                            
                          </div>
                          <div class="form-group">
                           <div class="col-sm-6"> 
                          
                           <label class="control-label">How was the event  </label>
                           <span class="label label-danger" id="eoptradioc"></span>
                           
                            <div class="radio">
                            <label class="radio-inline">
                              <input type="radio" name="eoptradio" value="good" id="eoptradio"/>Good
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="eoptradio" value="not so good" id="eoptradio"/>Not so good
                            </label>
                            </div>
                            </div>
                          </div>
                          
                      
                          <div class="form-group"> 
                            <div class=" col-sm-6">
                           
                            <label class="control-label ">Do you think the event was successful     </label>
                              <span class="label label-danger" id="eoptradio1c"></span>
                            <div class="radio">
                            <label class="radio-inline">
                              <input type="radio" name="eoptradio1" value="Yes" id="eoptradio1"/>Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="eoptradio1" value="Not at all" id="eoptradio1"/>Not at all
                            </label>
                            </div>
                            
                            </div>
                          </div>
                          
                          
                           <div class="form-group"> 
                            <div class=" col-lg-10">
                            <label class="control-label ">Do yout think the event was helpful for you  </label>
                             <span class="label label-danger" id="eoptradio2c"></span>
                             <div class="radio">
                            <label class="radio-inline">
                              <input type="radio" name="eoptradio2" value="Yes" id="eoptradio2"/>Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="eoptradio2" value="No" id="eoptradio2"/>No
                            </label>
                            </div>
                         
                            </div>
                          </div>
                          
                          <div class="form-group">
                             <div class="col-sm-10">
                            
                             <label class="control-label">Your Opinion : </label>
                                 <span class="label label-danger" id="eresult3"></span>
                                  <textarea name="econtent" class="form-control" rows="6" id="econtent"></textarea>
                             </div>
                             
                          </div>
                          <input type="hidden" name="ssid" value="<?php echo $id?>" id="ssid"/>
                          <input type="hidden" value='<?php echo $row['eid']?>' name='eventid' id='eventid'/>
                          
                            <div class="form-group"> 
                                <div style="float:right;margin-right:10%">
                                  <input type="button" class="btn btn-success eventfeedbackbutton" id="button" value="Submit">
                                </div>
                            </div>
                        </form>
                        <center><h3><span class="label label-success" id="eresult"></span></h3></center>
                        <center><h3><span class="label label-danger" id="eresult2"></span></h3></center>
                       </div>
                        
                    </div>
                    
                    <?php 
                            }
//                        }
                        }
                                 
                    ?>
                    
                   
                  <script>
                    $(document).ready(function(){
                        $(".eventfeedbackbutton").on('click',function(e){
                            e.preventDefault();
                			var id = $('#ssid').val();
                			var eventid = $('#eventid').val();
                           
                            
                            var content = $('#econtent').val();
                            var optradio = document.getElementsByName('eoptradio');
                            var optradio1 = document.getElementsByName('eoptradio1');
                            var optradio2 = document.getElementsByName('eoptradio2');
                            

                            if(!(optradio[0].checked || optradio[1].checked)){
                                $("#eoptradioc").text("Select one option !!");
                            }else if( !(optradio1[0].checked || optradio1[1].checked)){
                                $("#eoptradio1c").text("Select one option !!");
                            }else if( !(optradio2[0].checked || optradio2[1].checked)){
                                 $("#eoptradio2c").text("Select one option !!");
                            }else if(content==''){
                                $("#eresult3").text("Give information properly !!");
                            }else{



                                for (var i = 0, length = optradio.length; i < length; i++) {
                                    if (optradio[i].checked) {
                                        // do whatever you want with the checked radio
                                        var optradio =(optradio[i].value);

                                        // only one radio can be logically checked, don't check the rest
                                        break;
                                    }
                                }

                                for (var i = 0, length = optradio1.length; i < length; i++) {

                                    if (optradio1[i].checked) {
                                        // do whatever you want with the checked radio
                                        var optradio1 =(optradio1[i].value);

                                        // only one radio can be logically checked, don't check the rest
                                        break;
                                    }
                                }


                                   for (var i = 0, length = optradio2.length; i < length; i++) {
                                    if (optradio2[i].checked) {
                                        // do whatever you want with the checked radio
                                        var optradio2 =(optradio2[i].value);

                                        // only one radio can be logically checked, don't check the rest
                                        break;
                                    }
                                }
                            }
                           
                            if( content !='' && optradio!='' &&  optradio1!='' && optradio2!=''){
                            
                            $.ajax({
                                    type: "POST",
                                    data:{
                                        id: id,
                                        optradio: optradio,
                                        eventid: eventid,
                                        optradio1: optradio1,
                                        optradio2: optradio2,
                                        content: content,
                                    },
                                    url: "operation/eventfeedback.php",
                                    success: function(responseText){
                                        if(responseText==1){
                                           $("#eresult").text("Thank you for your feedback. We will evaluate it soon.");

                                        }else if(responseText==0){
                                            $("#eresult2").append("You can post only one feedback per day !");

                                        }else{
                                            $("#eresult2").text(responseText);
                                        }

                                    },

                                });
                               
                            }
                            
                        });
                    });
                      
                      
                    </script>