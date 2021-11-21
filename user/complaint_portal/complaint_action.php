<?php

require_once '../config.php';

//Check input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['id']) && isset($_POST['v_district'])) {
    $filename1 = $_FILES['evidence1']['name'];
    $filename2 = $_FILES['evidence2']['name'];
    $filename3 = $_FILES['evidence3']['name'];
    $filename4 = $_FILES['evidence4']['name'];
    $filename5 = $_FILES['evidence5']['name'];


    
    if ($filename1 != null) {

        $tmpname = $_FILES['evidence1']['tmp_name'];
        $file_size = $_FILES['evidence1']['size'];
        $file_type1 = $_FILES['evidence1']['type'];

        $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);


        $fp      = fopen($tmpname, 'r');
        $content1 = fread($fp, filesize($tmpname));
        $content1 = addslashes($content1);
        fclose($fp);


        if (
            $ext1 != "mp4" && $ext1!="MP4" && $ext1!="png" && $ext1 != "PNG" && $ext1 != "JPG" && $ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "JPEG"
            && $ext1 != "pdf" && $ext1 != "PDF" && $ext1 != "doc" && $ext1 != "DOC" && $ext1 != "docx" && $ext1 != "DOCX"
            && $ext1 != "XLS" && $ext1 != "xls" && $ext1 != "XLSX" && $ext1 != "xlsx" && $ext1 != "xlsm" && $ext1 != "XLSM" && $ext1 != "TXT"
        ) { //show error
        }
    }
    else{
        $content1=NULL;
        $file_type1=NULL;

    }


    
    
    if ($filename2 != null) {

        $tmpname = $_FILES['evidence2']['tmp_name'];
        $file_size = $_FILES['evidence2']['size'];
        $file_type2 = $_FILES['evidence2']['type'];

        $ext2 = pathinfo($filename1, PATHINFO_EXTENSION);


        $fp      = fopen($tmpname, 'r');
        $content2 = fread($fp, filesize($tmpname));
        $content2 = addslashes($content2);
        fclose($fp);


        if (
            $ext2 != "mp4" && $ext2!="MP4" && $ext2!="png" && $ext2 != "PNG" && $ext2 != "JPG" && $ext2 != "jpg" && $ext2 != "jpeg" && $ext2 != "JPEG"
            && $ext2 != "pdf" && $ext2 != "PDF" && $ext2 != "doc" && $ext2 != "DOC" && $ext2 != "docx" && $ext2 != "DOCX"
            && $ext2 != "XLS" && $ext2 != "xls" && $ext2 != "XLSX" && $ext2 != "xlsx" && $ext2 != "xlsm" && $ext2 != "XLSM" && $ext2 != "TXT"
        ) { //show error
        }
    }
    else{
        $content2=NULL;
        $file_type2=NULL;

    }


    
    
    if ($filename3 != null) {

        $tmpname = $_FILES['evidence3']['tmp_name'];
        $file_size = $_FILES['evidence3']['size'];
        $file_type3 = $_FILES['evidence3']['type'];

        $ext3 = pathinfo($filename1, PATHINFO_EXTENSION);


        $fp      = fopen($tmpname, 'r');
        $content3 = fread($fp, filesize($tmpname));
        $content3 = addslashes($content3);
        fclose($fp);


        if (
            $ext3 != "mp4" && $ext3!="MP4" && $ext3!="png" && $ext3 != "PNG" && $ext3 != "JPG" && $ext3 != "jpg" && $ext3 != "jpeg" && $ext3 != "JPEG"
            && $ext3 != "pdf" && $ext3 != "PDF" && $ext3 != "doc" && $ext3 != "DOC" && $ext3 != "docx" && $ext3 != "DOCX"
            && $ext3 != "XLS" && $ext3 != "xls" && $ext3 != "XLSX" && $ext3 != "xlsx" && $ext3 != "xlsm" && $ext3 != "XLSM" && $ext3 != "TXT"
        ) { //show error
        }
    }
    else{
        $content3=NULL;
        $file_type3=NULL;

    }


    
    
    if ($filename4 != null) {

        $tmpname = $_FILES['evidence4']['tmp_name'];
        $file_size = $_FILES['evidence4']['size'];
        $file_type4 = $_FILES['evidence4']['type'];

        $ext4 = pathinfo($filename1, PATHINFO_EXTENSION);


        $fp      = fopen($tmpname, 'r');
        $content4 = fread($fp, filesize($tmpname));
        $content4 = addslashes($content4);
        fclose($fp);


        if (
            $ext4 != "mp4" && $ext4!="MP4" && $ext4!="png" && $ext4 != "PNG" && $ext4 != "JPG" && $ext4 != "jpg" && $ext4 != "jpeg" && $ext4 != "JPEG"
            && $ext4 != "pdf" && $ext4 != "PDF" && $ext4 != "doc" && $ext4 != "DOC" && $ext4 != "docx" && $ext4 != "DOCX"
            && $ext4 != "XLS" && $ext4 != "xls" && $ext4 != "XLSX" && $ext4 != "xlsx" && $ext4 != "xlsm" && $ext4 != "XLSM" && $ext4 != "TXT"
        ) { //show error
        }
    }
    else{
        $content4=NULL;
        $file_type4=NULL;

    }


    
    
    if ($filename5 != null) {

        $tmpname = $_FILES['evidence5']['tmp_name'];
        $file_size = $_FILES['evidence5']['size'];
        $file_type5 = $_FILES['evidence5']['type'];

        $ext5 = pathinfo($filename1, PATHINFO_EXTENSION);


        $fp      = fopen($tmpname, 'r');
        $content5 = fread($fp, filesize($tmpname));
        $content5 = addslashes($content5);
        fclose($fp);


        if (
            $ext5 != "mp4" && $ext5!="MP4" && $ext5!="png" && $ext5 != "PNG" && $ext5 != "JPG" && $ext5 != "jpg" && $ext5 != "jpeg" && $ext5 != "JPEG"
            && $ext5 != "pdf" && $ext5 != "PDF" && $ext5 != "doc" && $ext5 != "DOC" && $ext5 != "docx" && $ext5 != "DOCX"
            && $ext5 != "XLS" && $ext5 != "xls" && $ext5 != "XLSX" && $ext5 != "xlsx" && $ext5 != "xlsm" && $ext5 != "XLSM" && $ext5 != "TXT"
        ) { //show error
        }
    }
    else{
        $content5=NULL;
        $file_type5=NULL;

    }



    $complainant_id = test_input($_POST['id']);
    $title = $_POST['title'];
    $victim_name = $_POST['v_name'];
    $victim_addr = test_input($_POST['v_address']);
    $victim_dist = $_POST['v_district'];///////////////////
    $victim_contact = test_input($_POST['v_contact']);
    $victim_email = test_input($_POST['v_email']);
    $victim_nic = test_input($_POST['v_nic']);
    $victim_age = test_input($_POST['v_age']);

    $res_name = test_input($_POST['r_name']);
    $res_addr = test_input($_POST['r_address']);
    $res_dist = $_POST['r_district'];//////////////////////
    $res_sex = $_POST['r_sex'];//////
    $res_age = test_input($_POST['r_age']);
    $res_desc = test_input($_POST['r_description']);

    $wt1_name = test_input($_POST['w_name1']);
    $wt1_contact = test_input($_POST['w_contact1']);
    $wt2_name = test_input($_POST['w_name2']);
    $wt2_contact = test_input($_POST['w_contact2']);

    $incident_date = test_input($_POST['i_date']);
    $incident_location = test_input($_POST['i_location']);
    $victim_state = test_input($_POST['i_description_state']);
    $incident_desc = test_input($_POST['i_description']);

    $sql = "INSERT INTO complaints (complainant_id,title,victim_name,victim_addr,victim_dist,victim_contact,victim_email,victim_nic,victim_age,
            res_name,res_addr,res_dist,res_sex,res_age,res_desc,wit1_name,wit1_contact,wit2_name,wit2_contact,incident_date,incident_location,
            victim_state,incident_desc,evidence1,e1_type,evidence2,e2_type,evidence3,e3_type,evidence4,e4_type,evidence5,e5_type) VALUES 
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'".$content1."','".$file_type1."','".$content2."','".$file_type2."','".$content3."','".$file_type3."','".$content4."','".$file_type4."','".$content5."','".$file_type5."')";
    if ($stmt = $link->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        if ($stmt->bind_param(
            "isssssssissssisssssssss",
            $param_cid,
            $param_title,
            $param_vname,
            $param_vaddr,
            $param_vdist,
            $param_vcontact,
            $param_vemail,
            $param_vnic,
            $param_vage,
            $param_rname,
            $param_raddr,
            $param_rdist,
            $param_rsex,
            $param_rage,
            $param_rdesc,
            $param_w1name,
            $param_w1contact,
            $param_w2name,
            $param_w2contact,
            $param_idate,
            $param_ilocation,
            $v_state,
            $i_desc
        ))

            // Set parameters
        $param_cid = $complainant_id;
        $param_title=$title;
        $param_vname = $victim_name;
        $param_vaddr = $victim_addr;
        $param_vdist = $victim_dist;
        $param_vcontact = $victim_contact;
        $param_vemail = $victim_email;
        $param_vnic = $victim_nic;
        $param_vage =  $victim_age;

        $param_rname = $res_name;
        $param_raddr = $res_addr;
        $param_rdist = $res_dist;
        $param_rsex = $res_sex;
        $param_rage = $res_age;
        $param_rdesc = $res_desc;

        $param_w1name = $wt1_name;
        $param_w1contact = $wt1_contact;
        $param_w2name = $wt2_name;
        $param_w2contact = $wt2_contact;
        $param_idate = $incident_date;
        $param_ilocation = $incident_location;
        $v_state = $victim_state;
        $i_desc = $incident_desc;


        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Success";
        } else {

            echo  $stmt->error;
            echo "Something went wrong when executing. Please try again later.";
        }
        // Close statement
        $stmt->close();
    }
   
}
 // Close connection
 $link->close();
