<!doctype html>
<html lang="en">
<?php
    include "../ini.php";
    include $layout['head'];
    $experiences->execute();
    $viewExperiences = $experiences->fetchAll();
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
                <?php echo $pages['experience']['title'];?>
            </h2>
        </div>
        <!-- layout -->
        <div class="flex flex-row w-full">
            <!-- content -->
            <div class="flex flex flex-col w-full">
                <?php
                    foreach($viewExperiences as $experience){
                       $startMonth =  date('m-Y',strtotime($experience['start_month']));
                       $endMonth = $experience['end_month'] ?  date('m-Y',strtotime($experience['end_month'])) : 'until present';
                        echo "
                            <div class='flex flex-col'>
                                <div class='flex items-center'>
                                    <h2 class='flex font-sub-title'>{$experience['title']}</h2>
                                    <span class='mx-2 flex'>{$experience['institution']}/{$experience['category']}</span>
                                </div>
                                <div>
                                    <h5>from $startMonth to $endMonth</h5>
                                    <p>
                                        {$experience['description']}
                                    </p>
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>