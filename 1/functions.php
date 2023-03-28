<?php
    require_once "db_connection.php";

    function get_all_data() {
        global $conn;
        
        if ($result = mysqli_query($conn, "SELECT * FROM employees")) {
            
            while($row=mysqli_fetch_assoc($result)) {

                ?>

                <div class="col-4">
                    <div class="card border-primary">
                      <div class="card-body">
                        <h4 class="card-title"><?php echo($row["name"]) ?></h4>
                        <p class="card-text"><?php echo($row["occupation"]) ?></p>
                        <p class="card-text"><?php echo($row["salary"]) ?></p>
                        <p class="card-text"><?php echo($row["hire_date"]) ?></p>
                        <a name="update-btn" class="btn btn-primary" href="update.php?id=<?php echo($row["id"])?>" role="button">Update</a>
                        <a name="delete-btn" class="btn btn-danger" href="delete.php?id=<?php echo($row["id"])?>" role="button">Delete</a>
                      </div>
                    </div>
                </div>

                <?php
            }

            mysqli_free_result($result);
        }
    }

    function get_data($id) {
        global $conn;
        
        if ($result = mysqli_query($conn, "SELECT * FROM employees WHERE id = " . $id . ";")) {
            
            $row = mysqli_fetch_assoc($result);

            mysqli_free_result($result);

            return $row;
        }
    }

    function insert_data($name, $salary, $occupation, $hireDate) {
        global $conn;
        $query = "INSERT INTO employees(name, salary, occupation, hire_date) VALUES("
            . '"' . $name . '"' .','
            . $salary . ','
            . '"' . $occupation . '"' . ','
            . '"' . $hireDate . '"' . ');';
        mysqli_query($conn, $query);
    }

    function delete_employee($id) {
        global $conn;
        $query = "DELETE FROM employees WHERE id = " . $id . ";";
        mysqli_query($conn, $query);
    }

    function update_employee($id, $name, $salary, $occupation, $hireDate) {
        // UPDATE employees set name = 'A', salary = 100 where id = 18;
        global $conn;
        $query = "UPDATE employees SET "
            . "name = '" . $name . "',"
            . "salary = " . $salary . ","
            . "occupation = '" . $occupation . "',"
            . "hire_date = '" . $hireDate . "'"
            . " where id = " . $id . ";";
        // echo $query;
        mysqli_query($conn, $query);
    }
?>