<!doctype html>
<html lang="en">
    <?php
        include "../ini.php";
        include $layout['head'];
        include "../HelperFormValidation.php";
        $form = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name           = $_POST["name"] ?? "";
            $hours          = $_POST["hours"] ?? "";
            $startDate      = $_POST["startDate"] ?? "";
            $endDate        = $_POST["endDate"] ?? "";
            $institution    = $_POST["institution"] ?? "";
            $attachmentType = $_POST["attachment"] ?? "";
            $attachment     = '';
            $url            = $_POST["url"] ?? "";
            $file           = $_POST["file"] ?? "";
            $note           = $_POST["note"] ?? "";

            if ($attachmentType == "file") {
                $imageName = $_FILES['file']['name'];
                $attachment = "../uploads/".basename($imageName);
                move_uploaded_file($_FILES['file']['tmp_name'], $attachment);
            }else{
                $attachment = $url;
            }

            //check validation
            $form = (new HelperFormValidation())
                ->required($name,"name")
                ->required($hours,"hours")
                ->required($startDate,"start date")
                ->required($endDate,"end date")
                ->required($attachment,"attachment")
                ->date($startDate)
                ->date($endDate)
                ->dateAfter($startDate,$endDate)
                ->required($institution,"institution")
                ->required($note,"note");

            if (empty($form->errors)) {
                try {

                    $addCourse->execute([$name, $hours, $startDate, $endDate, $institution,$attachmentType, $attachment, $note]);

                } catch (Exception $exception) {
                    echo $exception->getMessage();
                }
            }
        }
    ?>
<body>
    <!-- header -->
    <?php
        include $layout['header'];
    ?>
    <div class="mx-8 flex flex-col mb-8">
        <!-- title -->
        <div class="w-full">
            <h2 class="font-title text-left">
                <?php echo $pages['add-courses']['title'];?>
            </h2>
        </div>
        <!-- layout -->
        <div class="flex flex-row w-full">
            <!-- content -->
            <div class="flex flex flex-col w-3/5">
               <form method="post" action="addCourse.php" enctype="multipart/form-data">
                   <!-- Course Name -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="name">Course Name:</label>
                       </div>
                       <div>
                           <input id="name" class="w-3/4" name="name" type="text" required/>
                       </div>
                   </div>
                   <!-- Number of Hours -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="hours">Number of Hours:</label>
                       </div>
                       <div>
                           <input id="hours" class="w-3/4" name="hours" type="number" required/>
                       </div>
                   </div>
                   <!-- Start Date -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="startDate">Start Date</label>
                       </div>
                       <div>
                           <input id="startDate" class="w-3/4" name="startDate" type="date" required/>
                       </div>
                   </div>
                   <!-- End Date -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="endDate">End Date:</label>
                       </div>
                       <div>
                           <input id="endDate" class="w-3/4" name="endDate" type="date" required/>
                       </div>
                   </div>
                   <!-- Institution -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="institution">Institution:</label>
                       </div>
                       <div>
                           <input id="institution" class="w-3/4" name="institution" type="text" required/>
                       </div>
                   </div>
                   <!-- Attachment -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="attachment">Attachment:</label>
                       </div>
                       <div class="flex">
                           <div class="flex items-center">
                               <input id="attachment" class="mx-2" name="attachment" value="file" type="radio" required/>
                               <label for="attachment">File</label>
                           </div>
                           <div class="flex items-center ml-8">
                                <input id="attachment" class="mx-2" name="attachment" value="url" type="radio" required/>
                                <label for="attachment">URl</label>
                           </div>
                       </div>
                   </div>
                   <!-- URL -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="url">URL:</label>
                       </div>
                       <div>
                           <input id="url" class="w-3/4" name="url" type="url"/>
                       </div>
                   </div>
                   <!-- File -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="file">File:</label>
                       </div>
                       <div>
                           <input id="file" class="w-3/4" name="file" type="file" accept="image/*"/>
                       </div>
                   </div>
                   <!-- Note -->
                   <div class="grid grid-col-2 mb-4">
                       <div>
                           <label for="note">Note:</label>
                       </div>
                       <div>
                           <textarea id="note" class="w-3/4" name="note" cols="3" rows="5" required></textarea>
                       </div>
                   </div>
                   <div class="flex flex-col w-full">
                       <?php
                            if(!empty($form->errors)){
                                foreach ($form->errors as $error){
                                    echo "<div class='flex flex-col bg-danger text-white p-2 rounded my-2'>$error</div>";
                                }
                            }
                       ?>
                   </div>
                   <div class="flex justify-around">
                       <div class="w-1/2 mx-8">
                           <button type="submit" class="bg-success border-none w-full py-2 text-white mx-2 rounded">Save</button>
                       </div>
                       <div class="w-1/2 mx-8">
                           <button type="reset" value="Reset" class="bg-danger border-none w-full py-2 text-white mx-2 rounded">Reset</button>
                       </div>
                   </div>
               </form>
            </div>
            <!-- image -->
            <?php
                echo "
                    <div class='text-center w-2/5'>
                        <img src='{$pages['add-courses']['image']}' class='w-3/4' alt='logo'  title='logo'/>
                    </div>
                ";
            ?>
        </div>
    </div>
</body>
</html>