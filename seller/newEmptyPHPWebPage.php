 <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body p-states" style="padding-top: 35px;">
                                            <div class="summary pull-left">
                                                
                                                <div class="form-group">
                                                        <label>Mobile No</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="mobile" maxlength="10"  required="" pattern="^[0-9]+$" placeholder="Enter Mobile No"/>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <div class="form-group">
                                                    <label>Web site</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="website"  required="" pattern="^[a-zA-Z0-9@.-_ ]+$" placeholder="Enter Website"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body" style="padding-top: 30px;">
                                            <ul class="p-info">
                                                <div class="form-group">
                                                    <label>Store Image</label>
                                                    <div class="input-group">
                                                        <input type="file" name="storeimage" required="" class="form-control" title="Store Image" />
                                                    <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($er3 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Invalid Profile</font>";
                                                    }
                                                    if ($er4 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Maximum 5 MB Allow</font>";
                                                    }
                                                ?>
                                                </div>
                                                 
                                                 <div class="form-group">
                                                    <label>Visiting Card</label>
                                                    <div class="input-group">
                                                        <input type="file" name="visitingcard" required="" class="form-control" title="visitingcard" />
                                                    <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($er5 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Invalid visitingcard</font>";
                                                    }
                                                    if ($er6 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Maximum 5 MB Allow</font>";
                                                    }
                                                ?>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Time duration</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="timeduration" required=""  pattern="^[a-zA-Z0-9-, ]+$" placeholder="Enter opening and closing time"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Goverment Registration</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="registration" required="" pattern="^[a-z_- ]+$" placeholder="Enter Registration"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                  
                                              
                                                <div class="form-group">
                                                    <label>Since</label>
                                                    <div class="input-group">
                                                        <input type="text" name="since" class="form-control" required="" pattern="^[0-9]+$" placeholder="Enter Since"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fax No</label>
                                                    <div class="input-group">
                                                        <input type="text" name="fax" class="form-control"  required="" pattern="^[0-9 ]+$" placeholder="Enter Fax"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Starting Date</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="startdate" />
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ending Date</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"  name="enddate" />
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="form-group">
                                                    <label>Food Type</label>
                                                    <div class="input-group">
                                                        <select name="foodtype" class="form-control" required="">
                                                            <option>--Food Type--</option>
                                                            <option value="veg">Veg</option>
                                                            <option value="nonveg" >Non Veg</option>
                                                            <option value="mix">MIX</option>
                                                           
                                                        </select>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                     <div class="form-group">
                                                    <label>Cover Photo</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" required="" name="coverphoto" title="Cover Photo" />
                                                    <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                     <?php
                                                    if ($er7 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Invalid cover photo</font>";
                                                    }
                                                    if ($er8 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Maximum 5 MB Allow</font>";
                                                    }
                                                ?>
                                                </div>
                                                
                                                <div class="row">
                                            <div class="col-md-5">
                                                <div  style="background: #f8a631;background-repeat: no-repeat;padding:2px; color:#fff;" name="dekocapcha" id="capcha">
                                                </div>

                                            </div>
                                            <div class="col-md-1 text-center" style="padding-top: 13px; margin-left: -3%;">
                                                <i class="fa fa-rotate-right refreshbtn"  onclick="cap();" ></i>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" placeholder="Enter Capcha" name="capcha" required="" pattern="^[a-zA-Z0-9]+$" style="padding: 10px;" />
                                                <div class="input-group-addon regi">
                                                    <i class="fa fa-pencil "></i>
                                                </div>
                                            </div>
                                        </div>
                                                
                                                <?php
                                                if ($er2 == 1) {
                                                    echo '<font color=red size=2>not match..!</font>';
                                                }
                                                ?>
                                            </div>


                                        </div>
                                          
                                        </div>
                                    </div>
                                </div>
  
                            </div>
                        </div>


