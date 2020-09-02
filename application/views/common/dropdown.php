<div class="dropdown dropdown-link">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        Option
    </button>
    <div class="dropdown-menu">
        <?php 
            foreach ($link as $key => $value) {
                $confirm = is_array($value) ? "confirm" : "";
                $url = is_array($value) ? $value[0] : $value;
                echo "<a href='$url' class='dropdown-item $confirm'>$key</a>";
            }
        ?>
    </div>
</div>
