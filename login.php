<?php
  $db=new Database();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($db->link,$_POST['name']);
        $qulalification = mysqli_real_escape_string($db->link,$_POST['qulalification']);
        $expertise = mysqli_real_escape_string($db->link,$_POST['expertise']);
        $organization = mysqli_real_escape_string($db->link,$_POST['organization']);
        $chamber = mysqli_real_escape_string($db->link,$_POST['chamber']);
        $location = mysqli_real_escape_string($db->link,$_POST['location']);
        $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $website = mysqli_real_escape_string($db->link,$_POST['website']);
        $details = mysqli_real_escape_string($db->link,$_POST['details']); 

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "images/uploads/".$unique_image;

         if($name==""||$qulalification==""||$expertise==""||$phone=="")
         {
            echo "<span class='error'>Please must fill * field !</span>";
        }elseif ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        } elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } else{
        move_uploaded_file($file_temp, $uploaded_image);

        $query = "INSERT INTO tbl_doc(name, qulalification, expertise, organization, chamber, location, phone, email, website, image, details) 
        VALUES('$name','$qulalification','$name','$expertise','$organization','$chamber','$location','$phone','$email','$website','$uploaded_image','$details')";
        $inserted_rows = $db->insert($query);

        if ($inserted_rows) {
         echo "<span class='success'>Data Inserted Successfully.
         </span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
        }
       }
