<!doctype html>
<html lang="en">
<?php
    include "../ini.php";
    include $layout['head'];
    $courses->execute();
    $viewCourses = $courses->fetchAll();
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
                <?php echo $pages['courses']['title'];?>
            </h2>
        </div>
        <!-- layout -->
        <div class="flex flex-row w-full">
            <!-- content -->
            <div class="flex flex flex-col w-full">
                <table class="text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Course Name</th>
                            <th rowspan="2">Total Hours</th>
                            <th colspan="2">
                                Date
                            </th>
                            <th rowspan="2">Institution</th>
                            <th rowspan="2">Attachment</th>
                            <th rowspan="2">Note</th>
                        </tr>
                        <tr>
                            <th>To</th>
                            <th>From</th>
                        </tr>
                    </thead>
                    <?php
                    foreach($viewCourses as $courses){
                        echo "
                            <tr>
                                <td>{$courses['id']}</td>
                                <td>{$courses['title']}</td>
                                <td>{$courses['total_hours']}</td>
                                <td>{$courses['date_start']}</td>
                                <td>{$courses['date_end']}</td>
                                <td>{$courses['institution']}</td>
                                <td><a href='viewCourse.php?id={$courses['id']}'>View</a></td>
                                <td>{$courses['note']}</td>
                            </tr>
                        ";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>