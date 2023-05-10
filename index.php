<?php
    include("connect.php");
?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>ITech_Laba2_Var1</title>
        <script src="/js/script.js"></script>
    </head>
    <body>
        <h1>Какие пары у группы</h1>
        <form action="get_by_group.php" method="get">
            <select id="getByGroup" name="groups">
                <?php
                try {
                    $all_groups = $collections->distinct("groups");
                    foreach ($all_groups as $i) {
                        echo "<option>";
                        echo $i;
                        echo "</option>";
                    }
                } catch (Throwable $e) {
                    echo $e->getMessage();
                }
                ?>
            </select>
            <input type="submit" value="Get">
        </form>
        <br />
        
        <h1>Получить информацию пары и преподавателем</h1>
        <form action="get_by_teacher.php" method="get">
            <select id="getByDiscipline" name="discipline">
                <?php
                try {
                    $all = $collections->distinct("discipline");
                    foreach ($all as $i) {
                        echo "<option>";
                        echo "$i";
                        echo "</option>";
                    }
                } catch (Throwable $e) {
                    echo $e->getMessage();
                }
                ?>
            </select>
            <select id="getByTeacher" name="teacher">
                <?php
                try {
                    $all = $collections->distinct("teacher");
                    foreach ($all as $i) {
                        echo "<option>";
                        echo "$i";
                        echo "</option>";
                    }
                } catch (Throwable $e) {
                    echo $e->getMessage();
                }
                ?>
            </select>
            <input type="submit" value="Get">
        </form>
        <br />
        
        <h1>Какие предметы будут в аудитории:</h1>
        <form action="get_by_auditory.php" method="get">
            <select id="getByAuditory" name="aud">
                <?php
                try {
                    $all = $collections->distinct("aud");
                    foreach ($all as $i) {
                        echo "<option>";
                        echo "$i";
                        echo "</option>";
                    }
                } catch (Throwable $e) {
                    echo $e->getMessage();
                }
                ?>
            </select>
            <input type="submit" value="Get">
        </form>
    </body>
</html>