?>
<div id="myDoctor" class="modal fade" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content mcontent">
            <div class="modal-header mheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Post</h4>
            </div>
        <div class="modal-body mbody">

                         <form action="login.php" method="post" enctype="multipart/form-data">
                                <table class="form">

                                <tr>
                                    <td>
                                         <label>* Doctor's Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" placeholder="Name..." class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <label>* Qualification</label>
                                    </td>
                                    <td>
                                        <input type="text"  name="qulalification" placeholder="Qualification..." class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                      <label>* Expertise</label>
                                    </td>
                                    <td>
                                        <select id="select" name="expertise">
                                        <option value="" >All</option>
                                        <option value="Anesthesiology">Anesthesiology</option>
                                        <option value="Breast Surgeon">Breast Surgeon</option>
                                        <option value="Burn & Plastic Surgeon">Burn & Plastic Surgeon</option>
                                        <option value="Cancer - Oncology">Cancer - Oncology</option>
                                        <option value="Cardiac Surgeon">Cardiac Surgeon</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Cardiovascular & Thoracic Surgeon">Cardiovascular & Thoracic Surgeon</option>
                                        <option value="Chest Surgeon">Chest Surgeon</option>
                                        <option value="Chest, Asthma & Medicine ">Chest, Asthma & Medicine </option>
                                        <option value="Child - Pediatric">Child - Pediatric</option>
                                        <option value="Child Neurology ">Child Neurology </option>
                                        <option value="Child Psycology & Nutrition ">Child Psycology & Nutrition </option>
                                        <option value="Clinical & Interventional Cardiology ">Clinical & Interventional Cardiology </option>
                                        <option value="Clinical Hematology ">Clinical Hematology </option>
                                        <option value="Clinical Oncology">Clinical Oncology</option>
                                        <option value="Colorectal & Laparoscopy Surgeon ">Colorectal & Laparoscopy Surgeon </option>
                                        <option value="Cosmetic & Plastic Surgeon">Cosmetic & Plastic Surgeon</option>
                                        <option value="Critical Care Medicine">Critical Care Medicine</option>
                                        <option value="Dental & Maxillofacial Surgeon">Dental & Maxillofacial Surgeon</option>
                                        <option value="Dentist ">Dentist </option>
                                        <option value="Dermatology">Dermatology</option>
                                        <option value="Dermatology & Venerology ">Dermatology & Venerology </option>
                                        <option value="Diabetes">Diabetes</option>
                                        <option value="Diabetes & Endocrine">Diabetes & Endocrine</option>
                                        <option value="Diabetic Foot & General Surgeon">Diabetic Foot & General Surgeon</option>
                                        <option value="Endoscopic Surgeon ">Endoscopic Surgeon </option>
                                        <option value="ENT - Ear, Nose & Throat  ">ENT - Ear, Nose & Throat  </option>
                                        <option value="ENT - Head & Neck Surgeon">ENT - Head & Neck Surgeon</option>
                                        <option value="Eye ( Ophthalmology )">Eye ( Ophthalmology )</option>
                                        <option value="Eye Surgeon">Eye Surgeon</option>
                                        <option value="Eye Surgeon - Contact Lens & Phaco">Eye Surgeon - Contact Lens & Phaco</option>
                                        <option value="Family Medicine & Sleep Medicine">Family Medicine & Sleep Medicine</option>
                                        <option value="Gastro Intestinal, Liver & Pancreatic Disorder">Gastro Intestinal, Liver & Pancreatic Disorder</option>
                                        <option value="Gastroenterology">Gastroenterology</option>
                                        <option value="Gastroenterology & Hepatology">Gastroenterology & Hepatology</option>
                                        <option value="General & Laparoscopic Surgeon">General & Laparoscopic Surgeon</option>
                                        <option value="General & Plastic Surgeon">General & Plastic Surgeon</option>
                                        <option value="General Surgeon">General Surgeon</option>
                                        <option value="General, Laparoscopic & Colorectal Surgeon">General, Laparoscopic & Colorectal Surgeon</option>
                                        <option value="General, Urology & Laparoscopic Surgeon">General, Urology & Laparoscopic Surgeon</option>
                                        <option value="Gynecological Oncology">Gynecological Oncology</option>
                                        <option value="Gynecology & Obstetrics">Gynecology & Obstetrics</option><option value="Hematology">Hematology</option>
                                        <option value="Hemodialysis - Kidney ">Hemodialysis - Kidney </option>
                                        <option value="Hepatobiliary & Pancreatic Surgeon">Hepatobiliary & Pancreatic Surgeon</option>
                                        <option value="Hepatology ">Hepatology </option>
                                        <option value="Hormone & Diabetes">Hormone & Diabetes</option>
                                        <option value="ICU - Critical Care">ICU - Critical Care</option>
                                        <option value="Immunology">Immunology</option>
                                        <option value="Infertility ">Infertility </option>
                                        <option value="Internal Medicine ">Internal Medicine </option>
                                        <option value="Internal Medicine & Pulmonology">Internal Medicine & Pulmonology</option>
                                        <option value="IVF & Embryology">IVF & Embryology</option>
                                        <option value="Kidney & Medicine">Kidney & Medicine</option>
                                        <option value="Kidney ( Nephrology ) ">Kidney ( Nephrology ) </option>
                                        <option value="Kidney Pediatric ">Kidney Pediatric </option>
                                        <option value="Laparoscopic, Colorectal & Piles Surgeon">Laparoscopic, Colorectal & Piles Surgeon</option>
                                        <option value="Laser Surgeon">Laser Surgeon</option>
                                        <option value="Lithotripsy">Lithotripsy</option>
                                        <option value="Liver ">Liver </option>
                                        <option value="Liver & Gastroenterology">Liver & Gastroenterology</option>
                                        <option value="Liver & Medicine ">Liver & Medicine </option>
                                        <option value="Medcine & Pulmonology ">Medcine & Pulmonology </option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Medicine & Cardiology">Medicine & Cardiology</option>
                                        <option value="Medicine & Child Health">Medicine & Child Health</option><option value="Medicine & Diabetes">Medicine & Diabetes</option>
                                        <option value="Medicine & Endocrinology">Medicine & Endocrinology</option>
                                        <option value="Medicine & Gastroenterology">Medicine & Gastroenterology</option>
                                        <option value="Medicine & Kidney">Medicine & Kidney</option>
                                        <option value="Medicine & liver ">Medicine & liver </option>
                                        <option value="Medicine & Nephrology ">Medicine & Nephrology </option>
                                        <option value="Medicine & Rheumatology">Medicine & Rheumatology</option><option value="Medicine & Surgery ">Medicine & Surgery </option>
                                        <option value="Medicine, Diabetes & Cardilogy ">Medicine, Diabetes & Cardilogy </option>
                                        <option value="Medicine, Hormone & Diabetology">Medicine, Hormone & Diabetology</option>
                                        <option value="Mediicne & Hematology ">Mediicne & Hematology </option>
                                        <option value="Micro Ear, Rhinoplasty, Endoscopic Sinus & Laser ENT Surgeon">
                                        Micro Ear, Rhinoplasty, Endoscopic Sinus & Laser ENT Surgeon</option>
                                        <option value="Neonatal & Child Health">Neonatal & Child Health</option><option value="Nephrology ( Kidney )">Nephrology ( Kidney )</option>
                                        <option value="Neuromedicine">Neuromedicine</option>
                                        <option value="Neurosurgeon">Neurosurgeon</option>
                                        <option value="Neurosurgeon - Brain & Spine">Neurosurgeon - Brain & Spine</option>
                                        <option value="Nuclear Medicine">Nuclear Medicine</option>
                                        <option value="Oral & Dental Surgeon">Oral & Dental Surgeon</option>
                                        <option value="Oral & Maxillofacial Surgeon ">Oral & Maxillofacial Surgeon </option>
                                        <option value="Orthopaedic">Orthopaedic</option>
                                        <option value="Orthopaedic Surgeon">Orthopaedic Surgeon</option>
                                        <option value="Orthopaedic, Spine & Trauma Surgeon">Orthopaedic, Spine & Trauma Surgeon</option>
                                        <option value="Pain Specialist">Pain Specialist</option>
                                        <option value="Pathology & Laboratory">Pathology & Laboratory</option>
                                        <option value="Pathology and Laboratory Services">Pathology and Laboratory Services</option>
                                        <option value="Pediatric - Medicine, Hematology, Oncology">Pediatric - Medicine, Hematology, Oncology</option>
                                        <option value="Pediatric Cardiac Surgeon">Pediatric Cardiac Surgeon</option>
                                        <option value="Pediatric Laparoscopic Surgeon">Pediatric Laparoscopic Surgeon</option>
                                        <option value="Pediatric Neonatology">Pediatric Neonatology</option>
                                        <option value="Pediatric Nephrologist">Pediatric Nephrologist</option>
                                        <option value="Pediatric Neurologist">Pediatric Neurologist</option>
                                        <option value="Pediatric Neurosurgeon ">Pediatric Neurosurgeon </option><option value="Pediatric Orthopedic Surgeon">Pediatric Orthopedic Surgeon</option>
                                        <option value="Pediatric Pulmonology">Pediatric Pulmonology</option>
                                        <option value="Pediatric Surgeon">Pediatric Surgeon</option>
                                        <option value="Pediatric, Urologist & Laparoscopic Surgeon">Pediatric, Urologist & Laparoscopic Surgeon</option>
                                        <option value="Physical Medicine">Physical Medicine</option>
                                        <option value="Physical Medicine & Rehabilitation ">Physical Medicine & Rehabilitation </option>
                                        <option value="Physiotherapy">Physiotherapy</option>
                                        <option value="Plastic & Cosmetic Surgeon">Plastic & Cosmetic Surgeon</option>
                                        <option value="Plastic Surgeon">Plastic Surgeon</option>
                                        <option value="Psychiatry ">Psychiatry </option>
                                        <option value="Psychotherapy">Psychotherapy</option>
                                        <option value="Radiology ">Radiology </option>
                                        <option value="Radiology & Imaging ">Radiology & Imaging </option>
                                        <option value="Respiratory Medicine ">Respiratory Medicine </option>
                                        <option value="Rheumatology ">Rheumatology </option>
                                        <option value="Skin & VD ( Dermatology ) ">Skin & VD ( Dermatology ) </option>
                                        <option value="Skin &VD & Proctor">Skin &VD & Proctor</option>
                                        <option value="Skin and Venereal ">Skin and Venereal </option>
                                        <option value="Sleep & Respiratory Medicine">Sleep & Respiratory Medicine</option>
                                        <option value="Sonology">Sonology</option>
                                        <option value="Sonology & Radiology">Sonology & Radiology</option>
                                        <option value="Surgical Oncology ">Surgical Oncology </option>
                                        <option value="Thoracic & Esophageal Surgeon">Thoracic & Esophageal Surgeon</option>
                                        <option value="Thoracic Surgeon ">Thoracic Surgeon </option>
                                        <option value="Thyroid ">Thyroid </option><option value="Urology">Urology</option>
                                        <option value="Urology & Andrology">Urology & Andrology</option>
                                        <option value="Urology - Renal Transplantation Surgeon">Urology - Renal Transplantation Surgeon</option>
                                        <option value="Urology and Laparoscopic Surgeon">Urology and Laparoscopic Surgeon</option>
                                        <option value="Vascular Surgeon">Vascular Surgeon</option>
                                        <option value="Virology ">Virology </option>
                                        <option value="Vitreo-Retinal Sergeon">Vitreo-Retinal Sergeon</option>                   
                                </select>
                                   </td>
                                </tr>

                                 <tr>
                                    <td>
                                         <label>Organization</label>
                                    </td>
                                    <td>
                                        <input type="text" name="organization" placeholder="Organization..." class="medium" />
                                    </td>
                                </tr>
                                  <tr>
                                    <td>
                                         <label>Chamber</label>
                                    </td>
                                    <td>
                                        <input type="text" name="chamber" placeholder="Chamber..." class="medium" />
                                    </td>
                                </tr>

                                 <tr>
                                    <td>
                                         <label>Location</label>
                                    </td>
                                    <td>
                                        <input type="text" name="location" placeholder="Location..." class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                         <label>* Phone</label>
                                    </td>
                                    <td>
                                        <input type="text" name="phone" placeholder="Phone..." class="medium" />
                                    </td>
                                </tr>

                                  <tr>
                                    <td>
                                         <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" name="email" placeholder="Email..." class="medium" />
                                    </td>
                                </tr>
                                  <tr>
                                    <td>
                                         <label>Website</label>
                                    </td>
                                    <td>
                                        <input type="text" name="website" placeholder="Website..." class="medium" />
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <input type="file" name="image" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                       <label>Details</label>
                                    </td>
                                    <td>
                                       <textarea class="tinymce" name="details" rows="10" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Save" />
                                    </td>
                                </tr>
                                </table>
                        </form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
