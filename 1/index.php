<?php
    include("header.php");
    require_once "functions.php";
    require_once "employee_form.php";
?>

  <main>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="view" role="tabpanel" aria-labelledby="view-tab"> 
        <div class="container">
            <div class="row justify-content-center align-items-center g-2">
                <?php get_all_data(); ?>
            </div>
        </div>
      </div>
      <div class="tab-pane" id="insert" role="tabpanel" aria-labelledby="insert-tab">
        <div class="container">
            <div class="row justify-content-center align-items-center g-2">
              <?php get_form(); ?>
            </div>
        </div>
      </div>
    </div>
  </main>

<?php include("footer.php") ?>
