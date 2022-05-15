<!doctype html>
<html lang="en">
<?php
        include "../ini.php";
        include $layout['head'];
        include "../HelperFormValidation.php";
        $form = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name            = $_POST["name"] ?? "";
            $category        = $_POST["category"]?? "";
            $startMonth      = $_POST["startMonth"]?? "";
            $endMonth        = $_POST["endMonth"]?? "";
            $institution     = $_POST["institution"]?? "";
            $description            = $_POST["description"] ?? "";
            //check validation
            $form = (new HelperFormValidation())
                ->required($name,"name")
                ->required($category,"Experiences  Category")
                ->required($startMonth,"start month")
                ->date($startMonth)
                ->date($endMonth)
                ->dateAfter($startMonth,$endMonth)
                ->required($institution,"institution")
                ->required($description,"description");

            if (empty($form->errors)) {
                try {
                    
                    $addExperience->execute([$name, $category, $startMonth, $endMonth, $institution, $description]);

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
            <?php echo $pages['add-experiences']['title'];?>
        </h2>
    </div>
    <!-- layout -->
    <div class="flex flex-row w-full">
        <!-- content -->
        <div class="flex flex flex-col w-3/5">
            <form method="post" action="addExperience.php">
                <!-- Number of Hours -->
                <div class="grid grid-col-2 mb-4">
                    <div>
                        <label for="category">Experiences Category:</label>
                    </div>
                    <div>
                        <select id="category" class="w-3/4" name="category" required>
                            <?php
                                foreach ($categories as $category){
                                    echo "<option value='$category'>$category</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Experiences Name -->
                <div class="grid grid-col-2 mb-4">
                    <div>
                        <label for="name">Experiences Title:</label>
                    </div>
                    <div>
                        <input id="name" class="w-3/4" name="name" type="text" required/>
                    </div>
                </div>
                <!-- Start Month -->
                <div class="grid grid-col-2 mb-4">
                    <div>
                        <label for="startMonth">Start Month</label>
                    </div>
                    <div>
                        <input id="startMonth" class="w-3/4" name="startMonth" type="date" required/>
                    </div>
                </div>
                <!-- End Month -->
                <div class="grid grid-col-2 mb-4">
                    <div>
                        <label for="endMonth">End Month:</label>
                    </div>
                    <div>
                        <input id="endMonth" class="w-3/4" name="endMonth" type="date"/>
                    </div>
                </div>
                <!-- Institution -->
                <div class="grid grid-col-2 mb-4">
                    <div>
                        <label for="institution">Institution:</label>
                    </div>
                    <div>
                        <input id="institution" class="w-3/4" name="institution" type="number" required/>
                    </div>
                </div>
                <!-- Description -->
                <div class="grid grid-col-2 mb-4">
                    <div>
                        <label for="description">Description:</label>
                    </div>
                    <div>
                        <textarea id="description" class="w-3/4" name="description" cols="3" rows="5" required></textarea>
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
                        <button type="reset" class="bg-danger border-none w-full py-2 text-white mx-2 rounded">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- image -->
        <?php
            echo "
                    <div class='text-center w-2/5'>
                        <img src='{$pages['add-experiences']['image']}' class='w-full' alt='logo'  title='logo'/>
                    </div>
                ";
        ?>
    </div>
</div>
</body>
</html>