<!doctype html>
<html lang="en">
<?php
    include "../ini.php";
    include $layout['head'];
    $course->execute([$_GET['id']]);
    $viewCourse = $course->fetch();
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
                <?php echo "course {$viewCourse['title']}";?>
            </h2>
        </div>
        <!-- layout -->
        <div class="flex flex-row w-full">
            <!-- content -->
            <div class="flex flex flex-col w-full">
                <?php
                        echo "
                            <div class='flex flex-col'>
                                <div class='flex items-center'>
                                  {$viewCourse['date_start']} from  to {$viewCourse['date_end']} totally {$viewCourse['total_hours']} hours
                                </div>
                                <div>
                                    <p>
                                       {$viewCourse['note']}
                                    </p>
                                </div>
                                <div class='w-full'>
                                    <img class='w-full' alt='{$viewCourse['title']}'  src='{$viewCourse['attachment']}' />
                                </div>
                            </div>
                        "
                    ;
                ?>
            </div>
        </div>
    </div>
</body>
</html>