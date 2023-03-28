<?php
    require_once "functions.php";
    function get_form($id = -1) {
        $update = $id == -1 ? false : true;
        $name = '';
        $salary = 0;
        $occupation = '';
        $hireDate = '';
        if ($update) {
            $row = get_data($id);
            $name = $row['name'];
            $salary = $row['salary'];
            $occupation = $row['occupation'];
            $hireDate = $row['hire_date'];
        }

        ?>
        <div class="col-8">
            <form action=<?php ($update) ? (print "update.php") : (print "insert.php"); ?> method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                    class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" value=<?php echo $name?>>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number"
                    class="form-control" name="salary" id="salary" aria-describedby="helpId" placeholder="" value=<?php echo $salary?>>
                </div>
                <div class="mb-3">
                    <label for="occupation" class="form-label">Occupation</label>
                    <input type="text"
                    class="form-control" name="occupation" id="occupation" aria-describedby="helpId" placeholder="" value=<?php echo $occupation?>>
                </div>
                <div class="mb-3">
                    <label for="hiteDate" class="form-label">Hire date</label>
                    <input type="date"
                    class="form-control" name="hireDate" id="hireDate" aria-describedby="helpId" placeholder="" value=<?php echo $hireDate?>>
                </div>
                <input name="id" id="id" value=<?php echo $id?> type="hidden">
                <input type="submit">
            </form> 
        </div>
        <?php
    }
?>