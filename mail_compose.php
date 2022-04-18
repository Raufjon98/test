<?php
session_start();
include 'conn.php';
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}

echo $_POST['id_this'];
    ?>

<div class="mail-box">
    <div>
        <form role="form" method="post" action="newNewUpload.php" id="formUpload" enctype="multipart/form-data">
            <!--        Type of sending-->
            <div class="">

            </div>
            <div>
<!--                col-md-3-->
                <div class="i-checks col-md-2"  style="margin: 1%">
                    <label> Барои кӣ: </label>
                </div>
                <div class="i-checks col-md-2"  style="margin: 1%">
                    <label><input id="human_checkbox" value="human_checkbox" name="check" type="radio" class="i-checks"  checked> Шахси алоҳида</label>
                </div>
                <div class="i-checks col-md-2"  style="margin: 1%">
                    <label>
                <input id="group_checkbox" value="group_checkbox" name="check" type="radio" class="i-checks"> Гурӯҳ </label>
                </div>
                <div class="i-checks col-md-2" style="margin: 1%">
                    <label>
                <input id="people_checkbox" value="people_checkbox" name="check" type="radio" class="i-checks"> Якчанд нафар </label>
                </div>
                <div class="i-checks col-md-2" style="margin: 1%">
                    <label>
                        <input id="all_people_checkbox" value="all_people_checkbox" name="check" type="radio" class="i-checks"> Ҳама </label>
                </div>
            </div><br>
            <div  id="all_people" class="col-lg-12" style="margin: 1.5%">
                <b>Ҳамаи истифодабарандагон интихоб шуданд!</b>
            </div>

            <!--        Type_group -->
            <div id="group">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-4 " style="margin: 1.5%">
                            <fieldset>
                                <div class="checkbox checkbox-success">
                                    <table>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM groups";
                                        $nat = $conn->query($sql);
                                        while ($row = mysqli_fetch_assoc($nat)) {
                                            echo "<tr> ";
                                            echo "<td><label><input class='i-checks select_group'  type='checkbox' name='department[]' value='" . $row['group_id'] . "'><i></i>  <b>" . $row['group_name'] . "</b></label></td>";
                                            echo "<td style='height: 40px; width: 40px'><button type='button' TITLE='Аъзоён' class='btn btn-primary btn-circle ShowMembers' id='" . $row['group_id'] . "' name='gmember'><i class='fa fa-list'></i></button> </td>";
//                                            echo "<td><img src='\img\icons\gteamwork.png' style='height: 30px; width: 30px'></td>";
//                                            echo "<td><img src='\img\icons\icon-group.png' style='height: 40px; width: 60px'></td>";

//                                            <img src="img.jpg" width="30%" align="center" border="3" hspace="10%" vspace="10%" />

//                                            echo "<td><div class='infont col-md-3 col-sm-4'><a href='#'><i class='fa fa-group'></i><span class='text-muted'></span></a></div></td>";
                                        };
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <div class="col-md-6" >
                                <input type="button" value="Тозакунӣ" class="btn btn-primary btn-outline clear" datatype="default" style="width: 100%; ">
                            </div>
                        </div>
                        <div  id="members" style="height: 200px;margin-top: 3%; overflow-y: auto;overflow-x: auto; " class=" col-md-6">
                            <ul id="g_member" class="folder-list m-b-md" style="padding: 0"></ul>
<!--                            <select id="g_member" class="form-control" size="3">-->
<!--                            </select>-->

                        </div>
                    </div>


                </div>

            </div>

            <!--one person-->

                <div id="person" style="margin: 1.5%">
                    <select data-placeholder="Қабулкунандаро интихоб кунед!" class="select2_demo_3 form-control" tabindex="2" name="persons[]   " >
                        <?php
                        $sql = "SELECT * FROM users_tmp WHERE user_id !=0 ORDER by user_id";
                        $nat = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($nat)) {
                            echo "<img  class='img-circle' src='".$row['image']."' width='70' height='70' />";
                            if($_GET['id_reply']== $row['user_id']){
                                echo "<option value='" . $row['user_id'] . "' selected style='background-image:url(".$row['image'].");'>" . $row['fio'] . "</option>";
                            }else{
                            echo "<option value='" . $row['user_id'] . "'  style='background-image:url(".$row['image'].");'>" . $row['fio'] . "</option>";
                            }
                        };
                        ?>
                    </select>
                </div>
            <!--Some persons!-->
            <div id="people" style="margin: 1.5%">

                        <select class="select2_demo_2 form-control" multiple="multiple" name="creategroup[] " data-placeholder="Қабулкунандагонро интихоб кунед!" >
                            <?php
                            $sql_person = "SELECT * FROM users_tmp";
                            $nat_person = $conn->query($sql_person);
                            while ($row_person = mysqli_fetch_assoc($nat_person)) {
                                echo "<option value='" . $row_person['user_id'] . "'>" . $row_person['fio'] . "</option>";
                            };
                            ?>
                        </select>

                    
            </div>

            <!--        To add file!-->
            <br>

            <div class="alert alert-danger alert-dismissible" id="validation_mail" style="margin: 1.5%">
                <!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                <h3>
                    Формати нодуруст интихоб шуд!</h3>
                <?php
                echo "Намуди файли дурустро барои фиристодан интихоб намоед!
                Бояд файлҳои намуди 'png', 'jpg', 'doc', 'zip', 'pdf', 'rar', 'txt', 'docx', 'xls', 'xlsx', 'pptx','ppt','pptm' интихоб карда шаванд! ";
                ?>
            </div>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput" style="padding: 1.5%">
                <div class="form-control" data-trigger="fileinput"><i
                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                            class="fileinput-filename"></span></div>
                <span class="input-group-addon btn btn-default btn-file"><span
                            class="fileinput-new">Интихоби файл</span><span
                            class="fileinput-exists">Ивазкунӣ</span><input type="file"  name="uploadedFile[]" id="uploadedfile" multiple="multiple" accept="jpg, PNG, png, jpeg, doc, docx, zip, pdf, rar, txt, xls, xlsx, pptx, ppt, pptm"></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                   data-dismiss="fileinput">Хориҷқунӣ</a>
            </div>

            <div>
                <div class="col-lg-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Номи ҳуҷҷат</label>
                        <input type="text" name="doc_name" class="form-control" placeholder="Ворид ..." required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12" style="margin: 1.5%">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Матни ҳуҷҷат</label>
                        <!-- /.card-header -->
                        <div class="mb-3">
                        <textarea name="comment" class="textarea" placeholder="Матнро ворид кунед!"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="ibox-content no-padding" style="height: 5%">-->
<!--                <div id="comment" class="summernote" name="comment">-->
<!--                </div>-->
<!--            </div>-->
            <div class="card-footer">
                <button type="submit" name="uploadBtn" value="Upload" class="btn btn-primary"   id="showsimple">Фиристодани маълумот
                </button>
            </div>
        </form>
    </div>
</div>