</div>
</div>



<div id="myDonor" class="modal fade" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content mcontent ">
            <div class="modal-header mheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Post</h4>
            </div>
        <div class="modal-body mbody">

                        <form action="" method="" enctype="multipart/form-data">
                                <table class="form">

                                <tr>
                                    <td>
                                         <label>Title</label>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Enter Post Title..." class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                      <label>Category</label>
                                    </td>
                                    <td>
                                        <select id="select" name="select">
                                        <option value="1">Category One</option>
                                        <option value="2">Category Two</option>
                                        <option value="3">Cateogry Three</option>
                                        </select>
                                   </td>
                                </tr>


                                <tr>
                                    <td>
                                         <label>Date Picker</label>
                                    </td>
                                    <td>
                                         <input type="text" id="date-picker" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <input type="file" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                       <label>Content</label>
                                    </td>
                                    <td>
                                       <textarea class="tinymce" rows="10" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Save" />
                                    </td>
                                </tr>
                                </table>
                        </form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
</div>
</div>

<div id="myUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content mcontent  ">
            <div class="modal-header mheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Post</h4>
            </div>
        <div class="modal-body mbody">

                        <form action="" method="" enctype="multipart/form-data">
                                <table class="form">

                                <tr>
                                    <td>
                                         <label>Title</label>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Enter Post Title..." class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                      <label>Category</label>
                                    </td>
                                    <td>
                                        <select id="select" name="select">
                                        <option value="1">Category One</option>
                                        <option value="2">Category Two</option>
                                        <option value="3">Cateogry Three</option>
                                        </select>
                                   </td>
                                </tr>


                                <tr>
                                    <td>
                                         <label>Date Picker</label>
                                    </td>
                                    <td>
                                         <input type="text" id="date-picker" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <input type="file" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                       <label>Content</label>
                                    </td>
                                    <td>
                                       <textarea class="tinymce" rows="10" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Save" />
                                    </td>
                                </tr>
                                </table>
                        </form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
</div>
</div>