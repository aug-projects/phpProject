<!doctype html>
<html lang="en">
    <?php
        include "../ini.php";
        include $layout['head'];
        $properties->execute();
        $rows = $properties->fetchAll();

        $user->execute();
        $userData = $user->fetch();
    ?>
    <body>
    <!-- header -->
    <?php
        include $layout['header'];
    ?>
    <div class="mx-8 flex flex-col">
        <!-- title -->
        <div class="w-full">
            <h2 class="font-title text-left">
                <?php echo $pages['home']['title'];?>
            </h2>
        </div>
        <!-- layout -->
        <div class="flex flex-row w-full">
            <!-- content -->
            <div class="flex flex flex-col w-3/5">
                <?php
                    foreach($rows as $key => $row){
                        $startMonth =  date('dS, M Y',strtotime($userData['birth']));
                        $dataRow = ($row['name'] != 'birth' ? $userData[$row['name']] : $startMonth);
                        echo "
                            <div class='grid grid-col-2 my-4'>
                                <div>{$row['values']} :</div>
                                <div class='font-sub-title'>
                                    {$dataRow}
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>
            <!-- image -->
            <?php
                echo "
                    <div class='text-center w-2/5'>
                        <img src='{$pages['home']['image']}' class='border p-2' alt='logo'  title='logo'/>
                    </div>
                ";
            ?>
        </div>
    </div>
</body>
</html>